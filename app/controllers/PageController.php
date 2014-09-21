<?php

class PageController extends BaseController {

  public function page($route) {
  	//return Response::json($page = Page::where('route', '=', $route)->get());
	
    $page = Page::where('route', '=', $route)->get();
    if($page->count() != 0){
      $page = $page->first();
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
  
  public function restId($id) {
    $page = Page::find($id);
	 
	 $page = $this->resolvePage($page);
	 
    return Response::json($page);
  }
  public function restWhere($key, $value) {
    $pages = Page::where($key, '=', $value)->get();
    return Response::json($pages);
  }

  public function save() {
  	$id	= Input::json('id');
	$page = Page::find($id);
	$page->title	= Input::json('title');
	$page->name		= Input::json('name');
	$page->route	= Input::json('route');
	$page->nav		= Input::json('nav');
	$page->active	= Input::json('active');
	$page->text		= Input::json('text');
	$page->save();
				
	 return Response::json(array('done' => 'true', 'page' => $this->getPage($id)));
  }
  public function create() {
  	//return Response::json(Input::all());
  	$cred = array(
						'title'	=> Input::json('title'),
						'name'	=> Input::json('name'),
						'route'	=> Input::json('route'),
						'nav'		=> Input::json('nav'),
						'active'	=> Input::json('active'),
						'text'	=> Input::json('text')
					);

	$page = Page::create($cred);
				
	 return Response::json(array('done' => 'true'));
  }
  
	private function getPage($id) {
		$page = Page::find($id);
		$page = $this->resolvePage($page);
		return $page;
	}
	private function resolvePage($page){
		
		$page->nav = (boolean)$page->nav;
		$page->active = (boolean)$page->active;
		
		return $page;
	}
}
