<?php

namespace App\Actions\Customer;

use App\Models\Customer;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateCustomer
{
    use AsAction;

    public function handle(array $customer): Customer
    {
        $createdCustomer = Customer::create($customer);
        $createdCustomer->addressable()->create($customer['address']);
        $createdCustomer->documentation()->create($customer['document']);
        return $createdCustomer->refresh();
    }
}
