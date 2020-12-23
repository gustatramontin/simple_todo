<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/index.css">
    <title>Simple Todo</title>
</head>

<body onload="todo.appear_and_disappear_animation()">
    <div class="root">
        <h1>Simple Todo</h1>
        <div class="todos">
        <?php
                foreach($todos as $todo) {
                    echo "<div class=\"todos__todo\"><input type=\"checkbox\" onclick=\"todo.removeToDo(this)\">
                    <span class=\"todo__text\">$todo</span>
                    <span class=\"todo__configs configs__edit\" onclick=\"todo.editTodo(this)\">✏️</span>
                    </div>";
                }
                
            ?>
    </div>
    <div class="add_todo">
        <input type="text" class="add_todo__input">
        <div class="add_todo__button" onclick="todo.addToDo()">+</div>
    </div>

    <footer>
        <h3><?= match ($lang) {
            "pt" => "Contato:",
            default => "Contact:"
        }?></h3>
        <div class="footer__email">contact@simpletodo.com
        </div>
    </footer>
    </div>
    <script src="view/js/todos.js"></script>
</body>

</html>