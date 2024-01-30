<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DreamController extends Controller
{
    private const TWO_DAYS_IN_MILLISECONDS = 172800;

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'string|max:63',
            'content' => 'string',
            'date' => 'date',
        ]);
        $data['user_id'] = Auth::id();
        $dream = new Dream();
        $dream->fill($data);
        $dream->save();
        return to_route('home.dashboard');
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'string|max:63',
            'content' => 'string',
            'date' => 'date',
        ]);
        $data['user_id'] = Auth::id();
        $dream = Dream::findOfFail($data);
        $dream->update($data);
        return to_route('home.dashboard');
    }

    public static function getDaysStrikeByUserId(int $user_id): int
    {
        $dreamsDates = DB::table('dreams')
            ->where('user_id', $user_id)
            ->select('date')
            ->get();

        if (count($dreamsDates) === 0) {
            return 0;
        }

        $maxDaysStrike = 1;
        $daysStrike = 0;
        for ($i = 0; $i < count($dreamsDates) - 1; $i++) {
            $difference = strtotime($dreamsDates[$i]->date) - strtotime($dreamsDates[$i + 1]->date);
            if ($difference <= self::TWO_DAYS_IN_MILLISECONDS - 1) {
                $daysStrike++;
            }
            if ($daysStrike > $maxDaysStrike) {
                $maxDaysStrike = $daysStrike;
                $daysStrike = 1;
            }
        }
        return $maxDaysStrike;
    }
}
