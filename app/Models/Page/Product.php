<?php

namespace App\Models\Page;

use App\Models\User;
use App\Models\Page\Company;
use App\Models\Page\Suggested;
use App\Models\Page\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'suggested',
        'status',
        'subcategory_id',
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
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
    public function suggested()
    {
        return $this->hasOne(Suggested::class, 'product_id', 'id');
    }
}
