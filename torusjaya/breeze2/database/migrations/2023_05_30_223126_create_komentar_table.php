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
            $table->index('komentarable_id');
            $table->index('komentarable_type');
            $table->index('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentar');
    }
}
