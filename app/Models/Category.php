<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
    ];

    public static function add(array $fields): void {
        $category = new Category($fields);
        $category->save();
    }

    public function edit(Request $request): void {
        $this->update([
            'title' => $request->input('title'),
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
