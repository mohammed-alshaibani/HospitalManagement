<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->boolean('gender')->default(0);
            $table->integer('age')->default(0);
            $table->string('address')->nullable();
            $table->char('phone', 20)->unique()->nullable();
            $table->foreignIdFor(User::class);
            $table->softDeletes();
            $table->string('file_number')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
