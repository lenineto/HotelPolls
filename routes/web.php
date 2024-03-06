<?php

use App\Http\Controllers\PollController;
use App\Http\Controllers\ProfileController;
	use App\Http\Controllers\VoteController;
	use Illuminate\Foundation\Application;
    use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/testpolls', function () {
    return (new App\Http\Controllers\PollController)->index();
});


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/poll/{id?}', function ($id = null) {
    Return (new PollController())->show($id);
})->name('polls.show');

Route::get('/results/{id?}', function ($id = null) {
	Return (new VoteController())->show($id);
})->name('votes.show');

Route::post('/vote/', function (Request $request) {
    return (new VoteController)->store($request);
})->name('vote.store');


Route::get('/polls', function () {
//    $polls = (new Poll)->getPolls( true,  );
	$polls = (new PollController)->index(Auth::id());
    return Inertia::render('Dashboard', ['polls' => $polls,]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
