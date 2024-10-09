<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'start_date',
        'end_date',
        'cover_project_image',
        'type_id'
    ];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
