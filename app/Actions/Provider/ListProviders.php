<?php

namespace App\Actions\Provider;

use App\Models\Provider;
use Illuminate\Contracts\Pagination\Paginator;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListProviders
{
    use AsAction;

    public function handle(): Paginator
    {
        return QueryBuilder::for(Provider::class)
            ->with(['addressable', 'documentation'])
            ->allowedFilters([
                AllowedFilter::partial('document','documentation.document'),
                AllowedFilter::partial('name')
            ])
            ->simplePaginate();
    }
}
