<?php
   session_start();
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   if (!isset($_SESSION['count'])) {
       $_SESSION['count'] = 0;
   }

   $count = $_SESSION['count'];

   if (isset($_GET['click'])) {
       $count = $count + 1;
       $_SESSION['count'] = $count;
       header('Location: fixed.php');
       exit;  
   }

   if (isset($_GET['reset'])) {
       $count = 0;
       $_SESSION['count'] = $count;
       header('Location: fixed.php');
       exit;
   }
   
   if (isset($_GET['multiplicar'])){
         $count = $count * 2;
         $_SESSION['count'] = $count;
         header('Location: fixed.php');
         exit;
      }
     $count = $_SESSION['count'];
?>

<!DOCTYPE html>
<html>
   <head>
       <title>Contador</title>

       <style>
           body {
               font-family: Arial;
               background: #eee;
           }

           .box {
               width: 200px;
               margin: 100px auto;
               text-align: center;
           }

           button {
               padding: 10px;
               margin: 5px;
               background: black;
               color: white;
           }
       </style>
   </head>

   <body>

      <div class="box">
          <h1><?php echo $count ?></h1>

          <a href="?click=1">
              <button>Clique</button>
          </a>

          <a href="?reset=1">
              <button>Reset</button>
          </a>
          <a href="?multiplicar">
               <button>Multiplicar por 2</button>         
         </a>
      </div>

   </body>
</html>
