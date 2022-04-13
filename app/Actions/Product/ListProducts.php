<?php

namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListProducts
{
    use AsAction;

    public function handle():Paginator
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::partial('description'),
                AllowedFilter::exact('price')
            ])->simplePaginate();
    }
}
