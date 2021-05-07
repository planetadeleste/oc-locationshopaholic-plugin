<?php
//  Countries
Route::apiResource('countries', 'Countries', ['only' => ['index', 'show']]);

// Country states
Route::prefix('countries')
    ->name('countries.')
    ->group(
        function () {
            Route::get('{id}/states', 'States@list')->name('states');
        }
    );

if (has_jwtauth_plugin()) {
    Route::middleware(['jwt.auth'])
        ->group(
            function () {
                Route::apiResource('countries', 'Countries', ['only' => ['store', 'update', 'destroy']]);
            }
        );
}
