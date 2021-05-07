<?php

Route::prefix('api/v1')
    ->namespace('PlanetaDelEste\LocationShopaholic\Controllers\Api')
    ->middleware(['throttle:120,1', 'bindings'])
    ->group(
        function () {
            $arRoutes = ['countries', 'states', 'towns'];

            foreach ($arRoutes as $sPublicRoute) {
                Route::group([], plugins_path('/planetadeleste/locationshopaholic/routes/'.$sPublicRoute.'.php'));
            }
        }
    );
