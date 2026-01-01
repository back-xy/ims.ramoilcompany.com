<?php

use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('place_name');
            $table->string('owner_name');
            $table->string('profession')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->json('social_apps')->nullable();
            $table->boolean('is_customer')->default(false);
            $table->unsignedTinyInteger('activity_percentage')->default(0);
            $table->foreignIdFor(City::class)->constrained()->restrictOnDelete();
            $table->text('address')->nullable();
            $table->string('gps')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE places AUTO_INCREMENT = 26000001');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
