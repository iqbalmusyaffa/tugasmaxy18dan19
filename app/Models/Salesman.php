<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email',
        // Tambahkan _token ke dalam fillable
    ];
}
