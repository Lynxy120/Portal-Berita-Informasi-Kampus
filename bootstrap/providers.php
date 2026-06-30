<?php

use App\Providers\AppServiceProvider;
use App\Providers\FortifyServiceProvider;
use Livewire\Flux\FluxServiceProvider;

return [
    AppServiceProvider::class,
    FortifyServiceProvider::class,
    FluxServiceProvider::class,
];
