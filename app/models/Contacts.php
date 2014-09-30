<?php

class Contacts extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'contacts';
	
	
	public function group() {
		return $this->belongsTo('ContactsGroups', 'group_id');
	}

}