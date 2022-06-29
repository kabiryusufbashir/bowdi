<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rank_id');
            $table->unsignedBigInteger('department_id');
            $table->string('title')->nullable;
            $table->string('e_code')->nullable;
            $table->string('first_name')->nullable;
            $table->string('last_name')->nullable;
            $table->string('other_name')->nullable;
            $table->string('dob')->nullable;
            $table->string('place_of_birth')->nullable;
            $table->string('photo')->nullable;
            $table->string('lga')->nullable;
            $table->string('state')->nullable;
            $table->string('nationality')->nullable;
            $table->string('marital_status')->nullable;
            $table->string('blood_group')->nullable;
            $table->string('next_of_kin')->nullable;
            $table->string('tax_id_no')->nullable;
            $table->string('vaccinated_yes')->nullable;
            $table->string('vaccinated_no')->nullable;
            $table->string('vaccination_type')->nullable;
            $table->string('date_of_vaccination')->nullable;
            $table->string('residential_address')->nullable;
            $table->string('permanent_address')->nullable;
            $table->string('permanent_address_city')->nullable;
            $table->string('permanent_address_state')->nullable;
            $table->string('permanent_address_country')->nullable;
            $table->string('personal_email')->nullable;
            $table->string('mobile_no')->nullable;
            $table->string('emergency_contact_name_1')->nullable;
            $table->string('emergency_contact_relationship_1')->nullable;
            $table->string('emergency_contact_contact_no_1')->nullable;
            $table->string('emergency_contact_address_1')->nullable;
            $table->string('emergency_contact_name_2')->nullable;
            $table->string('emergency_contact_relationship_2')->nullable;
            $table->string('emergency_contact_contact_no_2')->nullable;
            $table->string('emergency_contact_address_2')->nullable;
            $table->string('emergency_contact_name_3')->nullable;
            $table->string('emergency_contact_relationship_3')->nullable;
            $table->string('emergency_contact_contact_no_3')->nullable;
            $table->string('emergency_contact_address_3')->nullable;
            $table->string('account_name')->nullable;
            $table->string('account_no')->nullable;
            $table->string('bank_name')->nullable;
            $table->string('bank_branch')->nullable;
            $table->timestamps();

            $table->index('user_id');
            $table->index('rank_id');
            $table->index('department_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
