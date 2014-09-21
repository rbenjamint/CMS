<?php

class PagesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('pages')->delete();

        $pages = array(
            array(
                'title'         => 'Home',
                'name'         => 'Home',
                'route'	        => '/',
                'text'          => 'Homepagina!',
                'nav'           => true,
                'active'        => true,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
                'title'         => 'Informatie',
                'name'         => 'Informatie',
                'route'           => 'info',
                'text'          => 'Informatie!',
                'nav'           => true,
                'active'        => true,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
                'title'         => 'Contact',
                'name'         => 'Contact',
                'route'         => 'contact',
                'text'          => 'Contact!',
                'nav'           => true,
                'active'        => true,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
                'title'         => 'Hallo Wereld',
                'name'         => 'Hallo Wereld',
                'route'         => 'hallo',
                'text'          => 'Hallo wereld!',
                'nav'           => false,
                'active'        => true,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            )
        );

        DB::table('pages')->insert( $pages );
    }

}

?>
