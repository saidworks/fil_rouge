<?php

return [
    'storage_disk' => env('img', 'public'),

    'store_attachment_action' => Te7aHoudini\LaravelTrix\Http\Controllers\TrixAttachmentController::class.'@store',

    'destroy_attachment_action' => Te7aHoudini\LaravelTrix\Http\Controllers\TrixAttachmentController::class.'@destroy',
];
