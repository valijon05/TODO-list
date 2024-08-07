<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/">TODO App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/todos">Todo list</a>
        </li>
        <?php //require 'view/partials/new-todo-from.php';?>


        <?php
        if(isset($_SESSION['user'])):?>
        <li class="nav-item">
          <a class="nav-link" href="/notes">Notes</a>
        </li>
        <?php
        endif;?>
      </ul>
      <?php if(!$_SESSION['user']): ?>
        <a href="/login" class="btn btn-outline-primary mx-2">Login</a>
        <a href="/register" class="btn btn-outline-success">Register</a>
      <?php else: {
        echo $_SESSION['user']; 
        echo "<a href='/logout'class='ms-2 text-underlined'>Logout</a>";
        echo "<a href='https://t.me/rejalar_bot'class='ms-2 text-underlined'>Connect to telegram</a>";

      }
      endif; ?>
      </div>
  </div>
</nav>