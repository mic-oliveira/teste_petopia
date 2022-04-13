<?php

namespace App\Actions\Sale;

use App\Models\Sale;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\QueryBuilder;

class ListSales
{
    use AsAction;

    public function handle()
    {
        return QueryBuilder::for(Sale::class)
            ->with(['customer', 'product_sold'])
            ->simplePaginate();
    }
}
