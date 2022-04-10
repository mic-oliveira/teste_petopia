<?php

namespace App\Actions\Provider;

use App\Models\Provider;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateProvider
{
    use AsAction;

    public function handle(array $provider): Provider
    {
        return Provider::create($provider);
    }
}
