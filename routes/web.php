<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function (\Illuminate\Http\Request $request) {
    if ($request->has('restart')) {
        $request->session()->flush();
    }

    if (!$request->session()->has('problemId')) {
        $request->session()->put('problemId', 0);
    }
    $problemId = $request->session()->get('problemId');

    if ($request->has('answer')) {
        $request->session()->put('problemId', ++$problemId);
    }

    if ($problemId > 2) {
        return view('game-end');
    }
    $problem = \App\Models\Problem::all()[$request->session()->get('problemId')];
    $answers = $problem->answers()->get();
    return view('index', compact('problem', 'answers'));
});
