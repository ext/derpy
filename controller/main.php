<?php

class MainController extends Controller {
	public $foo = "test";

	public function index(){
		throw new HTTPRedirect('/main/sample/Hello/World');
	}

	public function sample(){
		return $this->template("foo.php", array("value" => implode(' ', func_get_args())));
	}

	public function description(){
		return $this->template("description.php", array());
	}
}
