

<?php

    //INCLUDE DATABASE FILE
    include('connexion.php');
 

    //ROUTING
    // if(isset($_POST['save']))        saveTask();
    // if(isset($_POST['update']))      updateTask();
    // if(isset($_GET['id']))      deleteTask();
    // if(isset($_GET['upid']))      $stor_index = $_GET['upid'];;
     
    

//     $sql ="SELECT * FROM `book` WHERE 1";
//    $result = $conn->exec($sql);

//       while ($row = $result->fetch_assoc()) {
//        echo "<pre>";
//         var_dump($row["id"]);
//         echo "</pre>";

//       }

      
                
    
// function getTasks($task_status){ 
        
//     $sql ="select * from book ";
//     $conn->exec($sql);
//       foreach($conn as $row){
//         echo "<pre>";
//         var_dump($row);
//         echo "</pre>";
//      }
//     }


// function saveTask()
//         {
//             include('database.php');
//             $title = $_POST["title"];
//             $type = $_POST["task-type"];
//             $Priority = $_POST["Priority"];
//             $Status = $_POST["Status"];
//             $date = $_POST["Date"];
//             $description = $_POST["Description"];
            

//     if (empty($type) || empty( $title ) ||empty($Priority) || empty($Status) ||empty($date) || empty($description) ) {
//         $_SESSION['form_vide_message'] = "pleas fill all the form !";
//     }else{


            
//     $sql = "INSERT INTO tasks ( title, type_id, priority_id, status_id, task_datetime, descreption)"
//             ." VALUES ('$title','$type','$Priority','$Status','$date','$description')";

//     $result = mysqli_query($conn,$sql);


//     if (!$result) {
//         $_SESSION['message'] = "Task did not  added !";
//         header('location: index.php');
        
//     }else {

//         $_SESSION['message'] = "Task has been added successfully !";
//         header('location: index.php');
//     }
        

            
//     }        
//         }











// function updateTask()
//     { 
//     include('database.php');

//     if(isset($_POST['update']))  $id = $_POST['input-hidden'];
//     $title = $_POST["title"];
//     $type = $_POST["task-type"];
//     $Priority = $_POST["Priority"];
//     $Status = $_POST["Status"];
//     $date = $_POST["Date"];
//     $description = $_POST["Description"];
    

//     if (empty($type) || empty( $title ) ||empty($Priority) || empty($Status) ||empty($date) || empty($description) ) {
//     $_SESSION['form_vide_message'] = "pleas fill all the form !";
//     }else{


        
 
//         $sql ="    UPDATE `tasks` SET `title`='$title',`type_id`='$type',`priority_id`='$Priority',`status_id`='$Status',
//                         `task_datetime`='$date',`descreption`='$description',`id`='$id' WHERE id = $id";

//     $result = mysqli_query($conn,$sql);


//     if (!$result) {
//     $_SESSION['message'] = "Task did not  updated !";
//     header('location: index.php');

//     }else {

//     $_SESSION['message'] = "Task has been updated successfully !";
//     header('location: index.php');
//     }


        
//     }   
   
// }


// function deleteTask()


    // {     include('database.php');
    //     $id = $_GET['id'];
    //     echo $id;
    //     //CODE HERE
    // $sql = "  DELETE FROM `tasks` WHERE id = $id";
    // $result = mysqli_query($conn,$sql);

    // if (!$result){

    //     $_SESSION['message'] = "Task did not  deleted!";

    //         header('location: index.php');}

    //     else {
    //         $_SESSION['message'] = "Task has been deleted successfully!";
    //         header('location: index.php');
    //     }
    // }

?>