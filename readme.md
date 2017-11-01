## Solid implementation for sample payroll problems


`composer install`

`./vendor/bin/phpunit`


```php

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

```


### Create new CustomDeductionType

```php

<?php

namespace Learning\Payroll;

use Learning\Payroll\BaseDeduction;
use Learning\Payroll\DeductionInterface;

class CompanyCustomDeduction extends BaseDeduction implements DeductionInterface
{
    const OTHER_VALUE_FACTOR = 30;

    public function byFixAmount(): int
    {
        //just another sample
        return $this->employee->salary - $this->deduction->value - $this->caclulateFactor();
    }

    public function byPercentange(): int
    {
        $amount = ($this->deduction->value / 100) * $this->employee->salary;
        return $this->employee->salary - $amount;
    }

    private function caclulateFactor(): int
    {
        //just example custom formula calculation
        return 25 + self::OTHER_VALUE_FACTOR;
    }
}

```

