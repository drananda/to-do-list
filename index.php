<?php 

require_once 'store.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>To Do List</h1>
        <form action="store.php" method="post" class="add-to-do-list">
            <input type="text" name="to-do-list">
            <button type="submit" name="submit">Add</button>
        </form>
        <ul class="to-do-list">
            <?php foreach(getToDoList() as $li): ?>
                <li><span><?= $li ?></span>
                    <form action="store.php" method="post">
                        <input type="hidden" name="remove-to-do-list" value="<?= $li ?>">
                        <button class="remove-list" type="submit" title="Remove list">X</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <script src="script.js"></script>
</body>
</html>