
<ul>
<?php
$todoList = $todo->getTodos();
foreach ($todoList as $item):
    echo "<li>{$item['text']}</li>";
endforeach;
?>
</ul>

<form action="" method="post">
    <input type="checkbox">
    <input type="text" name="text">
    <button type="submit">Add</button>
</form>
