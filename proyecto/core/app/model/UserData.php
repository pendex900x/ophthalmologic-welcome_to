<?php
class UserData {
	public static $tablename = "user";

	public function UserData(){
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->is_active = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (email,name,lastname,username,password,is_active,is_type,created_at) ";
		$sql .= "value (\"$this->email\",\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->password\",\"$this->is_active\",\"$this->is_type\",\"$this->created_at\")";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set email=\"$this->email\",name=\"$this->name\",lastname=\"$this->lastname\",username=\"$this->username\",is_active=\"$this->is_active\",is_type=\"$this->is_type\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>
