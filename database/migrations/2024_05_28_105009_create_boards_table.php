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
            $table->string('ns', 13);
            $table->string('nh', 13);
            $table->string('nd', 13);
            $table->string('nc', 13);
            $table->string('ss', 13);
            $table->string('sh', 13);
            $table->string('sd', 13);
            $table->string('sc', 13);
            $table->string('es', 13);
            $table->string('eh', 13);
            $table->string('ed', 13);
            $table->string('ec', 13);
            $table->string('ws', 13);
            $table->string('wh', 13);
            $table->string('wd', 13);
            $table->string('wc', 13);
            $table->string('ddn', 5);
            $table->string('dds', 5);
            $table->string('dde', 5);
            $table->string('ddw', 5);
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
