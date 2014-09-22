<?php

class PageBlocksTableSeeder extends Seeder {

    public function run()
    {
        DB::table('page_blocks')->delete();

        $blocks = array(
            array(
                'page_id'       => 1,
                'blocks_id'     => 1,
                'settings'      => 'hi'
            ),
            array(
                'page_id'       => 1,
                'blocks_id'     => 2,
                'settings'      => 'boe'
            )
        );

        DB::table('page_blocks')->insert( $blocks );
    }

}

?>
