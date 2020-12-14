<?php
include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
		class dateprofile extends Conexion{
			public $id;
			public $name;
			public $email;
			public $nickname;
			public $pass;
			public $pictureprofile;
			public function dateprofile(){
				parent::__construct();
			}
			public function getdateprofile($id){
					$sql = ("SELECT * FROM users  WHERE id='$id'");//si existe 
					$verifica=$this->conexionBase->query($sql);
					if(mysqli_num_rows($verifica)>0){//si existe al menos una fila
						while($arrow=$verifica->fetch_assoc()){//mientras exista recorra la fila
							$this->name=$arrow['name'];
							$this->email=$arrow['email'];
							$this->nickname=$arrow['nickname'];
							$this->pass=$arrow['password'];
							$this->pictureprofile=$arrow['pictureprofile'];
							$this->id=$arrow['id'];
					}
				}
			}
		}