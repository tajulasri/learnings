<?php

namespace Learning\Payroll;

class EmployeeDeduction
{

    public $type;
    public $value;
    public $variable;

    public function __construct($type, $variable, $value)
    {
        $this->type = $type;
        $this->value = $value;
        $this->variable = $variable;
    }
}
