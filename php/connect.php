<?php
//header("content-type:text/html;charset=utf8");
header("content-type:application/json;charset=utf8");
$con = mysql_connect("127.0.0.1","root","root");
if($con){
	$db = mysql_select_db("data",$con);
	if($db){
		mysql_query("SET NAMES UTF8");
		$action = (isset($_GET['action']))?$_GET['action']:'list';
		$id = (isset($_GET['id']))?$_GET['id']:null;


		function list1(){
		$data = mysql_query("SELECT * FROM word");
		$returndata = "";
		while($result = mysql_fetch_assoc($data)){
			$returndata[] = $result;
			//return $returndata;
			//echo json_encode($returndata);
			}	

			echo json_encode($returndata);
			//return $returndata;
		}

		// function del($id){
		// 	$deldata = mysql_query("DELETE FROM word WHERE id=$id");
		// 	if($deldata){
		// 		echo "删除成功";
		// 	else
		// 		echo "删除失败";
		// 	}
		// }


			 function del1(){
				$deldata = mysql_query("DELETE FROM 'word' WHERE id=$id");
			}

		
		function plus(){
		$word1 = $_POST['word1'];
		$word2 = $_POST['word2'];
		$word3 = $_POST['word3'];
		$word4 = $_POST['word4'];
		
		$plusdata = mysql_query("INSERT INTO 'word'('word1','word2','word3','word4') VALUES('$word1','$word2','$word3','$word4')");
		echo "INSERT INTO 'word'('id','word1','word2','word3','word4') VALUES('10','$word1','$word2','$word3','$word4')";
		}

		switch ($action) {
			case 'list':
				list1();
				break;
			case 'del':
				del1($id);
				break;
				case 'plus':
				plus();
				break;
			default:
				echo "error";
				break;
		}






	}
}
?>