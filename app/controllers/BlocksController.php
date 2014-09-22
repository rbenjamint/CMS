<?php

class BlocksController extends BaseController {

  public function rest() {
    $blocks = Block::all();
    return Response::json($blocks);
  }

  public function pbrest() {
    $pages  = Page::all();
    return View::make('hello')->with('pages', $pages);

    $page = Page::all();
    echo $page->user();
    return;
    $blocks = PageBlock::all();
    return Response::json($blocks);
  }

}
