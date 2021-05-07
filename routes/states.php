<?php
//  States
Route::apiResource('states', 'States', ['only' => ['show']]);

// State towns
Route::prefix('states')
    ->name('states.')
    ->group(
        function () {
            Route::get('{id}/towns', 'Towns@list')->name('towns');
        }
    );

if (has_jwtauth_plugin()) {
    Route::middleware(['jwt.auth'])
        ->group(
            function () {
                Route::apiResource('states', 'States', ['only' => ['store', 'update', 'destroy']]);
            }
        );
}
