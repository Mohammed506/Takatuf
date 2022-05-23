<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'description', 'category_id', 'start', 'finish', 'location', 'seats', 'gender', 'image'];
    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeFilter($query, array $filters)
    {

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%');
        }
    }
}
