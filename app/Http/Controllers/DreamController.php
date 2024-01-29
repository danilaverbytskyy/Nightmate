<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DreamController extends Controller
{
    private const TWO_DAYS_IN_MILLISECONDS = 172800;

    public static function getDaysStrikeByUserId(int $user_id) : int {
        $maxDaysStrike = 1;
        $daysStrike = 1;
        $dreamsDates = DB::table('dreams')
            ->where('user_id', $user_id)
            ->select('created_at')
            ->get();

        for ($i=0; $i<count($dreamsDates) - 1; $i++) {
            $difference = strtotime($dreamsDates[$i]->created_at) - strtotime($dreamsDates[$i+1]->created_at);
            if($difference <= self::TWO_DAYS_IN_MILLISECONDS - 1) {
                $daysStrike++;
            }
            if($daysStrike > $maxDaysStrike) {
                $maxDaysStrike = $daysStrike;
                $daysStrike = 1;
            }
        }
        return $maxDaysStrike;
    }
}
