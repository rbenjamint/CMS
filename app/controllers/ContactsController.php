<?php

class ContactsController extends BaseController {

  public function rest() {
  	$contacts = Contacts::all();
	foreach ($contacts as $contact){
		$contacts[] = $contact->group;
  	}
	return Response::json($contacts);
    $contacts = Contacts::all();
    return Response::json($contacts);
  }
  
  public function groups() {
    $contacts = ContactsGroups::all();
    return Response::json($contacts);
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
  }

	public function save() {
		
		//return Response::json(array('done' => 'true', 'input' => Input::all()));
		$id	= Input::json('id');
		$contact = Contacts::find($id);
		$contact->firstname		= Input::json('firstname');
		$contact->lastname		= Input::json('lastname');
		$contact->mobile_number	= Input::json('mobile_number');
		$contact->work_number	= Input::json('work_number');
		$contact->home_number	= Input::json('home_number');
		$contact->address		= Input::json('address');
		$contact->zipcode		= Input::json('zipcode');
		$contact->city			= Input::json('city');
		//$page->extra_information = json_encode(Input::json('extra'));
		$contact->timestamps = false;
		$contact->save();

		return Response::json(array('done' => 'true', 'contact' => $contact));
	}
	
	public function newContact() {
		
		/*$cred = array(
							'firstname'		=> Input::json('firstname'),
							'lastname'		=> Input::json('lastname'),
							'mobile_number'	=> Input::json('mobile_number'),
							'work_number'	=> Input::json('work_number'),
							'home_number'	=> Input::json('home_number'),
							'address'		=> Input::json('address'),
							'zipcode'		=> Input::json('zipcode'),
							'city'			=> Input::json('city')
						);*/
		$cred = array(
							'firstname'		=> '',
							'lastname'		=> '',
							'mobile_number'	=> '',
							'work_number'	=> '',
							'home_number'	=> '',
							'address'		=> '',
							'zipcode'		=> '',
							'city'			=> ''
						);
		
		$page = Page::create($cred);			
		return Response::json(array('done' => 'true'));
	}

	public function saveGroup() {
		//return Response::json(array('done' => 'true', 'input' => Input::all()));
		$id	= Input::json('id');
		$group = ContactsGroups::find($id);
		$group->name = Input::json('name');
		$group->timestamps = false;
		$group->save();
		return Response::json(array('done' => 'true', 'group' => $group));
	}
	public function newGroup() {
		//return Response::json(array('done' => 'true', 'input' => Input::all()));
		$id	= Input::json('id');
		$group = ContactsGroups::find($id);
		$group->name = Input::json('name');
		$group->timestamps = false;
		$group->save();
		return Response::json(array('done' => 'true', 'group' => $group));
	}

}
