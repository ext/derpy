<?php

class MainController extends Controller {
	public function index(){
		throw new HTTPRedirect('/main/sample/Hello/World');
	}

	public function sample(){
		return template("foo.php", array("value" => implode(' ', func_get_args())));
	}

	public function description(){
		return template("description.php", array());
	}
}
