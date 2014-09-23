<?php

class PageBlock extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'page_blocks';
	
	protected $fillable = array('page_id', 'blocks_id', 'order', 'settings');
  
  public function block() {
      return $this->belongsTo('Block', 'blocks_id');
  }
}