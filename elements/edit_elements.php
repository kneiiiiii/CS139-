<?php
	session_start();
	include_once('../include/database.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{

			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("UPDATE elements SET name = :name, atomic_no = :atomic_no, group_id = :group_id, atomic_weight = :atomic_weight, 
                                description = :description WHERE id = :elementid");

            //bind params
            $sql->bindParam(':elementid', $_GET['id'], PDO::PARAM_INT);
            $sql->bindParam(':name', $_POST['name']);
            $sql->bindParam(':atomic_no', $_POST['atomic_no']);
			$sql->bindParam(':group_id', $_POST['element_group']);
            $sql->bindParam(':atomic_weight', $_POST['atomic_weight']);
            $sql->bindParam(':description', $_POST['description']);

			//if-else statement in executing our prepared statement
			$_SESSION['message'] = ( $sql->execute()) ? 'Element updated successfully': 'Something went wrong. Cannot update element.';

		}
        
		catch(PDOException $e){
			$_SESSION['message'] = $e->getCode() == 23000 ? 'Existing Atomic Number!' : $e->getMessage();
		}
		

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../index.php');
	
?>