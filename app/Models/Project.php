<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Click;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $guarded =[];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function goals()
    {
        return $this->morphMany(Goal::class,'goallable');
    }

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
