<?php
   session_start();

   if (!$_SESSION['count']) {
       $_SESSION['count'] = 0;
   }

   $count = $_SESSION['count'];

   if (isset($_GET['click'])) {
       $count = $count + 1;
   }

   if (isset($_GET['reset'])) {
       $count = 0;
   }

?>

<!DOCTYPE html>
<html>
   <head>
       <title>Contador</title>

       <style>
           body {
               font-family: Arial;
               background: #eee
           }

           .box {
               width: 200px;
               margin: 100px auto;
               text-align: center;
           }

           button {
               padding: 10px;
               margin: 5px
               background: blue;
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
   </div>

   </body>
</html>
