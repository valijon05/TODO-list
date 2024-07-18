
<ul>
<?php
$todoList = $todo->getTodos();
foreach ($todoList as $item):
    echo "<li>{$item['name']}</li>";
endforeach;
?>
</ul>

<form action="" method="post">
    <input type="checkbox">
    <input type="text" name="text">
    <button type="submit">Add</button>
    <button type="submit">Update</button>
    <button type="submit">Delete</button>
</form>
