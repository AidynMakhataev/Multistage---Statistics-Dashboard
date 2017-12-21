<?php


Auth::routes();


Route::group(['middleware' => 'role:super-admin'], function () {
    Route::redirect('/admin', 'admin/user');
    Route::resource('admin/permission', 'Admin\\PermissionController');
    Route::resource('admin/role', 'Admin\\RoleController');
    Route::resource('admin/user', 'Admin\\UserController');
    Route::resource('admin/projects', 'Admin\\ProjectsController');
    Route::resource('admin/digital-reports', 'Admin\\DigitalReportsController');
    Route::resource('admin/smm-reports', 'Admin\\SmmReportsController');
});

Route::view('/instagram', 'home');

Route::redirect('/', '/login');
Route::middleware('role:user')->group(function () {
    Route::get('/digital', 'FrontendController@digital')->name('digital')->middleware('permission:view-digital-report');
    Route::get('/digital/period/{id}','FrontendController@getDigitalPeriod')->name('digitalPeriod')->middleware('permission:view-digital-report');


    Route::get('/smm', 'FrontendController@smm')->name('smm')->middleware('permission:view-smm-report');
    Route::get('/smm/period/{id}','FrontendController@getSmmPeriod')->name('smmPeriod')->middleware('permission:view-smm-report');
});

Route::get('/test', function () {
    $project = App\Project::find(1);
    return $project->instagram;
});






Route::resource('admin/comments', 'Admin\\CommentsController');