<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $with=['category','instructor','chapters'];

    public function scopeFilter($query,$filter)
    {
        $query->when($filter['searchCourse']??false,function($query,$search){
            $query->where(function($query) use ($search) {
                $query->where('name','LIKE','%'.$search.'%')
                    ->orWhere('description','LIKE','%'.$search.'%');
            });
        });
        $query->when($filter['category']??false, function($query, $slug){
            $query->whereHas('category',function($query) use ($slug){
                $query->where('slug',$slug);
            });
        });
        $query->when($filter['username']??false, function($query, $username){
            $query->whereHas('instructor',function($query) use ($username){
                $query->where('username',$username);
            });
        });
    }
    public function instructor(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    public function enrolledUsers(){
        return $this->belongsToMany(User::class);
    }
}
