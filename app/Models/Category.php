<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'art_path', 'parent_id']; //white list
    protected $casts = [
        'art_path' => 'string',
    ];
    // protected $guarded =[] black list;
    // protected $perPage = 2;

    // public function projects() {
    //     return $this->hasMany(Project::class, 'user');
    // }
    public function children()
    {
        return $this->hasMany(Category::class, 'foreign_id', 'primary')->withdefault(); //We Should define Foreign_id and Primary for Not Put Default Value (category_id, id)
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'foreign_id', 'primary')->withdefault();
    }
}
