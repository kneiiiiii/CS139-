<?php
	session_start();
	include_once('../include/database.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		
		try{
			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("INSERT INTO elements (name, atomic_no, group_id, atomic_weight, description) VALUES (:name, :atomic_no, :group_id, :atomic_weight, :description)");

			//bind
			$sql->bindParam(':name', $_POST['name']);
			$sql->bindParam(':atomic_no', $_POST['atomic_no']);
			$sql->bindParam(':group_id', $_POST['element_group']);
			$sql->bindParam(':atomic_weight', $_POST['atomic_weight']);
			$sql->bindParam(':description', $_POST['element_descrip']);

			//if-else statement in executing our prepared statements
			$_SESSION['message'] = ( $sql->execute()) ? 'Element added successfully' : 'Something went wrong. Cannot add Element.';	
		
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