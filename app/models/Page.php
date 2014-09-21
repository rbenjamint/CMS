<?php

class Page extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'pages';
	
	protected $fillable = array('title', 'name', 'route', 'active', 'nav', 'text');

}