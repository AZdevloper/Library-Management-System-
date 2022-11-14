<?php
include('connexion.php');
session_start();
if (isset($_POST['save']))
  add_book();
if (isset($_POST['update']))
  update_book();
if (isset($_GET['id']))
  delete_book();


// if (isset($_GET['id'])) {
//       delete_book();
// }

if (isset($_POST['sign_out'])) {

  session_destroy();
  header("Location: sign_in.php");

}

function get_all_books()
{
  global $conn;


  $sql = "SELECT
          b.id,  b.title, b.author, b.publish_year, b.isbn, l.name as language ,l.id as lang_id
                            FROM language l
                            JOIN book b
                            ON l.id = b.language_id ;";

  $result = $conn->query($sql);
  foreach ($result as $row) {
    $upd_params = '`'
      . $row['isbn']
      . '`,`'
      . $row['title']
      . '`,`'
      . $row['author']
      . '`,`'
      . $row['publish_year']
      . '`,`'
      . $row['lang_id']
      . '`,`'
      . $row['id']
      . '`';

    echo '  <tr>
      <th scope="row"> ' . $row['isbn'] . '</th>
      <td id="title"> ' . $row['title'] . '  </td>
      <td>' . $row['author'] . ' </td>
      <td>' . $row['publish_year'] . ' </td>
      <td> ' . $row['language'] . '
   <div class="d-inline-block  ms-40px">
       <a href="scripts.php?id=' . $row['id'] . '" > 
           <i class=" fs-19px fa  fa-trash  "  style="color: red;" > </i> 
       </a>
       <a onclick="update('. $upd_params .')" data-bs-toggle="modal" href="#modal-task"> 
           <i class=" mx-3 fs-19px   fa fa-edit  "    style="color: green; "  ></i> 
       </a>  
   </div>                   
      </td>
  
  </tr>  ';

  }

}

function delete_book()
{

  global $conn;

  $id = $_GET['id'];
  echo $id;
  //CODE HERE
  $sql = "  DELETE FROM `book` WHERE id = '$id'";
  $result = $conn->query($sql);

  if (!$result) {

    $_SESSION['message'] = "book did not  deleted!";

    header('location: index.php');
  } else {

    //add action delete to statistic
    // $sql = "    INSERT INTO `statistical`(`id`, `book_id`, `users_id`, `action_id`, `date_time`)
    //                    VALUES (NULL,'$id','[value-3]','[value-4]','[value-5]')";
    // $result = $conn->query($sql);

    $_SESSION['message'] = "book has been deleted successfully!";
    header('location: index.php');
  }
}
function statistical()
{
  global $conn;
  $sql = " SELECT count(*) as number FROM `book` ";

  $result = $conn->query($sql);
  foreach ($result as $row) {
    echo $row['number'];
  }


}

function add_book()
{
  global $conn;
  $date = $_POST["date"];
  $lang = $_POST["lang"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $isbn = $_POST["isbn"];


  if (empty($isbn) || empty($title) || empty($author) || empty($date) || empty($lang)) {
    $_SESSION['form_vide_message'] = "remplire toute la form !";
  } else {



    $sql = "INSERT INTO `book`(`id`, `isbn`, `Author`, `title`, `language_id`, `publish_year`)
       VALUES (NULL,'$isbn','$author','$title','$lang',' $date');";

    $result = $conn->query($sql);


    if (!$result) {
      $_SESSION['message'] = "le livre n'est étté pas ajouter !";
      header('Location: index.php');

    } else {

      $_SESSION['message'] = "le livre est ajouter avec succée !";
      header('Location: index.php');
    }



  }

}
function  update_book()
{
  
  global $conn;
  $date = $_POST["date"];
  $lang = $_POST["lang"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $isbn = $_POST["isbn"];
  $id = $_POST["input_hidden"];


  if (empty($isbn) || empty($title) || empty($author) || empty($date) || empty($lang)) {
    $_SESSION['form_vide_message'] = "remplire toute la form !";
  } else {



    $sql = "UPDATE `book` SET `isbn`='$isbn',`Author`='$author',
    `title`='$title',`language_id`='$lang',`publish_year`='$date' WHERE id = $id ";
       
    $result = $conn->query($sql);


    if (!$result) {
      $_SESSION['message'] = "le livre n'est étté pas moudifier !";
      header('Location: index.php');

    } else {

      $_SESSION['message'] = "le livre est modifier avec succée !";
      header('Location: index.php');
    }



  }

}

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