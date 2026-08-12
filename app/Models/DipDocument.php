<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DipDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'registration_number',
        'category',
        'year',
        'file_size',
        'file_path',
        'downloads_count',
    ];
}
