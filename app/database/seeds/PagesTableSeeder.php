<?php

class PagesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('pages')->delete();

        $pages = array(
            array(
                'title'         => 'Home',
                'name'         => 'Home',
                'url'           => '/',
                'text'          => 'Homepagina!',
                'nav'           => 1,
                'active'        => 1,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
                'title'         => 'Informatie',
                'name'         => 'Informatie',
                'url'           => 'info',
                'text'          => 'Informatie!',
                'nav'           => 1,
                'active'        => 1,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
                'title'         => 'Contact',
                'name'         => 'Contact',
                'url'           => 'contact',
                'text'          => 'Contact!',
                'nav'           => 1,
                'active'        => 1,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
                'title'         => 'Hallo Wereld',
                'name'         => 'Hallo Wereld',
                'url'           => 'hallo',
                'text'          => 'Hallo wereld!',
                'nav'           => 0,
                'active'        => 1,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            )
        );

        DB::table('pages')->insert( $pages );
    }

}

?>
