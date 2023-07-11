<?php

namespace app\transfer;

class User{
	public $user_id;
	public $login;
	public $role;
	
	public function __construct($user_id, $login, $role){
		$this->user_id = $user_id;		
		$this->login = $login;		
		$this->role = $role;
	}	
}