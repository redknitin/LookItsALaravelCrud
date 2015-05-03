<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use App\Credential;
use Validator, Redirect, Eloquent;

class CredentialController extends Controller {
	public function index() {
		$users = Credential::all();
		return view('credential.index')->withUsers($users);
	}

	public function edit() {		
		return view('credential.edit')->withModel(isset($model)?$model:null);
	}

	public function edit_post() {
		$validation_rules = ['username'=>'required|unique:credentials', 'password'=>'required|confirmed', 'email'=>'email'];
		$validator = Validator::make(Input::all(), $validation_rules);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
			$failed = $validator->failed();
			return Redirect::back()->withErrors($failed)->withInput();
		}

		Eloquent::unguard();
		Credential::create(Input::except('password_confirmation', '_token', 'email'));

		return Redirect::to('credential');
	}
}