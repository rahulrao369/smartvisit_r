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

Route::get('/admin','AuthController@index');
Route::post('admin/login','AuthController@create');

//forget password
Route::get('admin/forget-password','AuthController@store');

Route::post('admin/forget-password','AuthController@show');

//protected routes
Route::group(['prefix'=>'admin','middleware' => ['admin']],function() {

Route::get('dashboard', 'AdminController@index');


//product
Route::get('doctor','DoctorController@index');

Route::get('doctor/create','DoctorController@create');
Route::post('doctor/store','DoctorController@store');

Route::get('doctor/show/{id}','DoctorController@show');

Route::get('doctor/edit/{id}','DoctorController@edit');
Route::post('doctor/update','DoctorController@update');

Route::get('doctor/delete/{od}','DoctorController@destroy');

Route::post('doctor/quantity','DoctorController@product_quantity');




//client
Route::get('patients','PatientController@index');

Route::get('patient-create','PatientController@create');
Route::post('patient-store','PatientController@store');

Route::get('patient-show/{id}','PatientController@show');

Route::get('patient-edit/{id}','PatientController@edit');
Route::post('patient-update','PatientController@update');

Route::get('patient-delete/{id}','PatientController@destroy');



//clinical updates

Route::get('clinical-update','AdminController@clinical_update');
Route::get('clinical-create','AdminController@clinical_create');
Route::post('clinical-store','AdminController@clinical_store');
Route::get('clinical-edit/{id}','AdminController@clinical_edit');
Route::post('clinical-update-post','AdminController@clinical_update_post');
Route::get('clinical-delete/{id}','AdminController@clinical_delete');





//reason

Route::get('reason','ReasonController@index');
Route::get('reason-create','ReasonController@create');
Route::post('reason-store','ReasonController@store');
Route::get('reason-edit/{id}','ReasonController@edit');
Route::post('reason-update','ReasonController@update');
Route::get('reason-delete/{id}','ReasonController@destroy');



//symptoms

Route::get('symptoms','SymptomController@index');
Route::get('symptom-create','SymptomController@create');
Route::post('symptom-store','SymptomController@store');
Route::get('symptom-edit/{id}','SymptomController@edit');
Route::post('symptom-update','SymptomController@update');
Route::get('symptom-delete/{id}','SymptomController@destroy');


// subsymptoma
Route::get('sub-symptoms','SymptomController@subsymptoms');

Route::get('create-subsymptoms-category','SymptomController@create_subsymptoms_category');
Route::post('create-subsymptoms-category','SymptomController@create_subsymptoms_category_store');

Route::get('sub-category-subsymptoms-edit/{id}','SymptomController@sub_category_subsymptoms_edit');
Route::post('sub-subsymptoms-update','SymptomController@sub_subsymptoms_update');

Route::get('sub-subsymptoms-delete/{id}','SymptomController@sub_subsymptoms_delete');



// 
Route::get('extra-subsymptoms/{id}','SymptomController@extra_subsymptoms');

Route::get('create-subsymptoms/{id}','SymptomController@create_subsymptoms');
Route::post('create-subsymptoms','SymptomController@create_subsymptoms_store');

Route::get('sub-symptoms-edit/{id}','SymptomController@sub_symptoms_edit');

Route::post('sub-symptoms-update','SymptomController@sub_symptoms_update');





// medical-conditions

Route::get('medical-conditions','MedicalController@index');
Route::get('medical-conditions-create','MedicalController@create');
Route::post('medical-conditions-store','MedicalController@store');
Route::get('medical-conditions-edit/{id}','MedicalController@edit');
Route::post('medical-conditions-update','MedicalController@update');
Route::get('medical-conditions-delete/{id}','MedicalController@destroy');



// slot

Route::get('slot','SlotController@index');
Route::get('slot-create','SlotController@create');
Route::post('slot-store','SlotController@store');
Route::get('slot-edit/{id}','SlotController@edit');
Route::post('slot-update','SlotController@update');
Route::get('slot-delete/{id}','SlotController@destroy');



//profile
Route::get('profile','AdminController@create');
Route::post('profile','AdminController@store');

//change password 
Route::get('change-password','AdminController@change_password');
Route::post('change-password','AdminController@store_change_password');



// appointments
Route::get('appointments','AdminController@appointments');
Route::get('appointment-details/{id}','AdminController@appointment_details');

// 
Route::get('transactions','AdminController@transactions');

//logout
Route::get('logout','AdminController@destroy');


});
