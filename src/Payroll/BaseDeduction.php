<?php

namespace Learning\Payroll;

use Learning\Payroll\Employee;
use Learning\Payroll\EmployeeDeduction;

class BaseDeduction
{
    protected $deduction;

    protected $employee;

    public function __construct(Employee $employee, EmployeeDeduction $deduction)
    {
        $this->deduction = $deduction;
        $this->employee = $employee;
    }

    public function calculate(): int
    {
        switch ($this->deduction->variable) {

            case 'fix':
                return $this->byFixAmount();

            case 'percentage':
                return $this->byPercentange();

            default:
                return $this->originalSalary();
        }
    }

    public function byFixAmount(): int
    {
        return $this->employee->salary - $this->deduction->value;
    }

    public function byPercentange(): int
    {
        $amount = ($this->deduction->value / 100) * $this->employee->salary;
        return $this->employee->salary - $amount;
    }

    public function originalSalary(): int
    {
        return $this->employee->salary;
    }

    public function type(): string
    {
        return $this->deduction->type;
    }
}
