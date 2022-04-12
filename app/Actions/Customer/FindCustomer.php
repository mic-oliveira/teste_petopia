<?php

namespace App\Actions\Customer;

use App\Models\Customer;
use Lorisleiva\Actions\Concerns\AsAction;

class FindCustomer
{
    use AsAction;

    public function handle(int $id)
    {
        return Customer::findOrFail($id);
    }
}
