<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DreamDate extends Model
{
    use HasFactory;

    private const TWO_DAYS_IN_MILLISECONDS = 172800;

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
