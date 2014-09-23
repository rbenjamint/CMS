<?php

class BlocksController extends BaseController {

  public function rest() {
    $blocks = Block::all();
    return Response::json($blocks);
  }

  public function pbrest() {

    $pages = Page::all();
    foreach ($pages as $page) {
      $page = $this->cleanBlock($page);
    }
    return Response::json($pages);
    $blocks = PageBlock::all();
    return Response::json($blocks);
  }

  public function pbrestId($id) {

    $page = Page::find($id);
    $page = $this->cleanPage($page);
    return Response::json($page);
  }
  public function test(){
    return 'hallo';
  }/*
  private function cleanBlock($page){
      
      $page->nav = (boolean)$page->nav;
      $page->active = (boolean)$page->active;

      $page->template = $page->template;
      $page->template->settings = json_decode($page->template->settings);
      $page->blocks = $page->blocks;

      unset($page->template_config_id);
      
      foreach ($page->blocks as $block) {
        $block->block;
        $block->settings = json_decode($block->settings);
        unset($block->blocks_id);
        unset($block->page_id);
      }
      return $page;
  }*/

}
