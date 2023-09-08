<?php

namespace App\Models\Page;

use App\Models\Page\Company;
use App\Models\Page\Product;
use App\Models\Page\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suggested extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'company_id',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
