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
                'locked'        => 0
            ),
            array(
                'id'        	  => 2,
                'name'          => 'jumbotron',
                'template'      => 'jumbotron',
                'settings'      => 1,
                'locked'        => 0
            ),
            array(
                'id'        	  => 3,
                'name'          => 'navigatie',
                'template'      => 'nav',
                'settings'      => 1,
                'locked'        => 0
            )
        );

        DB::table('blocks')->insert( $blocks );
    }

}

?>
