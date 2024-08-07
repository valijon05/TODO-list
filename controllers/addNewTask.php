<?php

declare(strict_types=1);

(new Task())->add($_POST['text']);
heade('Location: /todos');
exit();



?>