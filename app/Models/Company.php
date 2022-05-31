<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'website', 'email','user_id'];

    public function scopeFilter($query)
    {

        if ($search = request('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }
        return $query;
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
