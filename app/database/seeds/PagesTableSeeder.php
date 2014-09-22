<?php

class PagesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('pages')->delete();

        $pages = array(
            array(
            	'id'				=> 1,
                'title'         => 'Home',
                'name'         => 'Home',
                'route'	        => '/',
                'text'          => 'Homepagina!',
                'nav'           => true,
                'active'        => true,
                'template_config_id' => 1,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
            	'id'				=> 2,
                'title'         => 'Informatie',
                'name'         => 'Informatie',
                'route'           => 'info',
                'text'          => 'Informatie!',
                'nav'           => true,
                'active'        => true,
                'template_config_id' => 1,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
            	'id'				=> 3,
                'title'         => 'Contact',
                'name'         => 'Contact',
                'route'         => 'contact',
                'text'          => 'Contact!',
                'nav'           => true,
                'active'        => true,
                'template_config_id' => 1,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            ),
            array(
            	'id'				=> 4,
                'title'         => 'Hallo Wereld',
                'name'         => 'Hallo Wereld',
                'route'         => 'hallo',
                'text'          => 'Hallo wereld!',
                'nav'           => false,
                'active'        => true,
                'template_config_id' => 1,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime
            )
        );

        DB::table('pages')->insert( $pages );
    }

}

?>
