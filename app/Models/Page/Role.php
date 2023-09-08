<?php

namespace App\Models\Page;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'status',
        'company_id',
        'user_id',
    ];


    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    public function companies()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }
}
