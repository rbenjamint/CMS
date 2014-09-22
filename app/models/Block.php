<?php

class Block extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'blocks';
	
	protected $fillable = array('name', 'template', 'settings');

}