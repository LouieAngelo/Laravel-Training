<?php

use Illuminate\Support\Facades\Route;
use App\User;
Use App\Models\{Photo,Staff,Product,Address,Post};
Use App\Models\{Pots,Video,Tag,Taggable};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//////////////////////////////////////////////

//Secthion 14 - CRUD Eloquent One to Many Relationship

/////////////////////////////////////////////

Route::get('/Section_13/Insert/Post',function(){
$user = User::findOrFail(1);

$post = new Post(['title'=>'Subject line','body'=>'I love Laravel']);
$user->post()->save($post);
return "Successfully Created";
});

Route::get('/Section_13/Find/Post',function(){
    $user = User::findOrFail(1); 
    $post = $user->post;

        foreach ($post as $post){
            echo $post->title;
        };
});


Route::get('/Section_13/Update/Post',function(){
    $user = User::findOrFail(1); 
   $post = $user->post()->whereId(2)
   ->update(['title'=>'Updated Title','body'=>'Updated Content']);
   return 'Successfully updated';
});


Route::get('/Section_13/Delete/Post',function(){
    $user = User::findOrFail(1); 
   $post = $user->post()->whereId(2)
   ->delete();
return "Successfully Deleted";
});

//////////////////////////////////////////////

//Secthion 14 - CRUD Eloquent One to Many Relationship

/////////////////////////////////////////////

//////////////////////////////////////////////

//Secthion 15 - CRUD Eloquent One to Many Relationship

/////////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Section15/Insert/User/Address',function(){
$user= User::findOrFail(1);
$address = New Address;
$address->address_name="221 1st Guingona Subdivision ,Cebu City";
$user->address()->save($address);
return 'Successfull insertd';
});

Route::get('/Section15/Updated/Infor',function(){
    $address = Address::whereUserId(1)->first();
    $address->address_name="fatima Duljo Cebu City";
    $address->save();
    return "Successfully updated";
});

Route::get('/Section15/Show/User',function(){
    $user = User::findOrFail(1);
    echo $user->address->address_name;

});

Route::get('/Section15/Delete/User',function(){
    $user = User::findOrFail(1);
  $user->address->delete();
  return "Successfully deleted";

});

//////////////////////////////////////////////

//End *** Section 15 - CRUD Eloquent One to Many Relationship

/////////////////////////////////////////////


//////////////////////////////////////////////

//Section 16 - CRUD Eloquent Polymorphic Relationship

/////////////////////////////////////////////


Route::get('/Section_16/Polymorpic/Insert/Photo',function(){
    $staff = Staff::find(1);
    $staff->photo()->create(['path'=>'example.jpg']);
    return "Photos Inserted";
});


Route::get('/Section_16/Polymorpic/find',function(){
 $staff = Staff::findOrFail(2);
//  foreach($staff->photo as $photo)
//  {
//     echo $photo->path . "<br>";
//  }

 echo $staff->photo;

});

Route::get('/Section_16/Polymorpic/update',function(){
    $staff = Staff::findOrFail(1);
    $photo = $staff->photo()->first();
    $photo->path = "Updated Laravel Course.jpg";
    $photo->save(); 
    return "Successfully updated";
   
   });

   Route::get('/Section_16/Polymorpic/delete',function(){
    $staff = Staff::findOrFail(1);
    $photo = $staff->photo();
    $photo = $staff->photo()->whereId(1);
    $photo->delete();
    return "Successfully Deleted";
   
   });



//////////////////////////////////////////////

//End **** Section 16 - CRUD Eloquent Polymorphic Relationship

/////////////////////////////////////////////




//////////////////////////////////////////////

//Section 17 - CRUD Eloquent Many to Many Polymorphic Relationship

/////////////////////////////////////////////

Route::get('/Section_17/Create/',function(){

    $post =  Pots::create(['name'=>'My with Tag 2']);
    $tag1 = Tag::find(2);
    $post->tags()->save($tag1);

    $movie = Video::create(['name'=>'Laravel Javascript.mov']);
    $tag2 = Tag::find(2);
    $movie->tags()->save($tag2);
    return 'successfully created post and movie';
});



Route::get('/Section_17/Find/',function(){

    $post =  Pots::findOrFail(2);
foreach($post->tags as $tags){
    echo $tags;
};
});

Route::get('/Section_17/Update/',function(){
$post =  Pots::findOrFail(1);
$tag = Tag::find(3);
// $post->tags()->attach($tag);
$post->tags()->sync([1]);
// foreach($post->tags as $tags){
//     $tags->whereName('php')->update(['name'=>'Laravel Php']);
// };

return "successfully updated";
});


Route::get('/Section_17/Delete/',function(){
    $post =  Pots::find(2);
    
    foreach($post->tags as $tags){
         $tags->whereId(2)->delete();
    };
    
    return "successfully Deleted";
    });

//////////////////////////////////////////////

//End **** Section 17 - CRUD Eloquent Many to Many Polymorphic Relationship

/////////////////////////////////////////////


//////////////////////////////////////////////

//Section 18 - Forms and Validation

/////////////////////////////////////////////



Route::resource('Posts','PostsController');
Route::resource('section18','Section18_Controller');



//////////////////////////////////////////////

//Section 18 - Forms and Validation

/////////////////////////////////////////////
