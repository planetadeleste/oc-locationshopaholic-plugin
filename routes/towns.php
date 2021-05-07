<?php
Route::apiResource('towns', 'Towns', ['only' => ['show']]);

if (has_jwtauth_plugin()) {
    Route::middleware(['jwt.auth'])
        ->group(
            function () {
                Route::apiResource('towns', 'Towns', ['only' => ['store', 'update', 'destroy']]);
            }
        );
}
