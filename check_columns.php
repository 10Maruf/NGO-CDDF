<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Policy Guideline Columns:\n";
print_r(Schema::getColumnListing('policy_guideline'));

echo "\nLegal Affilation Columns:\n";
print_r(Schema::getColumnListing('legal_affilation'));
