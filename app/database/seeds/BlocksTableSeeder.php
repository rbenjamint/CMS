<?php

class BlocksTableSeeder extends Seeder {

    public function run()
    {
        DB::table('blocks')->delete();

        $blocks = array(
            array(
                'id'        	  => 1,
                'name'          => 'header',
                'template'      => 'header',
                'settings'      => 1,
                'locked'        => 0,
                'settings_template' => '{"text": {"name": "text","type": "value","min": "2"}}'
            ),
            array(
                'id'        	  => 2,
                'name'          => 'jumbotron',
                'template'      => 'jumbotron',
                'settings'      => 1,
                'locked'        => 0,
                'settings_template' => '{"text": {"name": "text","type": "value","min": "2"}}'
            ),
            array(
                'id'        	  => 3,
                'name'          => 'navigatie',
                'template'      => 'nav',
                'settings'      => 1,
                'locked'        => 0,
                'settings_template' => '{"text": {"name": "Tekst","type": "value","min": "2"},"title": {"name": "Titel","type": "value","min": "2"}}'
            )
        );

        DB::table('blocks')->insert( $blocks );
    }

}

?>
