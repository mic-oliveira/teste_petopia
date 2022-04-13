<?php

namespace App\Actions\Sale;

use App\Models\Sale;
use Illuminate\Contracts\Pagination\Paginator;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListSales
{
    use AsAction;

    public function handle(): Paginator
    {
        return QueryBuilder::for(Sale::class)
            ->with(['customer', 'product_sold'])
            ->allowedFilters([
                AllowedFilter::partial('customer','customer.name')
            ])
            ->simplePaginate();
    }
}
