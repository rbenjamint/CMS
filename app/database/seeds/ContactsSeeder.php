<?php

class ContactsSeeder extends Seeder {

    public function run()
    {
        DB::table('contacts')->delete();
		
        $blocks = array(
            array(
                'id'            => 1,
                'firstname'     => 'Robin',
                'lastname'      => 'Timman',
                'mobile_number' => '0681032538',
                'home_number'	=> '+31758103253',
                'work_number'	=> '+31681032538',
                'avatar'		=> 'img/a3.jpg',
                'group_id'		=> 1
            ),
            array(
                'id'            => 2,
                'firstname'     => 'Robin',
                'lastname'      => 'Timman',
                'mobile_number' => '0681032538',
                'home_number'	=> '+31758103253',
                'work_number'	=> '+31681032538',
                'avatar'		=> 'img/a3.jpg',
                'group_id'		=> 1
            ),
            array(
                'id'            => 3,
                'firstname'     => 'Robin',
                'lastname'      => 'Timman',
                'mobile_number' => '0681032538',
                'home_number'	=> '+31758103253',
                'work_number'	=> '+31681032538',
                'avatar'		=> 'img/a3.jpg',
                'group_id'		=> 2
            ),
            array(
                'id'            => 4,
                'firstname'     => 'Robin',
                'lastname'      => 'Timman',
                'mobile_number' => '0681032538',
                'home_number'	=> '+31758103253',
                'work_number'	=> '+31681032538',
                'avatar'		=> 'img/a3.jpg',
                'group_id'		=> 3
           	)
        );

        DB::table('contacts')->insert( $blocks );
    }

}

?>
