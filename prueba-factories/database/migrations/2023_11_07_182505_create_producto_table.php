 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("codigo", 20)->unique();
            $table->string("nombre");
            $table->text("descripcion")->nullable();
            $table->decimal("precio", 10, 2)->default(0);
            $table->string("url_imagen")->nullable();
            $table->integer("like")->default(0);
            $table->integer("dislike")->default(0); 

            // Relaciones
            $table ->unsignedBigInteger("user_id");
            $table ->foreign("user_id")
                   ->references("id")
                   ->on("users")
                   ->onUpdate("cascade")
                   ->onDelete("cascade");
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
        Schema::dropIfExists('productos');
    }
}
