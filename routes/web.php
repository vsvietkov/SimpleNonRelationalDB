<?php

use App\Models\Answer;
use App\Models\Problem;
use App\Models\Statistic;
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
    $statistic = null;

    if ($request->has('answer')) {
        $statistic = Answer::find($request->get('answer'))->getStatisticPercentage();
        Statistic::where('answer_id', $request->get('answer'))->increment('count');
    }

    if ($request->has('continue')) {
        $request->session()->put('problemId', ++$problemId);
    }

    if ($problemId > 2) {
        return view('game-end');
    }
    $problem = Problem::all()[$request->session()->get('problemId')];
    $answers = $problem->answers()->get();
    return view('index', compact('problem', 'answers', 'statistic'));
});
