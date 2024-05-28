<?php

use App\Models\Board;
use App\Models\Unit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->string('contract', 5);
            $table->enum('declarer', [
                'N',
                'S',
                'E',
                'W',
            ]);
            $table->string('lead',2);
            $table->integer('score');
            $table->boolean('ruling');
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
