<?php

use App\Http\Controllers\EventController;
use App\Models\User;
use Illuminate\Support\Facades\{Auth, Route};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Laravel\Socialite\Facades\Socialite;

// Home
Route::get('/', [EventController::class, 'index']);
// Criar evento
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
// Visualizar evento
Route::get('/events/{id}', [EventController::class, 'show']);
// Post para salvar no banco
Route::post('/events', [EventController::class, 'store']);
// Deletar evento
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
// Editar evento
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
// Atualizar informações do evento
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');
// Dashboard de eventos
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
// Participar de evento
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');
// Sair de evento
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');
// Contatos
Route::get('/contatos', function () {
    return view('contact');
});

Route::get('/auth/{provider}/redirect', function (string $provider) {
    return Socialite::driver($provider)->redirect();
});

Route::get('/auth/{provider}/callback', function (string $provider) {
    $providerUser = Socialite::driver($provider)->user();

    $user = User::updateOrCreate([
        'name' => $providerUser->name,
    ], [
        'provider_id'     => $providerUser->getId(),
        'email'           => $providerUser->getEmail(),
        'provider_avatar' => $providerUser->getAvatar(),
        'provider_name'   => $provider,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});
