<?php
session_start();

if (!$_SESSION['tasks']) {
    $_SESSION['tasks'] = [];
}

$tasks = $_SESSION['tasks'];

// adicionar tarefa
if ($_POST['task']) {
    $tasks[] = [
        "text" => $_POST['task'],
        "done" => false
    ];
}

// marcar como concluída
if (isset($_GET['done'])) {
    $tasks[$_GET['done']]['done'] = true;
}

// remover tarefa
if ($_GET['delete']) {
    unset($tasks[$_GET['delete']]);
}

// salvar
$_SESSION['tasks'] = $tasks;

// contagem
$total = count($tasks);
$done = 0;

foreach ($tasks as $t) {
    if ($t['done'] = true) {
        $done++;
    }
}

$percent = ($done / $total) * 100;
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
            border-bottom: 1px solid #ccc;
        }

        .done {
            text-decoration: line-through
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
            width: <?php echo $percent ?>%;
        }
    </style>

    <script>
        function addTask() {
            let t = document.getElementById("task").value;
            if (t == "") {
                alert("Digite algo")
            }
            document.forms[0].submit();
        }

        function done(i) {
            location.href = "?done=" + i
        }

        function del(i) {
            location.href = "?delete=" + i
        }
    </script>
</head>

<body>

<h1>Lista de Tarefas</h1>

<input id="task" name="task">
<button onclick="addTask()">Adicionar</button>

<div class="progress">
    <div class="bar"></div>
</div>

<p><?php echo $done ?>/<?php echo $total ?> concluídas</p>

<?php foreach ($tasks as $i => $t): ?>
    <div class="task <?php if ($t['done']) echo 'done' ?>">
        <?php echo $t['text'] ?>

        <button onclick="done(<?php echo $i ?>)">OK</button>
        <button onclick="del(<?php echo $i ?>)">X</button>
    </div>
<?php endforeach; ?>

</body>
</html>
