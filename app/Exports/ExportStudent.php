<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Auth;
use App\Models\student\studentsMast;
use Illuminate\Support\Facades\Hash;
use \Crypt;
use App\Models\master\castCategory;
use App\Models\master\stdNationality;

class ExportStudent implements FromCollection, WithHeadings, WithMapping 
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          $data1 = User::with('student_mast')->where('user_flag','S')->get();
          $data  = studentsMast::with('student_batch','student_section','student_class','p_country','p_state','p_city','studentsGuardiantMast')->get();

          return $data;
    }
    public function map($data) : array
    {
           // dd($data );
      
     if($data['reservation_class_id'] !=''){
           $cast_category = castCategory::where('id',$data['reservation_class_id'])->first();
           $data['reservation_class_id'] = $cast_category->caste_category_name;
      }
      if($data['nationality_id'] !=''){
           $cast_category = stdNationality::where('id',$data['nationality_id'])->first();
           $data['nationality_id'] = $cast_category->nationality_name;
      }
    	return [
    		$data->student_class->class_name,
    		$data->student_batch->batch_name,
        $data->student_section->section_name,
    		$data->admision_no,
    		$data->roll_no,
        $data->status == 'R' ? 'Running' : ($data->status == 'P' ? 'Pass' : $data->status == 'F' ? 'Fail':''),
    		$data->addm_date,
    		$data->email,
    		$data->f_name,
    		$data->m_name,
    		$data->l_name,
        $data->spec_ailment,
    		$data->dob,
    		$data->gender == 1 ? 'Male' : ($data->gender == 2 ? 'Female' : $data->gender == 3 ? 'Other':''),
        $data->reservation_class_id,
        $data->age,
    		$data->blood_group_id,
    		$data->nationality_id,
    		$data->p_address,
    		$data->p_city ? $data->p_city->city_name :'',
    		$data->p_state ? $data->p_state->state_name : '',
    		$data->p_zip_code,
    		$data->p_country ? $data->p_country->country_name : '',
    		$data->s_mobile,
    		$data->s_ssmid,
        $data->f_ssmid,
        $data->aadhar_card,
    		$data->bank_name,
        $data->bank_branch,
        $data->account_name,
        $data->account_no,
    		$data->ifsc_code

    	];
    }
    public function headings(): array
    {

        return [

            'Class Name',
            'Batch Name',
           	'Section Name',
            'School Admission No',
           	'Class roll no',
            'Status',
           	'Admission date',
           	'Email',
           	'First Name',
           	'Middle Name',
           	'Last Name',
           	'Specific Ailment',
           	'DOB',
           	'Gender',
            'Cast',
            'age',
           	'Blood Grp',
           	'Nationality',
           	'Address',
           	'City',
           	'State',
           	'PIN',
           	'Country',
           	'Mobile',
           	'Student SSMID',
            'Family SSMID',
           	'Aadhar Card Number',
           	'Bank Name',
            'Bank Branch',
            'Account Name',
            'Account No',
           	'IFSC code'


        ];

    }
}
