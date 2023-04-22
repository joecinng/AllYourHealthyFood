<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if (!empty($filters['search']))
        {
            // search from the database where name,description,or ingredients 
            // is equal to the search result
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orwhere('description', 'like', '%' . request('search') . '%')
            ->orwhere('ingredients', 'like', '%' . request('search') . '%');
        }
    }
}
