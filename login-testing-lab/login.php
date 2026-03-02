<?php

function login(string $username, string $password): string
{
    if ($username === "" || $password === "") {
        return "Empty Fields";
    }

    if (strlen($password) < 7) {
        return "Password Too Short";
    }

    if ($username === "maruf" && $password === "admin123") {
        return "Login Successful";
    }

    return "Invalid Credentials";
}

if (php_sapi_name() === 'cli') return;

$result = "";
$type   = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    $result   = login($username, $password);
    $type     = $result === "Login Successful" ? "success" : "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding-top: 80px; background: #f1f1f1; }
        .box { background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.15); width: 320px; }
        h2 { margin: 0 0 20px; text-align: center; }
        label { display: block; margin-bottom: 4px; font-size: .9rem; color: #444; }
        input { width: 100%; padding: 8px 10px; margin-bottom: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #4a90e2; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; }
        button:hover { background: #357abd; }
        .msg { margin-top: 14px; padding: 10px; border-radius: 4px; text-align: center; font-weight: bold; }
        .success { background: #d4edda; color: #155724; }
        .error   { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
<div class="box">
    <h2>Login</h2>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
        <label>Password</label>
        <input type="password" name="password">
        <button type="submit">Login</button>
    </form>
    <?php if ($result): ?>
        <div class="msg <?= $type ?>"><?= htmlspecialchars($result) ?></div>
    <?php endif; ?>
</div>
</body>
</html>
