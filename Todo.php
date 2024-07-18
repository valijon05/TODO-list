<?php
class Todo
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function setTodo(strning $todoName)
    {
        $status   = false;
        $todoName = trim($todoName);
        $stm      = $this->pdo->prepare('INSERT INTO todos(text,status) VALUES(:text,:status)');
        $stm->binParam(':text',$_POST['text'],trim($todoName));
        $stm->binParam(':status',$status, PDO::PARAM_BOOL);
        $stm->execute();
    }


    public function getTodos()
    {
        return $this->pdo->query("SELECT * FROM todos")->fetchALL (PDO::FETCH_ASSOC);
    }

}

?>