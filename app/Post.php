<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;
    public $directory="/images/";
    // protected $table='posts';
    //protected $primaryKey='post_id'
    protected $dates=['deleted_at'];
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'path'
    ];

    public function user(){

       return $this->belongsTo('App\User');
    }

    public function photos(){

        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags() {

        return $this->morphToMany('App\Tag','taggable');
    }

    public static function scopeSomeName($query){

       // return $query->some piece of code to use easyly in this case we can use for calling somename();
    }

    public function getPathAttribute($value){


        return $this->directory.$value;
    }




}
