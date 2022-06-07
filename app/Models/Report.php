<?php
/*
Auteur: Bruno Manuel Vieira Rosas
Date: 19.05.2022
Description: Report model
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    protected $dates = [
        'date'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

