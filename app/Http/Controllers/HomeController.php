<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function home() {
        return view('home');
    }

    function about() {
        return view('about');
    }

    function dashboard() {
        $dreamQuantity = DB::table('dreams')->where('user_id', Auth::id())->count();
        $daysStrike = DreamController::getDaysStrikeByUserId(Auth::id());
        $dreams = Dream::getAllByUserId(Auth::id());
        Dream::changeDatesToDateFormat($dreams);
        $viewData = [
            'dreamQuantity' => $dreamQuantity,
            'daysStrike' => $daysStrike,
            'userName' => Auth::getUser()['name'],
            'dreams' => $dreams
        ];
        return view('home.dashboard', $viewData);
    }
}
