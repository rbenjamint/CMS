<?php

class BlocksTableSeeder extends Seeder {

    public function run()
    {
        DB::table('blocks')->delete();

        $blocks = array(
            array(
                'name'          => 'post',
                'template'      => 'post',
                'settings'      => 1
            ),
            array(
                'name'          => 'page',
                'template'      => 'page',
                'settings'      => 0
            )
        );

        DB::table('blocks')->insert( $blocks );
    }

}

?>
