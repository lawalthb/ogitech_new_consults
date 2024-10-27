<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentTerm extends Model
{
   use HasFactory;

    protected $table = 'current_term';

    // Specify which columns are mass assignable
    protected $fillable = ['term', 'is_active'];

}
