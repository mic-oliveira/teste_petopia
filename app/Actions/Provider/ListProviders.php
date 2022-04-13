<?php

namespace App\Actions\Provider;

use App\Models\Provider;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListProviders
{
    use AsAction;

    public function handle()
    {
        return QueryBuilder::for(Provider::class)
            ->with(['addressable', 'documentation'])
            ->allowedFilters([
                AllowedFilter::partial('name')
            ])
            ->simplePaginate();
    }
}
