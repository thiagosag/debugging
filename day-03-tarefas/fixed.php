<?php
	session_start();

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


	if (!isset($_SESSION['tasks'])) {
			$_SESSION['tasks'] = [];
	}

		$tasks = array();
		$tasks = $_SESSION['tasks'];
		
	// adicionar tarefa
	if (isset($_POST['task']) && $_POST['text'] != "") {
		 $tasks[]= [
			"text" => $_POST['text'],
			"done" => false
		];
		$_SESSION['tasks'] = $tasks;
	}

	// marcar como concluída
	if (isset($_GET['done'])) {
		$tasks[$_GET['done']]['done'] = true;
		$_SESSION['tasks'] = $tasks;
		header('Location: fixed.php');
		exit;
	}

	// remover tarefa
	if (isset($_GET['delete'])) {
		unset($tasks[$_GET['delete']]);
		$_SESSION['tasks'] = $tasks;
		header('Location: fixed.php');
		exit;
	}

	// salvar
	if(isset($_GET['salvar'])){
		$_SESSION['tasks'] = $tasks;
		echo 'Salvo';
	}
	// contagem
	$total = count($tasks);

	$done = 0;
	foreach ($tasks as $x) {
		if($x['done'] === true){
			$done++;		
		}
	}
	if ($done > 0){
		$percent = ($done / $total) * 100;
	}
?>

	<!DOCTYPE html>
	<html>
	<head>
		 <title>Tasks</title>

		 <style>
		     body {
		         font-family: Arial;
		         background #f0f0f0;
		     }

		     .task {
		         padding: 10px;
		         border-bottom: 1px solid black;
		     }

		     .done {
		         text-decoration: line-through;
		         color: green;
		     }

		     .progress {
		         margin: 10px 0;
		         background: #ddd;
		         height: 20px;
		     }

		     .bar {
		         height: 20px;
		         background: green;

		     }
		 </style>

		 <script>
		     function addTask() {
		         let t = document.getElementById("task").value;
		         if (t === "") {
		             alert("Digite algo");
		         } else { 
		         	document.forms[0].submit();
		     		}
				}

		     function done(i) {
		         location.href = "?done=" + i;
		     }

		     function del(i) {
		         location.href = "?delete=" + i;
		     }
		 </script>
	</head>

	<body>

		<h1>Lista de Tarefas</h1>
		<form method="POST">	
			<input name="text" id="task">
			<button name="task" onclick="addTask()">Adicionar</button>
		</form>
			<div class="progress">
				 <div class="bar" style="width:<?php echo $percent ?? 0?>%;">%</div>
			</div>

			<p><?php echo $done ?>/<?php echo $total ?> concluídas</p>

			<?php foreach ($tasks as $i => $t): ?>
				 <div class="task <?php if (isset($i) && $t['done'] === true){echo 'done';}?>">
					  <?php echo $t['text'];?>
	
					  <button onclick="done(<?php echo $i; ?>)">OK</button>
					  <button onclick="del(<?php echo $i; ?>)">X</button>
				 </div>
			<?php endforeach; ?>
	</body>
</html>
	
