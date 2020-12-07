<?php
include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
		class dataposts extends Conexion{
			public $id;
			public $title;
			public $userid;
			public $likes;
			public $dislikes;
			public $views;
			public $img;
			public $date;
			public $content;
			public $comments;
			public function dateprofile(){
				parent::__construct();
			}
			public function getdataposts($id){
					$sql = ("SELECT * FROM usersposts WHERE id=$id");//si existe 
					$verifica=$this->conexionBase->query($sql);
					if(mysqli_num_rows($verifica)>0){//si existe al menos una fila
						while($arrow=$verifica->fetch_assoc()){//mientras exista recorra la fila
							$this->id=$arrow['id'];
							$this->title=$arrow['title'];
							$this->userid=$arrow['userid'];
							$this->likes=$arrow['likes'];
							$this->dislikes=$arrow['dislikes'];
							$this->views=$arrow['views'];
							$this->img=$arrow['img'];
							$this->date=$arrow['datetime'];
							$this->content=$arrow['content'];
							$this->comments=$arrow['comments'];
					}
				}
			}
		}