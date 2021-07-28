<?php

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


Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'index',
]);

Route::get('/employers', [
	'uses' => 'HomeController@employers',
	'as' => 'employers',
]);

Route::get('/jobseekers', [
	'uses' => 'HomeController@jobseekers',
	'as' => 'jobseekers',
]);

Route::get('/jobs', [
	'uses' => 'HomeController@jobs',
	'as' => 'jobs',
]);

Route::get('/job/{url}', [
	'uses' => 'HomeController@job_detail',
	'as' => 'jobs.detail'
]);


Route::get('/contact', [
	'uses' => 'StaticPagesController@contact',
	'as' => 'contact'
]);


Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);

Route::get('500',['as'=>'500','uses'=>'ErrorHandlerController@errorCode500']);


Auth::routes();

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {

	
	
	Route::get('/profile', [
		'uses' => 'ProfileController@index',
		'as' => 'profile'
	]);

	Route::get('/profile/edit', [
		'uses' => 'ProfileController@edit',
		'as' => 'profile.edit'
	]);

	Route::post('/profile/update', [
		'uses' => 'ProfileController@update',
		'as' => 'profile.update'
	]);

	Route::get('/profile/edit_profile_pic', [
		'uses' => 'ProfileController@edit_profile_pic',
		'as' => 'profile.edit_profile_pic'
	]);

	Route::post('/profile/update_profile_pic', [
		'uses' => 'ProfileController@update_profile_pic',
		'as' => 'profile.update_profile_pic'
	]);
	
	Route::get('/profile/upload_resume', [
		'uses' => 'ProfileController@upload_resume',
		'as' => 'profile.upload_resume'
	]);

	Route::post('/profile/do_upload_resume', [
		'uses' => 'ProfileController@do_upload_resume',
		'as' => 'profile.do_upload_resume'
	]);
	

	Route::get('/profile/education', [
		'uses' => 'ProfileController@education',
		'as' => 'profile.education'
	]);

	Route::get('/profile/add_education', [
		'uses' => 'ProfileController@add_education',
		'as' => 'profile.add_education'
	]);

	Route::post('/profile/store_education', [
		'uses' => 'ProfileController@store_education',
		'as' => 'profile.store_education'
	]);

	Route::get('/profile/edit_education/{id}', [
		'uses' => 'ProfileController@edit_education',
		'as' => 'profile.edit_education'
	]);

	Route::post('/profile/update_education', [
		'uses' => 'ProfileController@update_education',
		'as' => 'profile.update_education'
	]);

	Route::get('/profile/delete_education/{id}', [
		'uses' => 'ProfileController@delete_education',
		'as' => 'profile.delete_education'
	]);

	Route::post('/profile/destroy_education', [
		'uses' => 'ProfileController@destroy_education',
		'as' => 'profile.destroy_education'
	]);

	Route::get('/profile/employment', [
		'uses' => 'ProfileController@employment',
		'as' => 'profile.employment'
	]);

	Route::get('/profile/add_employment', [
		'uses' => 'ProfileController@add_employment',
		'as' => 'profile.add_employment'
	]);

	Route::post('/profile/store_employment', [
		'uses' => 'ProfileController@store_employment',
		'as' => 'profile.store_employment'
	]);

	Route::get('/profile/edit_employment/{id}', [
		'uses' => 'ProfileController@edit_employment',
		'as' => 'profile.edit_employment'
	]);

	Route::post('/profile/update_employment', [
		'uses' => 'ProfileController@update_employment',
		'as' => 'profile.update_employment'
	]);

	Route::get('/profile/delete_employment/{id}', [
		'uses' => 'ProfileController@delete_employment',
		'as' => 'profile.delete_employment'
	]);

	Route::post('/profile/destroy_employment', [
		'uses' => 'ProfileController@destroy_employment',
		'as' => 'profile.destroy_employment'
	]);

	Route::get('/profile/professional_associations', [
		'uses' => 'ProfileController@professional_associations',
		'as' => 'profile.professional_associations'
	]);

	Route::get('/profile/add_professional_association', [
		'uses' => 'ProfileController@add_professional_association',
		'as' => 'profile.add_professional_association'
	]);

	Route::post('/profile/store_professional_association', [
		'uses' => 'ProfileController@store_professional_association',
		'as' => 'profile.store_professional_association'
	]);

	Route::get('/profile/edit_professional_association/{id}', [
		'uses' => 'ProfileController@edit_professional_association',
		'as' => 'profile.edit_professional_association'
	]);

	Route::post('/profile/update_professional_association', [
		'uses' => 'ProfileController@update_professional_association',
		'as' => 'profile.update_professional_association'
	]);

	Route::get('/profile/delete_professional_association/{id}', [
		'uses' => 'ProfileController@delete_professional_association',
		'as' => 'profile.delete_professional_association'
	]);

	Route::post('/profile/destroy_professional_association', [
		'uses' => 'ProfileController@destroy_professional_association',
		'as' => 'profile.destroy_professional_association'
	]);

	Route::get('/profile/computer_skills', [
		'uses' => 'ProfileController@computer_skills',
		'as' => 'profile.computer_skills'
	]);

	Route::get('/profile/add_computer_skills', [
		'uses' => 'ProfileController@add_computer_skills',
		'as' => 'profile.add_computer_skills'
	]);

	Route::post('/profile/store_computer_skills', [
		'uses' => 'ProfileController@store_computer_skills',
		'as' => 'profile.store_computer_skills'
	]);

	Route::get('/profile/edit_computer_skill/{id}', [
		'uses' => 'ProfileController@edit_computer_skill',
		'as' => 'profile.edit_computer_skill'
	]);

	Route::post('/profile/update_computer_skill', [
		'uses' => 'ProfileController@update_computer_skill',
		'as' => 'profile.update_computer_skill'
	]);

	Route::get('/profile/delete_computer_skill/{id}', [
		'uses' => 'ProfileController@delete_computer_skill',
		'as' => 'profile.delete_computer_skill'
	]);

	Route::post('/profile/destroy_computer_skill', [
		'uses' => 'ProfileController@destroy_computer_skill',
		'as' => 'profile.destroy_computer_skill'
	]);

	Route::get('/profile/applicant_references', [
		'uses' => 'ProfileController@applicant_references',
		'as' => 'profile.applicant_references'
	]);

	Route::get('/profile/add_applicant_references', [
		'uses' => 'ProfileController@add_applicant_references',
		'as' => 'profile.add_applicant_references'
	]);

	Route::post('/profile/store_applicant_references', [
		'uses' => 'ProfileController@store_applicant_references',
		'as' => 'profile.store_applicant_references'
	]);

	Route::get('/profile/edit_applicant_reference/{id}', [
		'uses' => 'ProfileController@edit_applicant_reference',
		'as' => 'profile.edit_applicant_reference'
	]);

	Route::post('/profile/update_applicant_reference', [
		'uses' => 'ProfileController@update_applicant_reference',
		'as' => 'profile.update_applicant_reference'
	]);

	Route::get('/profile/delete_applicant_reference/{id}', [
		'uses' => 'ProfileController@delete_applicant_reference',
		'as' => 'profile.delete_applicant_reference'
	]);

	Route::post('/profile/destroy_applicant_reference', [
		'uses' => 'ProfileController@destroy_applicant_reference',
		'as' => 'profile.destroy_applicant_reference'
	]);

	Route::get('/profile/additional_info', [
		'uses' => 'ProfileController@additional_info',
		'as' => 'profile.additional_info'
	]);

	Route::get('/profile/add_additional_info', [
		'uses' => 'ProfileController@add_additional_info',
		'as' => 'profile.add_additional_info'
	]);

	Route::post('/profile/store_additional_info', [
		'uses' => 'ProfileController@store_additional_info',
		'as' => 'profile.store_additional_info'
	]);

	Route::get('/profile/edit_additional_info/{id}', [
		'uses' => 'ProfileController@edit_additional_info',
		'as' => 'profile.edit_additional_info'
	]);

	Route::post('/profile/update_additional_info', [
		'uses' => 'ProfileController@update_additional_info',
		'as' => 'profile.update_additional_info'
	]);

	
	Route::get('/job_applications', [
		'uses' => 'JobApplicationController@index',
		'as' => 'job_application.index'
	]);

	Route::get('/start_application/{url}', [
		'uses' => 'JobApplicationController@start',
		'as' => 'job_application.start'
	]);

	Route::post('/job_application/store', [
		'uses' => 'JobApplicationController@store_application',
		'as' => 'job_application.store_application'
	]);

	Route::get('/job_application/edit/{id}', [
		'uses' => 'JobApplicationController@edit',
		'as' => 'job_application.edit'
	]);

	Route::post('/job_application/update', [
		'uses' => 'JobApplicationController@update',
		'as' => 'job_application.update'
	]);


	Route::get('/job_application/education/{id}', [
		'uses' => 'JobApplicationController@education',
		'as' => 'job_application.education'
	]);

	Route::post('/job_application/store_education', [
		'uses' => 'JobApplicationController@store_education',
		'as' => 'job_application.store_education'
	]);

	Route::get('/job_application/edit_education/{id}', [
		'uses' => 'JobApplicationController@edit_education',
		'as' => 'job_application.edit_education'
	]);

	Route::post('/job_application/update_education', [
		'uses' => 'JobApplicationController@update_education',
		'as' => 'job_application.update_education'
	]);


	Route::get('/job_application/employment/{id}', [
		'uses' => 'JobApplicationController@employment',
		'as' => 'job_application.employment'
	]);

	Route::post('/job_application/store_employment', [
		'uses' => 'JobApplicationController@store_employment',
		'as' => 'job_application.store_employment'
	]);

	Route::get('/job_application/edit_employment/{id}', [
		'uses' => 'JobApplicationController@edit_employment',
		'as' => 'job_application.edit_employment'
	]);

	Route::post('/job_application/update_employment', [
		'uses' => 'JobApplicationController@update_employment',
		'as' => 'job_application.update_employment'
	]);

	Route::get('/job_application/professional_associations/{id}', [
		'uses' => 'JobApplicationController@professional_associations',
		'as' => 'job_application.professional_associations'
	]);

	Route::post('/job_application/store_professional_association', [
		'uses' => 'JobApplicationController@store_professional_associations',
		'as' => 'job_application.store_professional_association'
	]);

	Route::get('/job_application/edit_professional_association/{id}', [
		'uses' => 'JobApplicationController@edit_professional_associations',
		'as' => 'job_application.edit_professional_association'
	]);

	Route::post('/job_application/update_professional_association', [
		'uses' => 'JobApplicationController@update_professional_associations',
		'as' => 'job_application.update_professional_association'
	]);

	Route::get('/job_application/computer_skills/{id}', [
		'uses' => 'JobApplicationController@computer_skills',
		'as' => 'job_application.computer_skills'
	]);

	Route::post('/job_application/store_computer_skills', [
		'uses' => 'JobApplicationController@store_computer_skills',
		'as' => 'job_application.store_computer_skills'
	]);

	Route::get('/job_application/edit_computer_skills/{id}', [
		'uses' => 'JobApplicationController@edit_computer_skills',
		'as' => 'job_application.edit_computer_skills'
	]);

	Route::post('/job_application/update_computer_skills', [
		'uses' => 'JobApplicationController@update_computer_skills',
		'as' => 'job_application.update_computer_skills'
	]);

	Route::get('/job_application/applicant_reference/{id}', [
		'uses' => 'JobApplicationController@applicant_reference',
		'as' => 'job_application.applicant_reference'
	]);

	Route::post('/job_application/store_applicant_reference', [
		'uses' => 'JobApplicationController@store_applicant_reference',
		'as' => 'job_application.store_applicant_reference'
	]);

	Route::get('/job_application/edit_applicant_reference/{id}', [
		'uses' => 'JobApplicationController@edit_applicant_reference',
		'as' => 'job_application.edit_applicant_reference'
	]);

	Route::post('/job_application/update_applicant_reference', [
		'uses' => 'JobApplicationController@update_applicant_reference',
		'as' => 'job_application.update_applicant_reference'
	]);

	Route::get('/job_application/additional_info/{id}', [
		'uses' => 'JobApplicationController@additional_info',
		'as' => 'job_application.additional_info'
	]);

	Route::post('/job_application/store_additional_info', [
		'uses' => 'JobApplicationController@store_additional_info',
		'as' => 'job_application.store_additional_info'
	]);

	Route::get('/job_application/edit_additional_info/{id}', [
		'uses' => 'JobApplicationController@edit_additional_info',
		'as' => 'job_application.edit_additional_info'
	]);

	Route::post('/job_application/update_additional_info', [
		'uses' => 'JobApplicationController@update_additional_info',
		'as' => 'job_application.update_additional_info'
	]);

	Route::get('/job_application/complete/{id}', [
		'uses' => 'JobApplicationController@complete',
		'as' => 'job_application.complete'
	]);


});