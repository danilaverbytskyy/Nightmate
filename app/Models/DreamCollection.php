<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DreamCollection extends Model
{
    use HasFactory;

    private const TWO_DAYS_IN_MILLISECONDS = 172800;

    private Collection $dreams;
    protected $fillable = ['user_id'];

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        $this->dreams = $this->getAllDreamsByUserId($attributes['user_id']);
    }

    public function changeDatesToDateFormat(): void
    {
        foreach ($this->dreams as $dream) {
            $dream->updated_at = date("d-m-Y", strtotime($dream->updated_at));
            $dream->created_at = date("d-m-Y", strtotime($dream->created_at));
        }
    }

    public function getDreamsQuantity(): int
    {
        return count($this->dreams);
    }

    public function getMaxDaysStrike(): int
    {
        if (count($this->dreams) === 0) {
            return 0;
        }

        $this->sortDreamsByDate();
        $maxDaysStrike = 1;
        $daysStrike = 0;
        for ($i = 0; $i < count($this->dreams) - 1; $i++) {
            $difference = strtotime($this->dreams[$i]->date) - strtotime($this->dreams[$i + 1]->date);
            if ($this->dreams[$i]->date === $this->dreams[$i + 1]->date) {
                continue;
            }
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

    public function sortDreamsByDate(): void
    {
        $this->dreams = $this->dreams->sortBy('date');
    }

    public function reverseDreams() : void
    {
        $this->dreams->reverse();
    }

    public function getDreams(): Collection
    {
        return $this->dreams;
    }

    public function setDreams(Collection $dreams): void
    {
        $this->dreams = $dreams;
    }

    private function getAllDreamsByUserId(int $user_id): Collection
    {
        return DB::table('dreams')->where('user_id', $user_id)->get();
    }
}
