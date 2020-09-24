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

Route::get('/', function () {
    return view('frontend/home/index');
});

Route::get('/about-us', function () {
    return view('frontend/About/index');
});
Route::get('/academics', function () {
    return view('frontend/Acadmics/index');
});
Route::get('/extra-curricular-activities', function () {
    return view('frontend/Extra-curricular-activities/index');
});
Route::get('/admissions', function () {
    return view('frontend/Admission/index');
});
Route::get('/committees', function () {
    return view('frontend/CBSC-Section/index');
});
Route::get('/transfer-certificate', function () {
    return view('frontend/CBSC-Section/index');
});
Route::get('/cbsc-information', function () {
    return view('frontend/CBSC-Section/index');
});
Route::get('/transfer-certificate', function () {
    return view('frontend/auditors-report/index');
});
Route::get('/auditors-report', function () {
    return view('frontend/auditors-report/index');
});
Route::get('/contact-us', function () {
    return view('frontend/ContactUs/index');
});
Route::get('/gallery', function () {
    return view('frontend/More/gallery');
});
Route::get('/openings', function () {
    return view('frontend/More/openings');
});
Route::get('/principals-message', function () {
    return view('frontend/More/principals-message');
});

//Student routes start

// Route::get('/student', function () {

//     return view('admin/students');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::Resource('student_detail', 'Admin\students\studentController');
Route::get('student', 'Admin\students\studentController@studentDashboard')->name('mystudent');

Route::post('student_filter', 'Admin\students\studentController@student_filter')->name('student_filter');

// get state....................
Route::post('get_p_state/', 'Admin\students\studentController@getState')->name('get_p_state');
// get city....................
Route::post('get_p_city/', 'Admin\students\studentController@getCity')->name('get_p_city');

// get state for academic details....................
Route::post('get_academic_state/', 'Admin\students\studentController@getAcadmicState')->name('get_academic_state');
// get city academic details....................
Route::post('get_academic_country/', 'Admin\students\studentController@getAcadmicCountry')->name('get_academic_country');



// Student classes route....................
Route::get('master/classes', 'Admin\master\masterController@studentClasses')->name('classes');
Route::post('master/classes/add', 'Admin\master\masterController@addClasses')->name('classes-add');
Route::put('master/classes/{id}/update', 'Admin\master\masterController@updateClasses')->name('classes-update');

// Student batches route....................
Route::get('master/batches', 'Admin\master\masterController@studentBatches')->name('batch');
Route::post('master/batches/batches_add', 'Admin\master\masterController@addBatch')->name('batches_add');
Route::put('master/batches/{id}/batches_update', 'Admin\master\masterController@updateBatch')->name('batches_update');

// Student section route....................
Route::get('master/section', 'Admin\master\masterController@studentSection')->name('section');
Route::post('master/section/section_add', 'Admin\master\masterController@addSection')->name('section_add');
Route::put('master/section/{id}/section_update', 'Admin\master\masterController@updateSection')->name('section_update');

// Student cast-category route....................
Route::get('master/cast-category', 'Admin\master\masterController@castCategory')->name('cast-category');
Route::post('master/cast-category/category_add', 'Admin\master\masterController@addcastCategory')->name('category_add');
Route::put('master/cast-category/{id}/category_update', 'Admin\master\masterController@updatecastCategory')->name('category_update');

// std Religion route....................
Route::get('master/religions', 'Admin\master\masterController@stdReligion')->name('religions');
Route::post('master/religions/religions_add', 'Admin\master\masterController@addStdReligion')->name('religions_add');
Route::put('master/religions/{id}/religions_update', 'Admin\master\masterController@updateStdReligion')->name('religions_update');

// std Blood group route....................
Route::get('master/blood-group', 'Admin\master\masterController@stdBloodGroups')->name('blood-group');
Route::post('master/blood-group/blood_group_add', 'Admin\master\masterController@addStdBloodGroup')->name('blood_group_add');
Route::put('master/blood-group/{id}/blood_group_update', 'Admin\master\masterController@updateStdBloodGroup')->name('blood_group_update');


// std Nationality route....................
Route::get('master/nationality', 'Admin\master\masterController@stdNationalities')->name('nationality');
Route::post('master/nationality/nationality_add', 'Admin\master\masterController@addStdNationalities')->name('nationality_add');
Route::put('master/nationality/{id}/nationality_update', 'Admin\master\masterController@updateStdNationalities')->name('nationality_update');

// std Mothetongue route....................
Route::get('master/mothetongue', 'Admin\master\masterController@stdMothetongue')->name('mothetongue');
Route::post('master/mothetongue/mothetongue_add', 'Admin\master\masterController@addStdMothetongue')->name('mothetongue_add');
Route::put('master/mothetongue/{id}/mothetongue_update', 'Admin\master\masterController@updateStdMothetongue')->name('mothetongue_update');

// ProfesstionType route....................
Route::get('master/professtiontype', 'Admin\master\masterController@professtionType')->name('professtiontype');
Route::post('master/professtiontype/professtiontype_add', 'Admin\master\masterController@addProfesstionType')->name('professtiontype_add');
Route::put('master/professtiontype/{id}/professtiontype_update', 'Admin\master\masterController@updateProfesstionType')->name('professtiontype_update');

// ProfesstionType route....................
Route::get('master/gaurdian_designation', 'Admin\master\masterController@gaurdianDesignation')->name('gaurdian_designation');
Route::post('master/professtiontype/gaurdian_designation_add', 'Admin\master\masterController@addGaurdianDesignation')->name('gaurdian_designation_add');
Route::put('master/professtiontype/{id}/gaurdian_designation_update', 'Admin\master\masterController@updateGaurdianDesignation')->name('gaurdian_designation_update');


// county route....................
Route::get('master/countries', 'Admin\master\masterController@county')->name('countries');
Route::post('master/countries/countries_add', 'Admin\master\masterController@addCounty')->name('countries_add');
Route::put('master/countries/{id}/countries_update', 'Admin\master\masterController@updateCounty')->name('countries_update');

// county route....................
Route::get('master/state', 'Admin\master\masterController@state')->name('state');
Route::post('master/state/state_add', 'Admin\master\masterController@addState')->name('state_add');
Route::put('master/state/{id}/state_update', 'Admin\master\masterController@updateState')->name('state_update');
// city route....................
Route::get('master/cities', 'Admin\master\masterController@city')->name('cities');
Route::post('master/cities/city_add', 'Admin\master\masterController@addCity')->name('city_add');
Route::put('master/cities/{id}/city_update', 'Admin\master\masterController@updateCity')->name('city_update');


// previous students details route.....................
Route::get('student_previous-detail', 'Admin\students\studentController@previousStudentRecord')->name('previous-record');
//student manage route.....................
Route::get('student_manage', 'Admin\students\studentController@studentsManage')->name('student_manage');

Route::post('student_manage_get_data', 'Admin\students\studentController@studentsManageGetData')->name('student_manage_get_data');

Route::get('student_uploads', 'Admin\students\studentController@studentUploads')->name('student_uploads');
// route for passoute student
Route::post('passout_student', 'Admin\students\studentManageController@passoutStudent')->name('passout_student');
Route::post('dropout_student', 'Admin\students\studentManageController@dropoutStudent')->name('dropout_student');
Route::post('forward_transfer_student', 'Admin\students\studentManageController@forwardTranferStudent')->name('forward_transfer_student');

// Route::group(['prefix' => 'attendance', 'namespace' => 'LawSchools'], function ()  {

        Route::get('attendance/dashboard', 'Admin\AttendanceController@index')->name('dashboard');
        Route::get('attendance/student', 'Admin\AttendanceController@studentAttendance')->name('attendance.student');
        Route::post('attendance/student_fetch', 'Admin\AttendanceController@studentFetch')->name('attendance.student_fetch');
        Route::post('attendance/attendance_submit', 'Admin\AttendanceController@attendanceSubmit')->name('attendance.submit');
        Route::get('attendance/staff', 'Admin\AttendanceController@staffAttendance')->name('attendance.staff');

        Route::get('attendance/manage/student', 'Admin\AttendanceController@manageStudentAttendance')->name('attendance.manage_student');
        Route::post('attendance/manage_student_filter', 'Admin\AttendanceController@manageStudentFilter')->name('attendance.manage_student_filter');


        Route::get('attendance/manage/staff', 'Admin\AttendanceController@manageStaffAttendance')->name('attendance.manage_staff');
        // Route::post('/staff_filter', 'AttendanceController@staff_filter')->name('attendance.staff_filter');
        // Route::post('/attendance_staff_update', 'AttendanceController@attendance_staff_update')->name('attendance.staff_update');

        // Route::get('/manage/show_attendance/{id}', 'AttendanceController@show_attendance')->name('attendance.show_attendance');
        // Route::post('/attendance_list', 'AttendanceController@attendance_list')->name('attendance.list');
        Route::post('attendance/attendance_update', 'Admin\AttendanceController@attendanceUpdate')->name('attendance.update');
        Route::get('attendance/upload','Admin\AttendanceController@attendanceUpload')->name('attendance.upload');
        
        Route::get('attendance/report/student','Admin\AttendanceController@attendanceStudentReport')->name('attendance.student_report');

        // Route::get('/report/staff','AttendanceController@attendance_staff_report')->name('attendance.staff_report');

        // Route::post('/report_generate','AttendanceController@report_generate')->name('attendance.report_generate');

        // Route::post('/staff_report_generate','AttendanceController@staff_report_generate')->name('attendance.staff_report_generate');

        // Route::post('/attendance-staff-submit','AttendanceController@attendanceStaffSubmit')->name('attendance-staff.submit');

        // Route::post('/import','AttendanceController@importAttendence')->name('attendance.import');
    // });