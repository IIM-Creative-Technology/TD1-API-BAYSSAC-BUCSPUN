<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cours', function ()  {
    return \App\Models\Cour::all();
});

Route::get('/cours/{id}', function ($id) {

    $task = \App\Models\Cour::find($id);

    if ($task) {
        return $task;
    }
});



Route::put('/cours/{courId}', function ($courId) {

   $task = \App\Models\Cour::find($courId);
   $data = request()->only(['name', 'image_url','description', 'programme', 'year', 'date_debut','date_fin']);

   request()->validate([
      'name' => 'required',
      'description' => 'required',
      'programme' => 'required',
      'year' => 'required',
      'date_debut' => 'required',
      'date_fin' => 'required'
   ]);

    $task->update($data);

});

Route::post('/cours', function () {
    request()->validate([
        'name' => 'required',
        'description' => 'required',
        'programme' => 'required',
        'year' => 'required',
        'date_debut' => 'required',
        'date_fin' => 'required'
    ]);

    $data = request()->all();

    return \App\Models\Cour::create($data);
});

Route::delete('/cours/{coursId}', function ($coursId) {

    $task = \App\Models\Cour::find($coursId);

    if(!$task) {
        return response("Not found", 404);
    }

    $task->delete();

});