<?php

namespace App\Actions\Customer;

use App\Models\Customer;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListCustomer
{
    use AsAction;

    public function handle()
    {
        return QueryBuilder::for(Customer::class)
            ->with(['addressable', 'document'])
            ->allowedFilters([
                AllowedFilter::partial('name')
            ])->simplePaginate();
    }
}
