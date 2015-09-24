<?php
class user{
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;

	public function __construct($user = null){
		$this->_db=DB::getInstance();

		$this->_sessionName= config::get('session/session_name');
		$this->_cookieName= config::get('remember/cookie_name');

		if(!$user){
			if(session::exists($this->_sessionName)){
				$user= session::get($this->_sessionName);
				
				if($this->find($user)){
					$this->_isLoggedIn=true;
				} else{

				}
			}

		} else {
			$this->find($user);
		}
	}

	public function update($fields = array(), $id= null){
			
		if(!$id && $this->isLoggedIn()){
			$id=$this->data()->id;
		}

		if(!$this->_db->update('users', $id, $fields)){
			throw new Exception("Error Processing Request");
			

		}
	}

	public function create($fields= array()){
		if(!$this->_db->insert('users', $fields)){
			throw new Exception('There was a problem creating an account');
		}
	}
	public function create_emp($fields= array()){
		if(!$this->_db->insert('employee', $fields)){
			throw new Exception('There was a problem creating an account');
		}
	}

	public function find($user= null){
		if($user){
			$field=(is_numeric($user)) ? 'id' : 'username';
			$data=$this->_db->get('users', array($field, '=', $user));

			if($data->count()){
				$this->_data= $data->first();
				
				return $data->first();
			}
		}
		return false;
	}


	public function login($username= null, $password = null, $remember = false){
	

		if(!$username && !$password && $this->exists()){
			session::put($this->_sessionName, $this->data()->id);
		} else {
				$user=$this->find($username);
		if($user){
			if($this->data()->password=== Hash::make($password, $this->data()->salt)){
				session::put($this->_sessionName, $this->data()->id);


				if($remember){
					$hash=Hash::unique();
					$hashCheck= $this->_db->get('user_session', array('user_id', '=', $this->data()->id));

					if(!$hashCheck->count()){
						$this->_db->insert('user_session',array(
							'user_id' => $this->data()->id,
							'hash' => $hash
						));
					} else {
						$hash= $hashCheck->first()->hash;
					}

					cookie::put($this->_cookieName, $hash, config::get('remember/cookie_expiry'));

				}
				return true;
			}
		}
	}
			return false;
	}

	public function hasPermission($key){
		$group= $this->_db->get('user_type', array('id', '=', $this->data()->user_type_id));
		if($group->count()){
			foreach ($group->results() as $g ) {
			if($key==$g->name){
				return true ;
			}
		}
	}
		return false;
	}

	public function exists(){
		return (!empty($this->_data)) ? true : false ;
	}

	public function logout(){

		$this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

		session::delete($this->_sessionName);
		cookie::delete($this->_cookieName);
	}

	public function data(){
		return $this->_data;
	}

	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}

}