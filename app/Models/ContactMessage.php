<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'name',
        'phone',
        'email',
        'applicant_category',
        'topic_category',
        'title',
        'message',
        'attachment_path',
        'status',
    ];
}
