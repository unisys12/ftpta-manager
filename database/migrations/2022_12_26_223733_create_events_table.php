<?php

use App\Models\User;
use App\Models\Canine;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->boolean('allDay')->default(false);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('title');
            $table->string('url')->nullable();
            $table->boolean('editable')->default(true);
            $table->boolean('overlap')->default(true);
            $table->foreignIdFor(Service::class);
            $table->foreignIdFor(Canine::class)->nullable();
            $table->foreignIdFor(User::class)->nullable();
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
        Schema::dropIfExists('events');
    }
};
