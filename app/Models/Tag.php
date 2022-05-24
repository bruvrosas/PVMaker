<?php
/*
Auteur: Bruno Manuel Vieira Rosas
Date: 19.05.2022
Description: Tag model
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}
