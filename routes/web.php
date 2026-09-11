<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Newsletter subscribe form action (footer.blade.php) — wire up to a real
// controller/mailing-list service when ready.
Route::post('/newsletter/subscribe', function () {
    request()->validate(['email' => 'required|email']);

    // TODO: store the email / push to mailing list provider

    return back()->with('success', "Thanks for subscribing! We'll keep you posted.");
})->name('newsletter.subscribe');
