<?php

class AuthController extends BaseController {

  public function status() {
    return Response::json(Auth::check());
  }

  public function rest() {
    if(Auth::check()) {
      return Response::json(array('user' => Auth::user()));
    } else {
      return Response::json(array('error' => 'Not signed in'));
    }
  }

  public function login()
  {
    //return Response::json(Input::all());
    //return Response::json(array('flash' => 'hooi', 'email' => Input::json('email'), 'password' => Input::json('password')));
    if(Auth::attempt(array('email' => Input::json('email'), 'password' => Input::json('password'))))
    {
      return Response::json(array('user' => Auth::user()));
    } else {
      return Response::json(array('error' => 'Invalid username or password', 'data' => Input::all()));
    }
  }

  public function logout()
  {
    Auth::logout();
    return Response::json(array('flash' => 'Logged Out!'));
  }

}
