<header>
  <span class="logo"><h1>NoteBook</h1></span>
  <nav>
    <a href="main.php" class="kn">Показать все</a>
    <a href="find.php" class="kn">Найти</a>
    <a href="test.php" class="kn">test.php</a>
    <?php if(isset($_COOKIE['login'])): ?>
    <a href="add_note.php" class="kn">Добавить</a>
    <a href="login.php" class="kn">Кабинет</a>
    <?php else: ?>
    <a href="register.php" class="kn">Регистрация</a>
    <a href="login.php" class="kn">Войти</a>
  <?php endif; ?>
  </nav>
</header>
