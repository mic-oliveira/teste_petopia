<?php

namespace App\Actions\Customer;

use App\Models\Customer;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateCustomer
{
    use AsAction;

    public function handle(array $customer, int $id): Customer
    {
        $updatedCustomer = FindCustomer::run($id);
        $updatedCustomer->fill($customer);
        isset($customer['address']) ? $updatedCustomer->addressable->fill($customer['address'])->save() : null;
        isset($customer['document']) ? $updatedCustomer->documentation->fill($customer['document'])->save() : null;
        $updatedCustomer->save();
        return $updatedCustomer->refresh();
    }
}
