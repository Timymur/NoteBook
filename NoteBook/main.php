<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php
        $website_title = 'AllNotes';
        require "blocks/head.php" ;
    ?>
  </head>
  <body>
    <?php
        require "blocks/header.php" ;
    ?>
    <main>
      <?php
            $pdo = new PDO('mysql:host=localhost;dbname=NoteBook','root','');

            $sql = "SELECT * FROM users ORDER BY name";
            $query = $pdo->query($sql);

            while($row = $query->fetch(PDO::FETCH_OBJ)){
              echo "<div class='post'>
                        <div class='item1'>
                            <h1>" . $row->name . "</h1>
                            <p class='adres'>  Номер:<br> " . $row->num . "</p>
                            <p class='adres'>Адрес:<br>  " . $row->adres . "</p>
                            <a href='note.php?id=" . $row->id . "' title '" . $row->name . "'>Подробнее</a>
                        </div>
                        <div class='chng_btn','item2' >
                            <a href='del_note.php?id=" . $row->id . "'>
                            <button class='del'  title='Удалить'>Удалить</button>
                            </a>
                            <a href='upd_note.php?id=" . $row->id . "'>
                            <button class='del' title='Обновить'>Обновить</button>
                            </a>
                        </div>

                    </div>";
            }

      ?>
    </main>
    <?php
        require "blocks/footer.php" ;
    ?>



  </body>

</html>
