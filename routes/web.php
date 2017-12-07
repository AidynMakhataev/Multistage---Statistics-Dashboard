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
   $user = App\User::find(1);
   $user->notify(new App\Notifications\PostFacebookNotification());
   return 'done';
});





Route::resource('admin/digital-reports', 'Admin\\DigitalReportsController');
Route::resource('admin/smm-reports', 'Admin\\SmmReportsController');