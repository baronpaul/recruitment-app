<?php

Route::group(['namespace' => 'Admin'], function() {

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    //Dashboard
    Route::get('/', 'AdminHomeController@index')->name('admin.dashboard');
    
    //AdminOrganization routes
    Route::get('/organizations', 'AdminOrganizationsController@index')->name('admin.organizations');
    Route::get('/organizations/create', 'AdminOrganizationsController@create')->name('admin.organizations.create');
    Route::post('/organizations/store', 'AdminOrganizationsController@store')->name('admin.organizations.store');
    Route::get('/organizations/detail/{id}', 'AdminOrganizationsController@detail')->name('admin.organizations.detail');
    Route::get('/organizations/edit/{id}', 'AdminOrganizationsController@edit')->name('admin.organizations.edit');
    Route::post('/organizations/update}', 'AdminOrganizationsController@update')->name('admin.organizations.update');
    Route::get('/organizations/delete/{id}}', 'AdminOrganizationsController@delete')->name('admin.organizations.delete');
    Route::post('/organizations/destroy}', 'AdminOrganizationsController@destroy')->name('admin.organizations.destroy');


    //AdminJobProfile Routes
    Route::get('/job_profiles', 'AdminJobProfileController@index')->name('admin.job_profiles');
    Route::get('/job_profiles/create', 'AdminJobProfileController@create')->name('admin.job_profiles.create');
    Route::post('/job_profiles/store', 'AdminJobProfileController@store')->name('admin.job_profiles.store');
    Route::get('/job_profiles/detail/{id}', 'AdminJobProfileController@detail')->name('admin.job_profiles.detail');
    Route::get('/job_profiles/edit/{id}', 'AdminJobProfileController@edit')->name('admin.job_profiles.edit');
    Route::post('/job_profiles/update', 'AdminJobProfileController@update')->name('admin.job_profiles.update');
    Route::get('/job_profiles/delete/{id}', 'AdminJobProfileController@delete')->name('admin.job_profiles.delete');
    Route::post('/job_profiles/destroy', 'AdminJobProfileController@destroy')->name('admin.job_profiles.destroy');


    //AdminJobApplications Routes
    Route::get('/job_applications', 'AdminJobApplicationController@index')->name('admin.job_applications');
    Route::get('/job_applications/job/{id}', 'AdminJobApplicationController@job')->name('admin.job_applications.job');
    Route::get('/job_applications/job/detail/{id}', 'AdminJobApplicationController@detail')->name('admin.job_applications.detail');
    Route::get('/job_applications/job/filter/{id}', 'AdminJobApplicationController@filter')->name('admin.job_applications.filter');
    Route::post('/job_applications/job/do_filter', 'AdminJobApplicationController@do_filter')->name('admin.job_applications.do_filter');
    Route::get('/job_applications/job/shortlist/{id}', 'AdminJobApplicationController@shortlist')->name('admin.job_applications.shortlist');
    Route::get('/job_applications/job/suspend/{id}', 'AdminJobApplicationController@suspend')->name('admin.job_applications.suspend');


    //Admin Users Routes
    Route::get('/users', 'AdminUsersController@index')->name('admin.users');    
    Route::get('/users/detail/{id}', 'AdminUsersController@detail')->name('admin.users.detail');
    Route::get('/users/suspend/{id}', 'AdminUsersController@suspend')->name('admin.users.suspend'); 
    

    //Portal Admin Routes
    Route::get('/portal_admins', 'PortalAdminController@index')->name('admin.portal_admins.index');
    Route::get('/portal_admins/create', 'PortalAdminController@create')->name('admin.portal_admins.create');
    Route::post('/portal_admins/store', 'PortalAdminController@store')->name('admin.portal_admins.store');
    Route::get('/portal_admins/edit/{id}', 'PortalAdminController@edit')->name('admin.portal_admins.edit');
    Route::post('/portal_admins/update', 'PortalAdminController@update')->name('admin.portal_admins.update');
    Route::get('/portal_admins/change_password/{id}', 'PortalAdminController@change_password')->name('admin.portal_admins.change_password');
    Route::post('/portal_admins/update_password', 'PortalAdminController@update_password')->name('admin.portal_admins.update_password');
    Route::get('/portal_admins/delete/{id}', 'PortalAdminController@delete')->name('admin.portal_admins.delete');
    Route::post('/portal_admins/destroy', 'PortalAdminController@destroy')->name('admin.portal_admins.destroy');


    //Portal Settings Routes
    Route::get('/portal_settings', 'Portal SettingsController@index')->name('admin.portal_settings');   


});