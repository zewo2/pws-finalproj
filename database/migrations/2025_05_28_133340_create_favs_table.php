<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFavsTable extends Migration
{
    public function up()
    {
        Schema::create('favs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            // Ensure no duplicate user-movie favorites
            $table->unique(['user_id', 'movie_id']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('favs');
    }
}
