<?php

class Page extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'pages';
	
	protected $fillable = array('title', 'name', 'route', 'active', 'nav', 'text');

  public function blocks() {
      return $this->hasMany('PageBlock')->orderBy('order');
  }
  public function template() {
      return $this->belongsTo('TemplateConfig', 'template_config_id');
  }
}