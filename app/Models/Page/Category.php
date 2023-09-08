<?php

namespace App\Models\Page;

use App\Models\User;
use App\Models\Page\Company;
use App\Models\Page\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'company_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
}
