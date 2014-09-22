<?php

class TemplateConfig extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'template_config';
	
	public function template() {
		return $this->belongsTo('Template', 'template_id');
	}
}