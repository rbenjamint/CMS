<?php

class PageBlocksTableSeeder extends Seeder {

    public function run()
    {
        DB::table('page_blocks')->delete();

        $blocks = array(
            array(
                'page_id'       => 1,
                'blocks_id'     => 1,
                'order'		     => 1,
                'settings'      => '{"text":"hallo"}'
            ),
            array(
                'page_id'       => 1,
                'blocks_id'     => 2,
                'order'			  => 2,
                'settings'      => '{"text":"hallo"}'
            ),
            array(
                'page_id'       => 1,
                'blocks_id'     => 3,
                'order'			  => 3,
                'settings'      => '{"text":"hallo"}'
            )
        );

        DB::table('page_blocks')->insert( $blocks );
    }

}

?>
