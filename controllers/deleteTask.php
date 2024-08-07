<?php

declare(strict_types=1);

(new Task())->delete((int)$_GET['id']);
header('Location: /todos');
exit();
