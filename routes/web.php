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

Route::post('/save-contact-us','Frontend\ContactUsController@sendContactUsData')->name('save-contact-us');

//Student routes start

// Route::get('/student', function () {

//     return view('admin/students');
// });

Auth::routes();
// Route::group(['middleware' => 'auth'], function (){
Route::group(['middleware' => ['auth','role:superadmin']], function () {
    // This Route start For RolesController

    Route::resource('/admin', 'ACL\RolesController');
    Route::get('/delete/{id}','ACL\RolesController@destroy')->name('delete');
    Route::post('/save_changes','ACL\RolesController@saveChanges')->name('save_changes');

    // End RolesController

    // Start Permission Conroller 

    Route::resource('permissions', 'ACL\PermissionController');
    Route::get('/delete_permissions/{id}', 'ACL\PermissionController@destroy')->name('delete_permissions');
    // End Permission Conroller 

    // Start Users Conroller 

    Route::resource('/users', 'ACL\UserController');
    Route::get('/destroy/{id}', 'ACL\UserController@destroy')->name('destroy');
    Route::post('/changes_role','ACL\UserController@changesRole')->name('changesRole');
    Route::post('/changePermission','ACL\UserController@changePermission')->name('changePermission');   

    //Start AccountController

    Route::resource('/account', 'AccountController');
    Route::get('account_delete/{id}', 'AccountController@destroy')->name('account.destroy');

    //End AccountController
});


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

Route::Resource('subject','Admin\classes\SubjectController');
Route::get('subject_assign','Admin\classes\SubjectController@assignSubject')->name('subject_assign');


Route::post('subject_assign_add','Admin\classes\SubjectController@assignSubjectAdd')->name('subject_assign_add');

Route::get('subject_assign_to_student','Admin\classes\SubjectController@subjectAssignToStudent')->name('subject_assign_to_student');


Route::post('student_get_for_assign_subject','Admin\classes\SubjectController@studentGetForAssignSubject')->name('student_get_for_assign_subject');

Route::post('assign_student_to_section','Admin\classes\ClassesController@assignSubjectToSection')->name('assign_student_to_section');

Route::post('student_add_to_assign_subject','Admin\classes\SubjectController@studentAddForAssignSubject')->name('student_add_to_assign_subject');


// Student classes route....................
Route::get('classes', 'Admin\classes\ClassesController@studentClasses')->name('classes');
Route::post('master/classes/add', 'Admin\classes\ClassesController@addClasses')->name('classes-add');
Route::put('classes/{id}/update', 'Admin\classes\ClassesController@updateClasses')->name('classes-update');

// Student batches route....................
Route::get('class/batches', 'Admin\master\masterController@studentBatches')->name('batch');
Route::post('class/batches/batches_add', 'Admin\master\masterController@addBatch')->name('batches_add');
Route::put('class/batches/{id}/batches_update', 'Admin\master\masterController@updateBatch')->name('batches_update');

// Student section route....................
Route::get('class/section', 'Admin\master\masterController@studentSection')->name('section');
Route::post('class/section/section_add', 'Admin\master\masterController@addSection')->name('section_add');
Route::put('class/section/{id}/section_update', 'Admin\master\masterController@updateSection')->name('section_update');

Route::get('class/section/assign', 'Admin\classes\ClassesController@assignSectionList')->name('section_assign');

Route::delete('class/section/delete/{id}', 'Admin\classes\ClassesController@assignSectionListDelete')->name('delete_section_list');
// Route::post('class/section/assign/dd', 'Admin\master\masterController@assignSectionAdd')->name('student_add_for_assign_subject');

Route::post('add_section_list','Admin\classes\ClassesController@addSectionList')->name('add_section_list');

Route::get('class/section/assign_student','Admin\classes\ClassesController@studentAssignsection')->name('assign_section_student');

Route::post('class/section/assign_get_students_list','Admin\classes\ClassesController@getStudentList')->name('get_students_list');

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

//Teachers route .......................
Route::Resource('teachers', 'Admin\teachers\TeacherController');
Route::Resource('teams', 'Admin\teachers\TeamsController');

Route::get('teachers/assign/subject','Admin\teachers\TeacherController@subjectAndTeacher')->name('assign_subject');
Route::post('teachers/assign/create','Admin\teachers\TeacherController@subjectAssignToTeacher')->name('assign_subject_to_teacher');

Route::post('get_subject_assign_to_teacher','Admin\teachers\TeacherController@getSubAssToTeacher')->name('get_subject_assign_to_teacher');

// Route::group(['prefix' => 'attendance', 'namespace' => 'LawSchools'], function ()  {

        Route::get('attendance/dashboard', 'Admin\AttendanceController@index')->name('dashboard');
        Route::get('attendance/student', 'Admin\AttendanceController@studentAttendance')->name('attendance.student');
        Route::post('attendance/student_fetch', 'Admin\AttendanceController@studentFetch')->name('attendance.student_fetch');
        

        // Route::get('/manage/show_attendance/{id}', 'AttendanceController@show_attendance')->name('attendance.show_attendance');
        // Route::post('/attendance_list', 'AttendanceController@attendance_list')->name('attendance.list');
        Route::post('attendance/attendance_update', 'Admin\AttendanceController@attendanceUpdate')->name('attendance.update');
        
        Route::get('attendance/upload','Admin\AttendanceController@attendanceUpload')->name('attendance.upload');
        
        Route::get('attendance/student_report','Admin\AttendanceController@attendanceStudentReport')->name('attendance.student_report');
        Route::get('attendance/manage/student', 'Admin\AttendanceController@manageStudentAttendance')->name('attendance.manage_student');
        Route::post('attendance/manage_student_filter', 'Admin\AttendanceController@manageStudentFilter')->name('attendance.manage_student_filter');

Route::group(['middleware' => ['auth','role:superadmin']], function () {

        Route::post('attendance/attendance_submit', 'Admin\AttendanceController@attendanceSubmit')->name('attendance.submit');

        Route::get('attendance/staff', 'Admin\AttendanceController@staffAttendance')->name('attendance.staff');
        Route::get('attendance/manage/staff', 'Admin\AttendanceController@manageStaffAttendance')->name('attendance.manage_staff');

        Route::post('/staff_filter', 'Admin\AttendanceController@staff_filter')->name('attendance.staff_filter');
        Route::post('/attendance_staff_update', 'Admin\AttendanceController@attendance_staff_update')->name('attendance.staff_update');


        Route::get('attendance/staff_report','Admin\AttendanceController@attendance_staff_report')->name('attendance.staff_report');

        Route::post('attendance/student_report_generate','Admin\AttendanceController@report_generate')->name('attendance.report_generate');

        Route::post('attendance/staff_report_generate','Admin\AttendanceController@staff_report_generate')->name('attendance.staff_report_generate');

        Route::post('attendance/staff_submit','Admin\AttendanceController@attendanceStaffSubmit')->name('attendance-staff_submit');

        // Route::post('/import','AttendanceController@importAttendence')->name('attendance.import');
     });


Route::Resource('profile','Admin\profile\ProfileController');

Route::Resource('notice-circular','Admin\noticeCircular\NoticeCircularController');
Route::get('course_batches_chosen','Admin\noticeCircular\NoticeCircularController@getBtachSectionClass')->name('course_batches_chosen');
Route::post('get_s_data','Admin\noticeCircular\NoticeCircularController@getSdata')->name('get_s_data');
Route::post('get_faculty_data','Admin\noticeCircular\NoticeCircularController@getFacultydata')->name('get_faculty_data');

Route::post('get_send_to_all_data','Admin\noticeCircular\NoticeCircularController@getSendAllData')->name('get_send_to_all_data');
Route::get('sent-to-all-show/{id}','Admin\noticeCircular\NoticeCircularController@sentToAllShow')->name('sent-to-all-show');
Route::get('sent-to-all-edit/{id}','Admin\noticeCircular\NoticeCircularController@sentToAllEdit')->name('sent-to-all-edit');
Route::put('sent-to-all-update/{id}','Admin\noticeCircular\NoticeCircularController@sentToAllupdate')->name('sent-to-all-update');

Route::post('get_send_to_student_data','Admin\noticeCircular\NoticeCircularController@getSendStudentData')->name('get_send_to_student_data');
Route::get('sent-to-student-show/{id}','Admin\noticeCircular\NoticeCircularController@sentToStudentShow')->name('sent-to-student-show');
Route::get('sent-to-student-edit/{id}','Admin\noticeCircular\NoticeCircularController@sentToStudentEdit')->name('sent-to-student-edit');
Route::put('sent-to-student-update/{id}','Admin\noticeCircular\NoticeCircularController@sentToStudentupdate')->name('sent-to-student-update');

Route::post('get_send_to_faculty_data','Admin\noticeCircular\NoticeCircularController@getSendFacultyData')->name('get_send_to_faculty_data');
Route::get('sent-to-faculty-show/{id}','Admin\noticeCircular\NoticeCircularController@sentToFacultyShow')->name('sent-to-faculty-show');
Route::get('sent-to-faculty-edit/{id}','Admin\noticeCircular\NoticeCircularController@sentToFacultyEdit')->name('sent-to-faculty-edit');
Route::put('sent-to-faculty-update/{id}','Admin\noticeCircular\NoticeCircularController@sentToFacultyupdate')->name('sent-to-faculty-update');

//compose email and message...........................

Route::get('email-compose','Admin\composeSmsAndEmail\EmailAndSMSController@emailCompose')->name('email_compose');
Route::post('get_students_for_email_compose','Admin\composeSmsAndEmail\EmailAndSMSController@getStudentsForEmailCompose')->name('get_students_for_email_compose');
Route::post('send_email','Admin\composeSmsAndEmail\EmailAndSMSController@sendEmail')->name('send_email');

Route::get('sms-compoe','Admin\composeSmsAndEmail\EmailAndSMSController@smsCompose')->name('sms_compoe');
Route::post('get_students_for_sms_compose','Admin\composeSmsAndEmail\EmailAndSMSController@getStudentsForSmsCompose')->name('get_students_for_sms_compose');
Route::post('send_sms','Admin\composeSmsAndEmail\EmailAndSMSController@sendSms')->name('send_sms');
Route::get('sms-compoe-report','Admin\composeSmsAndEmail\EmailAndSMSController@smsDeliveryReport')->name('send_sms_delivery_report');
