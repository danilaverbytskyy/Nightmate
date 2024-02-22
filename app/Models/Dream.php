<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dream extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'content',
        'date',
        'user_id',
    ];

    public static function add(array $fields): void {
        $dream = new Dream($fields);
        $dream->save();
    }

    public function edit(Request $request): void {
        $this->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
