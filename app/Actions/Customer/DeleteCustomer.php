<?php

namespace App\Actions\Customer;

use App\Models\Customer;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteCustomer
{
    use AsAction;

    public function handle(int $id): Customer
    {
        $customer = FindCustomer::run($id);
        $customer->delete();
        return $customer->refresh();
    }
}
