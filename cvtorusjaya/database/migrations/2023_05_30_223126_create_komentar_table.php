<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->text('komentar');
            $table->unsignedBigInteger('komentarable_id');
            $table->string('komentarable_type');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('id');
        });
    }
    public function down()
    {
        Schema::dropIfExists('komentar');
    }
}
