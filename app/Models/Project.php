<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'status', 'client_company', 'leader', 'budget', 'deadline', 'id', 'attachments'];
    protected $casts = [
        'attachments' => 'json',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class, //  Related Model
            'project_tag', //  Pivot Table
            'project_id', //  F.K For Current Model In Pivot Table
            'tag_id', //  F.K For Related Model In Pivot Table
            'id', //  Current Model Key (P.K)
            'id' //  Related Model Key (P.K related Model)

        );
    }
}
