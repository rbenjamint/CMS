<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function cleanPage($page){

      $page->nav = (boolean)$page->nav;
      $page->active = (boolean)$page->active;

     	$page->template = $page->template;
     	$page->template->template = $page->template->template;
      $page->template->settings = json_decode($page->template->settings);
      $page->blocks = $page->blocks;

      unset($page->template_config_id);
      
      foreach ($page->blocks as $block) {
        $block->block;
        
        $block->block->settings = (boolean)$block->block->settings;
        $block->block->locked = (boolean)$block->block->locked;
        $block->settings = json_decode($block->settings);

        unset($block->blocks_id);
        unset($block->page_id);
      }
      return $page;

	}

}
