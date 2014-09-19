<?php

class PageController extends BaseController {

  public function page($uri) {
    $page = Page::where('url', '=', $uri)->get();
    if($page->count() == 1){
      $page = Page::where('url', '=', $uri)->first();
      //return Response::json($page);
      return View::make('layout.html5')
                  ->with('page', $page);
    } else {
      return Redirect::to('/error404');
    }
  }

  public function error($id) {
    return View::make('layout.404')
                ->with('errorcode', $id);
  }

  public function rest() {
    $pages = Page::all();
    return Response::json($pages);
  }


}
