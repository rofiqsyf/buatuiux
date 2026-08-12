<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'name',
        'nik',
        'email',
        'phone',
        'address',
        'information_requested',
        'purpose',
        'attachment_file_path',
        'status',
        'response_notes',
        'response_file_path',
    ];
}
