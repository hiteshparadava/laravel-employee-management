<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });

        DB::table('departments')->insert([
            ['name' => 'Laravel', 'status' => 1],
            ['name' => 'Node JS', 'status' => 1],
            ['name' => 'React JS', 'status' => 1],
            ['name' => 'PHP', 'status' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
