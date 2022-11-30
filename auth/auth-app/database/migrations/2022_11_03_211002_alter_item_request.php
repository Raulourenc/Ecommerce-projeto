<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterItemRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_requests', function (Blueprint $table) {
         
            $table->foreign('product_id')->references('id')->on('products');
             $table->foreign('request_id')->references('id')->on('requests');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_requests', function (Blueprint $table) {
            
            $table->dropForeign('item_requests_product_id_foreign');
            $table->dropForeign('item_requests_request_id_foreign');
            
        });
    }
}
