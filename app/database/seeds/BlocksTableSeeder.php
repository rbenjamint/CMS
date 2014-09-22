<?php

class BlocksTableSeeder extends Seeder {

    public function run()
    {
        DB::table('blocks')->delete();

        $blocks = array(
            array(
                'name'          => 'post',
                'template'      => 'blocks/templates/html',
                'settings'      => 1
            ),
            array(
                'name'          => 'page',
                'template'      => 'blocks/templates/page.html',
                'settings'      => 0
            )
        );

        DB::table('blocks')->insert( $blocks );
    }

}

?>
