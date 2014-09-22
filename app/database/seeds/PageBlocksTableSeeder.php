<?php

class PageBlocksTableSeeder extends Seeder {

    public function run()
    {
        DB::table('page_blocks')->delete();

        $blocks = array(
            array(
                'page_id'       => 1,
                'blocks_id'     => 1,
                'settings'      => "{'text':'hallo'}"
            ),
            array(
                'page_id'       => 1,
                'blocks_id'     => 2,
                'settings'      => "{'text':'hallo'}"
            )
        );

        DB::table('page_blocks')->insert( $blocks );
    }

}

?>
