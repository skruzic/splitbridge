<?php

use App\Models\Session;
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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Session::class);
            $table->integer('number')->unsigned();
            $table->enum('dealer', [
                'N',
                'S',
                'E',
                'W',
            ]);
            $table->enum('vul', [
                'None',
                'NS',
                'EW',
                'All',
            ]);
            $table->string('ns', 13)->nullable();
            $table->string('nh', 13)->nullable();
            $table->string('nd', 13)->nullable();
            $table->string('nc', 13)->nullable();
            $table->string('ss', 13)->nullable();
            $table->string('sh', 13)->nullable();
            $table->string('sd', 13)->nullable();
            $table->string('sc', 13)->nullable();
            $table->string('es', 13)->nullable();
            $table->string('eh', 13)->nullable();
            $table->string('ed', 13)->nullable();
            $table->string('ec', 13)->nullable();
            $table->string('ws', 13)->nullable();
            $table->string('wh', 13)->nullable();
            $table->string('wd', 13)->nullable();
            $table->string('wc', 13)->nullable();
            $table->string('ddn', 5)->nullable();
            $table->string('dds', 5)->nullable();
            $table->string('dde', 5)->nullable();
            $table->string('ddw', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
