<?php

class ContactsGroupsSeeder extends Seeder {

    public function run()
    {
        DB::table('contact_groups')->delete();
		
        $blocks = array(
            array(
                'id'            => 1,
                'name'     => 'Familie'
            ),
            array(
                'id'            => 2,
                'name'     => 'Stage'
            ),
            array(
                'id'            => 3,
                'name'     => 'School'
            )
        );

        DB::table('contact_groups')->insert( $blocks );
    }

}

?>