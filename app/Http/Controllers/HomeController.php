<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function about() : View
    {
        return view('about');
    }

    public function editUser(): View
    {
        $user = Auth::getUser();
        $viewData = [
            'user' => $user
        ];
        return view('home.edit-user', $viewData);
    }

    public function dashboard() : View
    {
        $dreamQuantity = DB::table('dreams')->where('user_id', Auth::id())->count();
        $daysStrike = DreamController::getDaysStrikeByUserId(Auth::id());
        $currentMonth = date('n');

        $dreams = Dream::getAllByUserId(Auth::id());
        Dream::changeDatesToDateFormat($dreams);
        $viewData = [
            'dreamQuantity' => $dreamQuantity,
            'daysStrike' => $daysStrike,
            'userName' => Auth::getUser()['name'],
            'dreams' => $dreams,
            'currentMonth' => $currentMonth
        ];
        return view('home.dashboard', $viewData);
    }
}
