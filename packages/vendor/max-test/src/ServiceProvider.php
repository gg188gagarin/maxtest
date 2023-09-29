<?php

namespace Vendor\Package;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        // тут инициализации пакета
    }

    public function register()
    {
        // тут регистрация пакета, например, привязка сервисов
    }
}
