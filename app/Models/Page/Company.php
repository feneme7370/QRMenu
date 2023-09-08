<?php

namespace App\Models\Page;

use App\Models\User;
use App\Models\Page\Membership;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'adress',
        'city',
        'social',
        'description',
        'status',
        'membership_id'
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }
    public function categories()
    {
        return $this->hasMany(Category::class, 'company_id', 'id');
    }
}
