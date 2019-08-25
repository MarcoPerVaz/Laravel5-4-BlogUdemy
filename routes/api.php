<?php

Route::get('posts', 'PagesController@home');
Route::get('blog/{post}', 'PostsController@show');
Route::get('categories/{category}', 'CategoriesController@show');
Route::get('tags/{tag}', 'TagsController@show');
Route::get('archivo', 'PagesController@archive');
Route::get('archivo', 'PagesController@archive');
Route::post('messages', function(){
  // Aquí va la validación de datos
  // Aquí va la información para enviar el email
  return response()->json([
    'status' => 'OK'
  ]);
});
