<?php
require_once __DIR__ . '/login.php';

$csv  = array_map('str_getcsv', file(__DIR__ . '/tests.csv'));
$head = array_shift($csv);

$pass = $fail = 0;
$rows = [];

echo PHP_EOL;
foreach ($csv as $row) {
    [$id, $desc, $username, $password, $expected] = $row;
    $actual = login($username, $password);
    $ok     = ($expected === $actual);
    $ok ? $pass++ : $fail++;
    $status = $ok ? "PASS" : "FAIL";
    $extra  = $ok ? "" : "  =>  Expected: \"$expected\" | Got: \"$actual\"";
    echo  "  [$status]  $id: $desc$extra" . PHP_EOL;
    $rows[] = compact('id', 'desc', 'username', 'password', 'expected', 'actual', 'status');
}

echo PHP_EOL . "  Total: " . ($pass + $fail) . "  |  Passed: $pass  |  Failed: $fail" . PHP_EOL . PHP_EOL;


$sep  = str_repeat('-', 71);
$lines = [];
$lines[] = "";
$lines[] = $sep;
$lines[] = sprintf(" %-5s | %-24s | %-8s | %-8s | %-19s | %-19s | %s", "ID", "Description", "username", "password", "Expected", "Actual", "Status");
$lines[] = $sep;
foreach ($rows as $r) {
    $u = $r['username'] === "" ? "" : ($r['username'] === "   " ? "(3 sp)" : ($r['username'] === "      " ? "(6 sp)" : $r['username']));
    $p = $r['password'] === "" ? "" : ($r['password'] === "      " ? "(6 sp)" : $r['password']);
    $lines[] = sprintf("%-5s | %-24s | %-8s | %-8s | %-19s | %-19s | %s",
        $r['id'], $r['desc'], $u, $p, $r['expected'], $r['actual'], $r['status']);
}
$lines[] = $sep;
$lines[] = "";
$lines[] = "";

file_put_contents(__DIR__ . '/testCases.txt', implode(PHP_EOL, $lines));

exit($fail > 0 ? 1 : 0);

