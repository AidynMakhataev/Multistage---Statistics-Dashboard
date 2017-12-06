<?php


Auth::routes();


Route::group(['middleware' => 'role:super-admin'], function () {
    Route::resource('admin/permission', 'Admin\\PermissionController');
    Route::resource('admin/role', 'Admin\\RoleController');
    Route::resource('admin/user', 'Admin\\UserController');
    Route::resource('admin/projects', 'Admin\\ProjectsController');
});

Route::group(['middleware' => 'role:admin'], function () {

});

Route::view('/', 'dashboard.index')->middleware('role:user');

Route::get('/test', function () {
   $user = App\User::find(3);
   return $user->project;
});





Route::resource('admin/digital-reports', 'Admin\\DigitalReportsController');