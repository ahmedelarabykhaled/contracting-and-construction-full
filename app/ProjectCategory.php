<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Project;

class ProjectCategory extends Model
{
    public function projects()
    {
    	return $this->hasMany(Project::class,'category','category');
    }
}
