<?php

Route::prefix('api/v1')
    ->namespace('PlanetaDelEste\LocationShopaholic\Controllers\Api')
    ->middleware('api')
    ->group(
        function () {
            //  Countries
            Route::apiResource('countries', 'Countries', ['only' => ['index', 'show']]);

            // Country states
            Route::prefix('countries')
                ->name('countries.')
                ->group(
                    function () {
                        Route::get('{id}/states', 'States@index')->name('states');
                    }
                );

            //  States
            Route::apiResource('states', 'States', ['only' => ['show']]);

            // State towns
            Route::prefix('states')
                ->name('states.')
                ->group(
                    function () {
                        Route::get('{id}/towns', 'Towns@index')->name('towns');
                    }
                );

            //  Towns
            Route::apiResource('towns', 'Towns', ['only' => ['show']]);

            Route::middleware(['jwt.auth'])
                ->group(
                    function () {
                        Route::apiResource('countries', 'Countries', ['only' => ['store', 'update', 'destroy']]);
                        Route::apiResource('states', 'States', ['only' => ['store', 'update', 'destroy']]);
                        Route::apiResource('towns', 'Towns', ['only' => ['store', 'update', 'destroy']]);
                    }
                );
        }
    );
