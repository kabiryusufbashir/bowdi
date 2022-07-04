<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Department;
use App\Models\Rank;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rank_id',
        'department_id',
        'supervisor_id',
        'title',
        'e_code',
        'first_name',
        'last_name',
        'other_name',
        'dob',
        'place_of_birth',
        'photo',
        'lga',
        'state',
        'nationality',
        'marital_status',
        'blood_group',
        'next_of_kin',
        'tax_id_no',
        'vaccinated_yes',
        'vaccinated_no',
        'vaccination_type',
        'date_of_vaccination',
        'residential_address',
        'city',
        'state',
        'country',
        'personal_email',
        'mobile_no',
        'emergency_contact_name_1',
        'emergency_contact_relationship_1',
        'emergency_contact_contact_no_1',
        'emergency_contact_address_1',
        'emergency_contact_name_2',
        'emergency_contact_relationship_2',
        'emergency_contact_contact_no_2',
        'emergency_contact_address_2',
        'emergency_contact_name_3',
        'emergency_contact_relationship_3',
        'emergency_contact_contact_no_3',
        'emergency_contact_address_3',
        'account_name',
        'account_no',
        'bank_name',
        'bank_branch',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function rank(){
        return $this->belongsTo(Rank::class);
    }

}
