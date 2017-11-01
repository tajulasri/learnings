<?php

use Learning\Payroll\CompanyCustomDeduction;
use Learning\Payroll\Employee;
use Learning\Payroll\EmployeeDeduction;
use Learning\Payroll\Epf;
use Learning\Payroll\Socso;
use PHPUnit\Framework\TestCase;

class DeductionTest extends TestCase
{

    public function test_socso_deduction_with_fix_amount()
    {
        //set 3000 as basic salary
        $employee = new Employee(3000);

        //randomly set MYR 200
        $employeeDeduction = new EmployeeDeduction('socso', 'fix', 200);

        $calculate = \Learning\Payroll\DeductionProcessor::make(new Socso(
            $employee, $employeeDeduction
        ))->amount();

        $this->assertEquals($calculate, 2800);
    }

    public function test_socso_deduction_with_percentage_amount()
    {
        //set 3000 as basic salary
        $employee = new Employee(3000);

        //randomly set 8 percent
        $employeeDeduction = new EmployeeDeduction('socso', 'percentage', 8);

        $calculate = \Learning\Payroll\DeductionProcessor::make(new Socso(
            $employee, $employeeDeduction
        ))->amount();

        //8 percent of 3000 is 2760
        $this->assertEquals($calculate, 2760);
    }

    public function test_epf_deduction_with_fix_amount()
    {
        //set 3000 as basic salary
        $employee = new Employee(3000);

        //randomly set MYR 30
        $employeeDeduction = new EmployeeDeduction('epf', 'fix', 30);

        $calculate = \Learning\Payroll\DeductionProcessor::make(new Epf(
            $employee, $employeeDeduction
        ))->amount();

        $this->assertEquals($calculate, 2970);
    }

    public function test_epf_deduction_with_percentage_amount()
    {
        //set 3000 as basic salary
        $employee = new Employee(3000);

        //randomly set MYR 30
        $employeeDeduction = new EmployeeDeduction('epf', 'percentage', 2);

        $calculate = \Learning\Payroll\DeductionProcessor::make(new Epf(
            $employee, $employeeDeduction
        ))->amount();

        $this->assertEquals($calculate, 2940);
    }

    public function test_custom_deduction_with_fix_value()
    {
        //set 3000 as basic salary
        $employee = new Employee(3000);

        //randomly set MYR 10
        $employeeDeduction = new EmployeeDeduction('custom', 'fix', 10);

        $calculate = \Learning\Payroll\DeductionProcessor::make(new CompanyCustomDeduction(
            $employee, $employeeDeduction
        ))->amount();

        $this->assertEquals($calculate, 2935);
    }

    public function test_custom_deduction_with_percentage_value()
    {
        //set 3000 as basic salary
        $employee = new Employee(3000);

        //randomly set MYR 30
        $employeeDeduction = new EmployeeDeduction('custom', 'percentage', 2);

        $calculate = \Learning\Payroll\DeductionProcessor::make(new CompanyCustomDeduction(
            $employee, $employeeDeduction
        ))->amount();

        $this->assertEquals($calculate, 2940);
    }
}
