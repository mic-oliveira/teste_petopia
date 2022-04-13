<?php

namespace App\Actions\Provider;

use App\Models\Provider;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteProvider
{
    use AsAction;

    public function handle($id): Provider
    {
        $provider = FindProvider::run($id);
        $provider->delete();
        return $provider->refresh();
    }
}
