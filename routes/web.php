<?php

use App\Country;
use App\Photo;
use App\Post;
use App\Role;
use App\User;
use App\Video;
use App\Tag;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
   return view('welcome');

});


Route::get('/about', function () {
   return "HELLO it is mee";

});
Route::get('/contact', function () {
   return "Hi you can call me from here";
});
   Route::get('/post/{id}/{name}', function ($id,$name){

       return "this is page " . $id . " ". $name;

});

   route::get('/google', function(){
       return "Hello";
});
   Route::get('/hello/example/test', array('as' =>'admin.a', function(){

       $url=route('admin.a');

       return "this url changed with ". $url;
}));

Route::group(['middleware' => ['web']], function(){



});*/

//Route::get('/post', 'PostController@index');

//Route::resource('posts', 'PostController');


//Route::get('/contact', 'PostController@contact');

//Route::get('/post/{id}/{name}/{user}','PostController@show_view');

//Route::get('/', function () {
  //  return view('welcome');
//});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
Route::get('/insert', function(){

    DB::insert('insert into posts(title,content) values(?,?)', ['hello ','content']);

});*/
/*
--------------------------------------------------------------------------
| Database raw sql queries
|--------------------------------------------------------------------------
|

Route::get('/read', function(){

   $results = DB::select('select * from posts where id = ?', [1]);

  return var_dump($results);

   // foreach ($results as $post) {

    //   return $post->title;
   //}

});

Route::get('/update', function(){
    $updated = DB::update('update posts set title="updated table" where id=?', [1]);

    return $updated;
});

Route::get('/delete', function(){

    $delete= DB::delete('delete from posts where id=?', [1]);

    return $delete;

});*/
/*
|--------------------------------------------------------------------------
| Eloquent / object relation model or mapping? (ORM)
|--------------------------------------------------------------------------
|

route::get('/read', function(){

    $posts=Post::all();


    foreach ($posts as $post){

        return $post->title;
    }

});|*/

//route::get('/find', function(){

  //  $post=Post::find(2);


   // foreach ($posts as $post){

    //    return $post->title;
    //}

//});

/*

Route::get('/findwhere', function(){

    $posts=Post::where('id',3)->orderBy('id', 'desc')->take(2)->get();

        return $posts;

});


Route::get('/findmore',function(){

    //$posts=Post::findOrFail(1);

    // return $posts;

    $post=Post::where('user_count','<',50)->firstOrFail();


});


Route::get('/basicinsert2', function(){

    $post= new Post;

    $post->title="hello new eloquent insert 2";
    $post->content="this is content 2";

    $post->save();

});


Route::get('/create',function(){

    Post::create(['title'=>'I am learning','content'=>'a lot']);

});*/
/*
Route::get('/update', function(){

    Post::where('id',2)->where('is_admin',0)->update(['title'=>'I love this method','content'=>'this is the best']);

});
*/
//Route::get('/delete2',function(){

   // $post=Post::find(2);
    // $post->delete();

  //  Post::destroy([4,5]);

    //Post::where('is_admin',0)->delete();

//});
/*

Route::get('/softdelete',function(){

    Post::find(1)->delete();

});

Route::get('/readsoftdelete',function(){

    //$post = Post::find(1);
    //return $post;

   // $post= Post::withTrashed('is_admin',0)->get();
    //return $post;

    $post=POST::onlyTrashed('is_admin',0)->get();
    return $post;
});

Route::get('/restore', function(){

    $post=Post::withTrashed()->where('is_admin',0)->restore();



});

Route::get('/forcedelete', function(){

   Post::onlyTrashed()->where('is_admin',0)->forceDelete();

});*/

/*
|--------------------------------------------------------------------------
| Eloquent Relationships
|--------------------------------------------------------------------------
|
//one to one relationship
Route::get('/user/{id}/post', function($id){

  return User::Find($id)->post->title;

});

Route::get('/post/{id}/user', function($id){

   return Post::find($id)->user->name;
});


//one to many relationship
Route::get('/posts',function(){

    $user = User::find(1);

    foreach($user->posts as $post){

      echo  $post->title . "<br>";
    }

});
//many to many relationship
Route::get('/roles', function(){

 return  Role::all();
});
 //OR we can do like this

Route::get('/user/{id}/role', function($id){

  $user= User::find($id)->roles()->orderBy('id','desc')->get();

  return $user;

    //foreach ($user->roles as $role){

    //  return $role->name;
    //}
});


Route::get('/user/pivot', function(){

   $user=User::find(1);

   foreach ($user->roles as $role){

       echo $role->pivot->created_at;
   }

});

Route::get('/user/country', function (){

    $country = Country::find(3);
    foreach($country->posts as $post){

        return $post->title;
    }
});


//polymorphic Relations

Route::get('/user/photos',function (){
    $user=User::find(1);

    foreach ($user->photos as $photo) {
        return $photo->path;
    }
});

Route::get('/post/{id}/photos',function ($id){
    $post=Post::find($id);

    foreach ($post->photos as $photo) {
        echo $photo->path . "<br>";
    }
});


Route::get('photo/{id}/post', function ($id){

    $photo = Photo::findOrFail($id);

    return $photo->imageable;
});

//polymorphic many to many
Route::get('/tag/{id}', function($id){

    $video= Video::findOrFail($id);

    return $video->name;


});

Route::get('/post/tag', function(){

    $post= Post::find(1);

    foreach($post->tags as $tag){
  echo $tag->name;

    }

});
Route::get('/tag/post', function(){

    $tag= Tag::find(2);

    foreach($tag->posts as $post){
  echo $post->title;

    }

});
*/

/*
--------------------------------------------------------------------------
| CRUD Application
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware'=>'web'],function (){


    Route::resource('/posts','PostsController');

    Route::get('/dates', function () {

    $date = new DateTime('+ 1 week');

    echo $date->format('d-m-y');

    echo '<br>';

    echo Carbon::now()->yesterday()->diffForHumans();

    echo '<br>';

    echo Carbon::now()->addDays(11)->diffForHumans();

    echo '<br>';

    echo Carbon::now()->subHours(49);


    });

    Route::get('/getname', function (){

       $user=User::find(1);

       echo $user->name;


    });
    Route::get('/setname', function (){

       $user=User::find(1);

       $user->name="memolee";

       $user->save();


    });



});




