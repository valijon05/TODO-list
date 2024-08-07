<?php

declare(strict_types=1);

(new Task())->uncompleted((int)$_GET['id']);
header('Location: /todos');
exit();
