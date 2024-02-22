<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use App\Models\DreamCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $dreamCollection = new DreamCollection(['user_id' => Auth::id()]);
        $dreamCollection->changeDatesToDateFormat();

        $dreamQuantity = $dreamCollection->getDreamsQuantity();
        $maxDaysStrike = $dreamCollection->getMaxDaysStrike();
        $currentMonth = date('n');
        $userName = Auth::getUser()['name'];


        $dreamCollection->sortDreamsByDate();

        $dreams = $dreamCollection->getDreams();

        $viewData = [
            'dreamQuantity' => $dreamQuantity,
            'maxDaysStrike' => $maxDaysStrike,
            'userName' => $userName,
            'dreams' => $dreams,
            'currentMonth' => $currentMonth
        ];
        return view('home.dashboard', $viewData);
    }
}
