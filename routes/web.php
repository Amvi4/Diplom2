<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\Admin\WorkerController as AdminWorkerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Models\Worker;

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

Route::get('/', function () {

    $workers = Worker::latest()->get();

    return Inertia::render('Welcome', [
        'workers' => $workers
    ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// калькулятор
Route::get('/calculator', [CalculatorController::class, 'index']);
Route::post('/calculate', [CalculatorController::class, 'calculate']);
Route::post('/order/from-calculator', [OrderController::class, 'fromCalculator']);


// заявка
Route::get('/order', [OrderController::class, 'create'])
    ->middleware('auth')
    ->name('order.create');

Route::post('/order', [OrderController::class, 'store'])
    ->middleware('auth');


Route::get('/service/{id}', [ServiceController::class, 'select']);

// Админка
Route::middleware(['auth', 'admin'])->group(function () {
    // заявки
    Route::get('/admin/orders', [AdminOrderController::class, 'index']);
    Route::post('/admin/orders/{order}/status', [AdminOrderController::class, 'updateStatus']);

    // сотрудники
    Route::get('/admin/workers', [AdminWorkerController::class, 'index']);
    Route::get('/admin/workers/create', [AdminWorkerController::class, 'create']);
    Route::post('/admin/workers', [AdminWorkerController::class, 'store']);
    Route::delete('/admin/workers/{worker}', [AdminWorkerController::class, 'destroy']);
    Route::get('/admin/workers/{worker}', [AdminWorkerController::class, 'show']);
    Route::post('/admin/workers/{worker}/works', [AdminWorkerController::class, 'storeWork']);
    Route::delete('/admin/works/{work}',[AdminWorkerController::class, 'destroyWork']);

    // обратная связь
    Route::get('/admin/feedback', [AdminFeedbackController::class, 'index']);

    // отзывы
    Route::get('/admin/reviews', [AdminReviewController::class, 'index']);
    Route::delete('/admin/reviews/{review}', [AdminReviewController::class, 'destroy']);
});

// сотрудники
Route::get('/workers', [WorkerController::class, 'index']);

Route::get('/workers/{id}', [WorkerController::class, 'show'])
    ->name('workers.show');

// обратная связь

Route::get('/feedback', [FeedbackController::class, 'create']);
Route::post('/feedback/step', [FeedbackController::class, 'step']);
Route::get('/feedback/comment', [FeedbackController::class, 'comment']);
Route::post('/feedback/store', [FeedbackController::class, 'store']);

// отзывы
Route::get('/reviews', [ReviewController::class, 'index']);

Route::post('/reviews', [ReviewController::class, 'store'])
    ->middleware('auth');

// страницы
Route::get('/services', function () {
    return Inertia::render('Services');
    });
    // факторы влияющие на цену
Route::get('/factors/value', function () {
    return Inertia::render('Factors/Value');
    });
Route::get('/factors/hard', function () {
    return Inertia::render('Factors/HardWork');
    });
Route::get('/factors/resources', function () {
    return Inertia::render('Factors/Resources');
    });
Route::get('/factors/size', function () {
    return Inertia::render('Factors/SizeConst');
    });
// услуги
Route::get('/services/argon', function () {
    return Inertia::render('Services/Argon');
    });
Route::get('/services/pipe', function () {
    return Inertia::render('Services/Pipe');
    });
Route::get('/services/stainless', function () {
    return Inertia::render('Services/Stainless');
    });
Route::get('/services/const', function () {
    return Inertia::render('Services/Const');
    });
// подход к работе
Route::get('/ourwork', function () {
    return Inertia::render('OurWork');
    });
    // этапы
Route::get('/stages/first', function () {
    return Inertia::render('Stages/First');
    });
Route::get('/stages/second', function () {
    return Inertia::render('Stages/Second');
    });
Route::get('/stages/third', function () {
    return Inertia::render('Stages/Third');
    });
Route::get('/stages/fourth', function () {
    return Inertia::render('Stages/Fourth');
    });
Route::get('/stages/fifth', function () {
    return Inertia::render('Stages/Fifth');
    });
Route::get('/stages/sixth', function () {
    return Inertia::render('Stages/Sixth');
    });
    // реализованные работы
Route::get('/works', function () {
    return Inertia::render('OurRealisedWorks');
    });
Route::get('/works/bench', function () {
    return Inertia::render('Works/Bench');
    });
Route::get('/works/stairs', function () {
    return Inertia::render('Works/Stairs');
    });
Route::get('/works/fence', function () {
    return Inertia::render('Works/Fence');
    });
Route::get('/works/montage', function () {
    return Inertia::render('Works/Montage');
    });
Route::get('/works/metall-stairs', function () {
    return Inertia::render('Works/MetallStairs');
    });
Route::get('/works/metall-cart', function () {
    return Inertia::render('Works/MetallCart');
    });
Route::get('/works/metall-const', function () {
    return Inertia::render('Works/MetallConst');
    });
    // контакты
    Route::get('/contacts', function () {
    return Inertia::render('Contacts');
    });
    // Связаться с нами
    Route::get('/contact-us', function () {
    return Inertia::render('ContactUs');
    });

// ошибка
Route::fallback(function () {

    return Inertia::render('Error404')
        ->toResponse(request())
        ->setStatusCode(404);
});

    require __DIR__.'/auth.php';
