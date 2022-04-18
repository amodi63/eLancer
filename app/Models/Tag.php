<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'slug'];
    public function projects()
    {
        return $this->belongsToMany(
            Project::class, //  Related Model
            'project_tag',  //  Pivot Table
            'tag_id',       //  F.K For Current Model In Pivot Table
            'project_id',   //  F.K For Related Model In Pivot Table
            'id',           //  Current Model Key (P.K)
            'id',           //  Related Model Key (P.K related Model)
        );
    }
}
