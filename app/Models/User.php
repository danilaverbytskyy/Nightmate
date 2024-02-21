<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'users'; //optional

    private string $name;
    private string $email;
    private string $password;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getDreams()
    {
        return $this->hasMany(Dream::class);
    }

    public static function add(array $fields): void
    {
        $user = new User($fields);
        $user->hashPassword();
        $user->save();
    }

    public function edit(array $userData): void
    {
        $this->update([
            'name' => $userData['name'],
            'email' => $userData['email']
        ]);
        if (empty($userData['password']) === false) {
            $this->update([
                'password' => bcrypt($userData['password'])
            ]);
        }
        $this->save();
    }

    private function hashPassword(): void
    {
        if (isset($this->password)) {
            $this->password = bcrypt($this->password);
        }
    }
}
