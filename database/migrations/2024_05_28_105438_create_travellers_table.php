<?php

use App\Models\Board;
use App\Models\Unit;
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
        Schema::create('travellers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Board::class);
            $table->foreignIdFor(Unit::class, 'pairNS');
            $table->foreignIdFor(Unit::class, 'pairEW');
            $table->integer('round')->unsigned();
            $table->string('contract', 7)->nullable();
            $table->enum('declarer', [
                'N',
                'S',
                'E',
                'W',
            ])->nullable();
            $table->string('lead', 2)->nullable();
            $table->string('tricks', 3)->nullable();
            $table->integer('score');
            $table->boolean('ruling')->default(false);
            $table->integer('pointsNS');
            $table->integer('pointsEW');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travellers');
    }
};
