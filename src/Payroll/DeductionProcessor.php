<?php

namespace Learning\Payroll;

use Learning\Payroll\DeductionInterface;

class DeductionProcessor
{
    protected $deduction;

    public function __construct(DeductionInterface $deduction)
    {
        $this->deduction = $deduction;
    }

    public static function make($deduction)
    {
        return new static($deduction);
    }

    public function amount()
    {
        return $this->deduction->calculate();
    }
}
