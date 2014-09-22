<?php

class TemplateConfigTableSeeder extends Seeder {

    public function run()
    {
        DB::table('template_config')->delete();

        $blocks = array(
            array(
            	'id'				=> 1,
               'template_id'  => 1,
               'settings'     => '{"text":"hallo"}'
            )
        );

        DB::table('template_config')->insert( $blocks );
    }

}

?>
