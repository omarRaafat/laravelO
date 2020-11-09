<?php


Route::group(["prefix" => 'admin' , 'namespace' =>'BackHome'] ,function (){

    Route::get('/test', 'HomeController@index')->name('home');


});

?>
