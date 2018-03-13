<?php

// src/Routes/web.php
Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('admin/tags', 'Vadiasov\Tags\Controllers\TagsController@index')->name('admin/tags');
    Route::get('admin/tags/create', 'Vadiasov\Tags\Controllers\TagsController@create')->name('admin/tags/create');
    Route::post('admin/tags/create', 'Vadiasov\Tags\Controllers\TagsController@store');
    Route::get('admin/tags/{id}/edit', 'Vadiasov\Tags\Controllers\TagsController@edit');
    Route::post('admin/tags/{id}/edit', 'Vadiasov\Tags\Controllers\TagsController@update');
    Route::get('admin/tags/{id}/delete', 'Vadiasov\Tags\Controllers\TagsController@destroy');
    
    Route::get('admin/get_tag', 'Vadiasov\Tags\Controllers\TagsController@showUser');
    
    /* Demo Test */
    Route::get('tags_test_todos', function(){
        return 'Here goes the tags list';
    });
});
