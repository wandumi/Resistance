<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortifoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portifolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portifolio_lists_id');
            $table->integer('numberOfShared');
            $table->integer('perOfIssueShares');
            $table->string('cover_image');
            $table->timestamps();

            $table->foreign('portifolio_lists_id')->references('id')->on('portifolio_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portifolios');
    }
}
