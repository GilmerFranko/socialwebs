<?php
include_once($_SERVER['DOCUMENT_ROOT']."/model/conexionbase.php");
		class getsetlikes extends Conexion{
			public $devuelvefila;
			public $devuelvenumfila;
			public function dateprofile(){
				parent::__construct();
			}
			public function getlikesof($userid,$postid){
					$sql = ("SELECT * FROM likespost  WHERE $userid=$userid AND userpostid=$postid");//si existe 
					$verifica=$this->conexionBase->query($sql);
					if ($verifica){
						if(mysqli_num_rows($verifica)>0){//si existe al menos una 
							while($fila=$verifica->fetch_row()){//mientras exista recorra la fila
								$this->devuelvefila =$fila;
							}
						}
				return $this->devuelvefila;
					}	
			}
			public function getnumlikesof($userid,$postid){
				$sql = ("SELECT * FROM likespost  WHERE $userid=$userid AND userpostid=$postid");//si existe 
				$verifica=$this->conexionBase->query($sql);
				if ($verifica){
					if (mysqli_num_rows($verifica)>0){//si existe al menos una 
						$this->devuelvenumfila=mysqli_num_rows($verifica);
					}else if (mysqli_num_rows($verifica)==0){
						$this->devuelvenumfila=0;
					}
				}
			}
		}
?>
<?php
	// connect to the database
	$con = mysqli_connect('localhost', 'root', '', 'bbdd_web');
	if (isset($_POST['liked'])) {
		$postid = $_POST['postid'];
		$userid = $_POST['userid'];
		$sql="SELECT * FROM likespost WHERE userid=$userid AND userpostid=$postid";
		$resultnum = mysqli_query($con, $sql);
		if(mysqli_num_rows($resultnum)>0){
			$row = mysqli_fetch_array($resultnum);
			$result= mysqli_query($con, "DELETE FROM likespost WHERE userid=$userid AND userpostid=$postid");
			if($result){
				$sql="SELECT * FROM likespost WHERE userid=$userid AND userpostid=$postid";
				$result = mysqli_query($con, $sql);
				echo mysqli_num_rows($resultnum)-1;
			}
		}else{
			$sql="INSERT INTO likespost (userid, userpostid, likes) VALUES ($userid, $postid, 1)";
			$result=mysqli_query($con, $sql);
			if($result){
				echo mysqli_num_rows($resultnum)+1;
			}else{
				echo "errorlikeadded";
			}

			exit();
		}
		
	}
	if (isset($_POST['unliked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($con, "SELECT * FROM posts WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($con, "DELETE FROM likes WHERE postid=$postid AND userid=1");
		mysqli_query($con, "UPDATE posts SET likes=$n-1 WHERE id=$postid");
		
		echo $n-1;
		exit();
	}

	// Retrieve posts from the database
	$posts = mysqli_query($con, "SELECT * FROM posts");
?>
