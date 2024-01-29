<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DreamController extends Controller
{
    private const TWO_DAYS_IN_MILLISECONDS = 172800;

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'string|max:63',
            'content' => 'string'
        ]);

    }

    public function update(Request $request)
    {

    }

    public static function getDaysStrikeByUserId(int $user_id): int
    {
        $dreamsDates = DB::table('dreams')
            ->where('user_id', $user_id)
            ->select('created_at')
            ->get();

        if (count($dreamsDates) === 0) {
            return 0;
        }

        $maxDaysStrike = 1;
        $daysStrike = 1;
        for ($i = 0; $i < count($dreamsDates) - 1; $i++) {
            $difference = strtotime($dreamsDates[$i]->created_at) - strtotime($dreamsDates[$i + 1]->created_at);
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
