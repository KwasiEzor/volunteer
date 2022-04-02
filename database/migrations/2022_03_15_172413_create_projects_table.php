<?php

use App\Models\ProjectType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('title');
            $table->unsignedBigInteger('project_type_id')->onDelete('cascade');
            $table->string('location');
            $table->string('estimated_duration');
            $table->integer('max_size');
            $table->text('description');
            $table->integer('estimated_budget');
            $table->integer('price');
            $table->dateTime('start_at')->default(now());
            $table->dateTime('end_at')->default(now());
            $table->boolean('is_highlighted')->default(false);
            $table->string('apply_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
