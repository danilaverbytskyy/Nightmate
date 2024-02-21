<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DreamCollection extends Model
{
    use HasFactory;
    private Collection $dreams;
    protected $fillable = ['user_id'];

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        $this->dreams = DB::table('dreams')->where('user_id', $attributes['user_id'])->get()->reverse();
    }

    public function changeDatesToDateFormat(): void
    {
        foreach ($this->dreams as $dream) {
            $dream->updated_at = date("d-m-Y", strtotime($dream->updated_at));
            $dream->created_at = date("d-m-Y", strtotime($dream->created_at));
        }
    }

    public static function sortDreamsByDate(array $dreams): void
    {

    }

    public function getDreams(): Collection
    {
        return $this->dreams;
    }

    public function setDreams(Collection $dreams): void
    {
        $this->dreams = $dreams;
    }
}
