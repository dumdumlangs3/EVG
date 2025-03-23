<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('service_animals', function (Blueprint $table) {
        $table->unique(['service_id', 'animal_type']); // Prevent duplicate service-animal combinations
    });
}

public function down()
{
    Schema::table('service_animals', function (Blueprint $table) {
        $table->dropUnique(['service_id', 'animal_type']); // Rollback the change
    });
}

};
