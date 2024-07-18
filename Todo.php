<?php
class Todo
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function setTodo(string $todoName)
    {
        $status   = false;
        $todoName = trim($todoName);
        $stm      = $this->pdo->prepare('INSERT INTO todos(name,status) VALUES(:text,:status)');
        $stm->bindParam(':text',$todoName);
        $stm->bindParam(':status',$status, PDO::PARAM_BOOL);
        $stm->execute();
    }


    public function getTodos()
    {
        return $this->pdo->query("SELECT * FROM todos")->fetchALL (PDO::FETCH_ASSOC);
    }

}

?>

