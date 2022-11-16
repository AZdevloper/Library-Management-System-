<?php

include('connexion.php');
session_start();
if (isset($_POST['save']))
  add_book();
if (isset($_POST['update']))
  update_book();
if (isset($_GET['id']))
  delete_book();
if (isset($_POST['sauvegarde']))
  update_profile();


// if (isset($_GET['id'])) {
//       delete_book();
// }

if (isset($_POST['sign_out'])) {

  session_destroy();
  header("Location: sign_in.php");

}

function get_all_books()
{
  $userid = $_SESSION["userid"];
  global $conn;


  $sql = "SELECT
  b.id,
  b.title,
  b.author,
  b.publish_year,
  b.isbn,
  l.name AS language,
  l.id AS lang_id
FROM LANGUAGE
  l
JOIN book b ON
  l.id = b.language_id
JOIN statistical s ON
  s.book_id = b.id
WHERE s.action_id = 3 AND users_id = $userid;";

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
      <td scope="row"> ' . $row['isbn'] . '</td>
      <td id="title"> ' . $row['title'] . '  </td>
      <td>' . $row['author'] . ' </td>
      <td>' . $row['publish_year'] . ' </td>
      <td> ' . $row['language'] . '
   <div class="d-inline-block  ms-40px">
       <a href="scripts.php?id=' . $row['id'] . '" > 
           <i class=" fs-19px fa  fa-trash  "  style="color: red;" > </i> 
       </a>
       <a onclick="update(' . $upd_params . ');showBtn(`modifier`)" data-bs-toggle="modal" href="#modal-task"> 
           <i class=" mx-3 fs-19px   fa fa-edit  "    style="color: green; "  ></i> 
       </a>  
   </div>                   
      </td>
  
  </tr>  ';

  }

}
function get_last_three_books()
{
  $userid = $_SESSION["userid"];
  global $conn;


  $sql = "SELECT
  b.id,
  b.title,
  b.author,
  b.publish_year,
  b.isbn,
  l.name AS language,
  l.id AS lang_id
FROM LANGUAGE
  l
JOIN book b ON
  l.id = b.language_id
JOIN statistical s ON
  s.book_id = b.id

WHERE s.action_id = 3 AND users_id = $userid ORDER BY id DESC LIMIT 3; ";

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
      <td scope="row"> ' . $row['isbn'] . '</th>
      <td id="title"> ' . $row['title'] . '  </td>
      <td>' . $row['author'] . ' </td>
      <td>' . $row['publish_year'] . ' </td>
      <td> ' . $row['language'] . '
   <div class="d-inline-block  ms-40px">
       <a href="scripts.php?id=' . $row['id'] . '" > 
           <i class=" fs-19px fa  fa-trash  "  style="color: red;" > </i> 
       </a>
       <a onclick="update(' . $upd_params . ');showBtn(`modifier`)" data-bs-toggle="modal" href="#modal-task"> 
           <i class=" mx-3 fs-19px   fa fa-edit  "    style="color: green; "  ></i> 
       </a>  
   </div>                   
      </td>
  
  </tr>  ';

  }

}
function delete_book()
{
  $userid = $_SESSION["userid"];
  global $conn;

  $id = $_GET['id'];
 
  //CODE HERE
    


  $sql = "DELETE FROM `book` WHERE id = '$id'";
  $result = $conn->query($sql);

  $static = " INSERT INTO `statistical`( `book_id`, `users_id`, `action_id`, `date_time`) 
  VALUES ('$id','$userid','2',now());";
  $conn->query($static);

  if (!$result) {

    $_SESSION['message'] = "book did not  deleted!";

    header('location: index.php');
  } else {


    $_SESSION['message'] = "book has been deleted successfully!";
    header('location: index.php');
  }
}
function amended_book()
{
  $userid = $_SESSION["userid"];
  global $conn;
  $sql = " SELECT count(*) as number FROM `statistical` WHERE action_id = 1 AND users_id = $userid";

  $result = $conn->query($sql);
  foreach ($result as $row) {
    echo $row['number'];
  }


}
function added_book()
{
  $userid = $_SESSION["userid"];
  global $conn;
  $sql = " SELECT count(*) as number FROM `statistical` WHERE action_id = 3 AND users_id = $userid ";

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
  $userid = $_SESSION["userid"];


  if (empty($isbn) || empty($title) || empty($author) || empty($date) || empty($lang)) {
    $_SESSION['form_vide_message'] = "remplire toute la form !";
  } else {



    $insertbook = "INSERT INTO `book`(`id`,`isbn`, `Author`, `title`, `language_id`, `publish_year`)
       VALUES (NULL,'$isbn','$author','$title','$lang',' $date')";
    $result = $conn->query($insertbook);

    $getbookid = "SELECT MAX(id) FROM book ;";
    $bookid = $conn->query($getbookid);

    $lastbookid = 0;
    foreach ($bookid as $row) {

      $lastbookid = $row["MAX(id)"];   
}
echo $lastbookid ;
   
    $static = " INSERT INTO `statistical`( `book_id`, `users_id`, `action_id`, `date_time`) 
      VALUES ('$lastbookid ','$userid','3',now());";

    $conn->query($static);
 

    if (!$result) {
      $_SESSION['message'] = "le livre n'est étté pas ajouter !";
      header('Location: index.php');

    } else {

      $_SESSION['message'] = "le livre est ajouter avec succée !";
      header('Location: index.php');
    }



  }

}
function update_book()
{
  

  global $conn;
  $date = $_POST["date"];
  $lang = $_POST["lang"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $isbn = $_POST["isbn"];
  $id = $_POST["input_hidden"];
  $userid = $_SESSION["userid"];


  if (empty($isbn) || empty($title) || empty($author) || empty($date) || empty($lang)) {
    $_SESSION['form_vide_message'] = "remplire toute la form !";
  } else {



    $sql = "UPDATE `book` SET `isbn`='$isbn',`Author`='$author',
    `title`='$title',`language_id`='$lang',`publish_year`='$date' WHERE id = $id ";


 $static = " INSERT INTO `statistical`( `book_id`, `users_id`, `action_id`, `date_time`) 
   VALUES ('$id ','$userid','1',now());";

 $conn->query($static);


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


function update_profile()
{


  global $conn;
  $userfrnam = $_POST["userfrnam"];
  $userlsnam = $_POST["userlsnam"];
  $useremail = $_POST["useremail"];
  $userid = $_SESSION["userid"];








  $sql = "UPDATE `users` SET `first_name`='$userfrnam',`last_name`='$userlsnam',`email`='$useremail' WHERE id =  $userid ";

  $result = $conn->query($sql);


  if (!$result) {
    $_SESSION['message'] = "error votre profile n'est étté pas moudifier !";
    header('Location: index.php');

  } else {


    $_SESSION["userfrnam"] = $userfrnam;
    $_SESSION["userlsnam"] = $userlsnam;
    $_SESSION["useremail"] = $useremail;


    $_SESSION['message'] = "votre profile est modifier avec succée !";
    header('Location: index.php');
  }




}
// function deleted(){
//   $userid = $_SESSION["userid"];
//   global $conn;
//   $sql = " SELECT count(*) as number FROM `statistical` WHERE action_id = 2 AND users_id = $userid";

//   $result = $conn->query($sql);
//   foreach ($result as $row) {
//     echo $row['number'];
//   }

// }
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