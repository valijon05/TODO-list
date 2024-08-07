<?php

declare(strict_types=1);

(new Task())->complete($_POST['text']);
heade('Location: /todos');
exit();

