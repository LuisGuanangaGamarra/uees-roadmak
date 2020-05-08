<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubConsultoriasTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        /* DB::unprepared('
        CREATE TRIGGER trigger_consultoria_comprada AFTER INSERT ON `consultorias_compradas` FOR EACH ROW
             BEGIN
                
                 INSERT INTO `consultorias_compradas` ( `name`, `grupo`, `req_indice`,`precio`,`estado`) 
                        select 
                                l.name, 
                                p.id_product, 
                                1,
                                p.price,
                                `I`
                        from ps_product p inner join ps_product_lang l on p.id_product = l.id_product inner join ps_category_product ct on ct.id_product = p.id_product 
                        where 
                                l.id_lang = 1 
                        and 
                                p.active = 1 
                        and 
                                ct.id_category = 3 
                        and 
                                l.id_product =NEW.id_product
                        order by 
                                l.id_product  asc;

            END
             '); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //  DB::unprepared('DROP TRIGGER `trigger_consultoria_subconsultoria`'); 
    
    }
}




