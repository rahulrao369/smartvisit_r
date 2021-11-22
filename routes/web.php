<?php

use Illuminate\Support\Facades\Route;

//doctor
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\ChatController as ChatDoctor;


use App\Http\Controllers\AgoraVideoController;

//patient
use App\Http\Controllers\Patient\PatientController  as Patient;
use App\Http\Controllers\Patient\ProfileController  as Profile;
use App\Http\Controllers\Patient\PharmacyController as PatientPharmacy;
use App\Http\Controllers\Patient\ChatController     as ChatPatient;


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

Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
 
    return "Cleared!";
});

// Route::get('/', function () {
//   return "<h1>Coming soon.....</h1>";
// });

Route::get('test',[HomeController::class,'sendSms']);

// Route::get('/duration',[HomeController::class,'test'])->name('duration');
// Route::get('/addchild',[HomeController::class,'test'])->name('addchild');
Route::get('/insurance',[HomeController::class,'test'])->name('insurance');
Route::get('/health_profile',[HomeController::class,'test'])->name('health_profile');
Route::get('/symptoms',[HomeController::class,'test'])->name('symptoms');
// Route::get('/visitfor',[HomeController::class,'test'])->name('visitfor');


Route::get('/',[HomeController::class,'index'])->name('/');


Route::get('login',[AuthController::class,'index']);
Route::post('login',[AuthController::class,'login']);

// Route::get('doctor/login',[AuthController::class,'index']);
// Route::post('doctor/login',[AuthController::class,'doctor_login']);



// Route::get('patient/login',[AuthController::class,'patient_index']);
// Route::post('patient/login',[AuthController::class,'patient_login']);


Route::get('patient/register',[AuthController::class,'patient_register']);
Route::post('patient/register',[AuthController::class,'patient_post_register']);


Route::get('doctor/register',[AuthController::class,'doctor_register']);
Route::post('doctor/register',[AuthController::class,'doctor_post_register']);



Route::post('validate-name',[HomeController::class,'validate_name']);

Route::post('validate-email',[HomeController::class,'validate_email']);


Route::post('check-patient-email',[HomeController::class,'check_patient_email']);

Route::post('check-patient-phone',[HomeController::class,'check_patient_phone']);

Route::get('success-page',[HomeController::class,'success_page']);

Route::post('verify-email',[AuthController::class,'verify_email']);

Route::post('validate-address',[HomeController::class,'validate_address']);

Route::post('get-symtoms',[HomeController::class,'get_symtoms']);








//protected routes
Route::group(['prefix'=>'doctor','middleware'=>'auth'],function(){


//call
Route::post('get-token',[AgoraVideoController::class,'token']);

Route::get('dashboard',[DoctorController::class,'index']);

Route::get('accept-patient/{id}/{status}',[DoctorController::class,'accept_patient']);





Route::get('logout',[UserController::class,'destroy']);


Route::get('patients',[PatientController::class,'index']);
Route::get('patient-detail/{id}',[PatientController::class,'patient_detail']);


// soap information
// Route::get('soap',[PatientController::class,'soap']);
Route::post('soap-information',[PatientController::class,'soap_information']);

// patient visit summery form
Route::post('patient-visit-summery',[PatientController::class,'patient_visit_summery']);


Route::get('consults',[ConsultController::class,'show']);

Route::get('consult-patient/{id}/{find_care_id}',[ConsultController::class,'index']);

Route::get('prescribe',[PatientController::class,'prescribe']);



Route::get('clinical-update',[HomeController::class,'clinical_update']);
Route::get('clinical-details/{id}',[HomeController::class,'clinical_details']);


//appointment

Route::get('calendar',[AvailabilityController::class,'index']);
Route::get('availability',[AvailabilityController::class,'store']);
Route::post('available-times',[AvailabilityController::class,'available_times']);
Route::get('availability-edit',[AvailabilityController::class,'availability_edit']);


//bank 
Route::get('payments',[PaymentController::class,'index']);
Route::get('bank-details',[PaymentController::class,'create']);
Route::post('bank-details',[PaymentController::class,'store_bank_details']);



//profile
Route::get('profile',[DoctorController::class,'profile']);
Route::post('profile-image',[DoctorController::class,'profile_image']);
Route::post('get-state',[HomeController::class,'get_state']);
Route::post('get-city',[HomeController::class,'get_city']);
Route::post('form-load-data',[HomeController::class,'form_load_data']);
Route::post('add-doctor-information',[DoctorController::class,'add_doctor_information']);
Route::post('change-password',[DoctorController::class,'change_password']);
Route::post('notification-setting',[DoctorController::class,'notification_setting']);
Route::get('ordertest',[PatientController::class,'ordertest']);




// Route::get('logout',[DoctorController::class,'destroy']);
Route::get('logout',[AuthController::class,'logout']);



//chat system
Route::get('inbox',[ChatDoctor::class,'index']);
Route::get('chat/{id}',[ChatDoctor::class,'chat']);
Route::post('send-msg',[ChatDoctor::class,'send_msg']);
Route::post('get-msg',[ChatDoctor::class,'get_msg']);



Route::get('calling/{patient_id}',[HomeController::class,'calling']);



Route::post('get-my-appointments',[AvailabilityController::class,'get_my_appointments']);

Route::post('get-seen-status',[ChatDoctor::class,'get_seen_status']);



});






//protected routes
Route::group(['middleware'=>'auth','prefix'=>'patient'],function(){

Route::get('dashboard',[Patient::class,'index']);

// call check 
Route::post('check-for-call',[Patient::class,'check_for_call']);

//accept call
Route::post('accept-call',[Patient::class,'accept_call']);

//reject call
Route::post('reject-call',[Patient::class,'reject_call']);

Route::get('profile',[Profile::class,'index']);

Route::post('profile',[Profile::class,'store']);

Route::get('find-care/{id}',[Patient::class,'find_care']);

Route::post('find-care',[Patient::class,'find_care_post']);

Route::get('pharmacy',[PatientPharmacy::class,'pharmacy']);

Route::post('search-pharmacy',[PatientPharmacy::class,'pharmacy']);

Route::get('pharmacy-details/{id}',[PatientPharmacy::class,'pharmacy_details']);

Route::get('my-lab',[Patient::class,'my_lab']);

Route::get('alerts',[Patient::class,'alerts']);



// Route::get('logout',[Patient::class,'destroy']);
Route::get('logout',[AuthController::class,'logout']);


//chat system
Route::get('inbox',[ChatPatient::class,'index']);
Route::get('chat/{id}',[ChatPatient::class,'chat']);
Route::post('send-msg',[ChatPatient::class,'send_msg']);
Route::post('get-msg',[ChatPatient::class,'get_msg']);




// payment 
Route::get('payment',[PaymentController::class,'payment_page']);
Route::post('payment',[PaymentController::class,'payment_charge']);


Route::get('visitfor',[Patient::class,'visitfor']);


Route::get('addchild',[Patient::class,'addchild']);

Route::post('addchild',[Patient::class,'store_child']);

Route::get('delete-child/{id}',[Patient::class,'delete_child']);

Route::get('/duration',[Patient::class,'duration']);

Route::get('calling/{call_id}',[Patient::class,'calling']);


Route::post('get-seen-status',[ChatPatient::class,'get_seen_status']);


});


Route::get('forgetpassword',[HomeController::class,'forgetpassword']);
Route::post('send-mail-forget-password',[HomeController::class,'send_mail_forget_password']);
Route::get('forget-password',[HomeController::class,'forgetpassword']);
Route::get('reset-password',[HomeController::class,'reset_password']);
Route::post('reset-password',[HomeController::class,'reset_password']);






