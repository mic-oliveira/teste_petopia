<?php

namespace App\Actions\Provider;

use App\Models\Provider;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateProvider
{
    use AsAction;

    public function handle(array $provider): Provider
    {
        $createdProvider = Provider::create($provider);
        isset($provider['address']) ? $createdProvider->addresable()->create($provider['address']) : null;
        return $createdProvider;
    }
}
