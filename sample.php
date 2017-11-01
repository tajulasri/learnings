<?php

require __DIR__ . '/vendor/autoload.php';

use Learning\Payroll\Employee;
use Learning\Payroll\EmployeeDeduction;
use Learning\Payroll\Socso;

$employee = new Employee(2500);
$employeeDeduction = new EmployeeDeduction('socso', 'fix', 12);

$calculate = \Learning\Payroll\DeductionProcessor::make(new Socso(
    $employee, $employeeDeduction
))->amount();

echo $calculate;
