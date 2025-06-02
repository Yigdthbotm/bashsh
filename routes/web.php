<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityLogController;

Route::middleware(['web', 'twofactor'])->group(function () {
    Route::get('/admin/depend/extensions', [ActivityLogController::class, 'index']);
});
