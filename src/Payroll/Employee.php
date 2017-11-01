<?php

namespace Learning\Payroll;

class Employee
{

    public $salary;

    public function __construct($salary)
    {
        $this->salary = $salary;
    }
}
