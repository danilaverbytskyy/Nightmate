<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use App\Models\DreamCollection;
use App\Models\DreamDate;
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
        $dreamQuantity = Dream::getDreamsQuantity(Auth::id());
        $daysStrike = DreamDate::getDaysStrikeByUserId(Auth::id());
        $currentMonth = date('n');

        $dreams = new DreamCollection(['user_id' => Auth::id()]);
        $dreams->changeDatesToDateFormat();

        $viewData = [
            'dreamQuantity' => $dreamQuantity,
            'daysStrike' => $daysStrike,
            'userName' => Auth::getUser()['name'],
            'dreams' => $dreams->getDreams(),
            'currentMonth' => $currentMonth
        ];
        return view('home.dashboard', $viewData);
    }
}
