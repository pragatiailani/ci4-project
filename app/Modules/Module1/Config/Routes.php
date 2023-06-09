<?php

    if (!isset($routes)){
        $routes = \Config\Services::routes(true);
    }

    $routes->group('module1', ['namespace' => 'App\Modules\Module1\Controllers'], function ($subroutes) {
        $subroutes->get('', 'Admin::index');
        $subroutes->post('login', 'Admin::login');
        $subroutes->get('dashboard', 'Admin::dashboard');
        $subroutes->get('logout', 'Admin::logout');
    });

?>