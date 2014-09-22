<?php

class TemplateTableSeeder extends Seeder {

    public function run()
    {
        DB::table('template')->delete();

        $blocks = array(
            array(
                'id'        	  => 1,
                'name'          => 'main',
                'file'      => 'main',
                'settings'      => 1
            )
        );

        DB::table('template')->insert( $blocks );
    }

}

?>
