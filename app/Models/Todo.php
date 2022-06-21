<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    

    protected $fillable = ['content'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
