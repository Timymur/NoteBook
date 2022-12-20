<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=NoteBook','root','');
        $sql = "SELECT * FROM users WHERE id = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$_GET['id']]);


        $note = $query->fetch(PDO::FETCH_OBJ);


        $website_title = $note->name;
        require "blocks/head.php" ;
    ?>
  </head>
  <body>
    <?php
        require "blocks/header.php" ;
    ?>
    <main>
      <?php

            $sql = "SELECT * FROM typeOfRelationShip WHERE ? = typeOfRelationShip.id_user ";
            $query = $pdo->prepare($sql);
            $query->execute([$note->id]);
            $note_2 = $query->fetch(PDO::FETCH_OBJ);

            $sql = "SELECT * FROM notes WHERE ? = notes.user_id ";
            $query = $pdo->prepare($sql);
            $query->execute([$note->id]);
            $note_3 = $query->fetch(PDO::FETCH_OBJ);

              echo " <div class='real_del'><h1>Вы действительно хотите удалить эту запись?</h1></div>
                    <div class='post'>
                        <div class='item1'>
                              <h1>" . $note->name . "</h1>

                              <p class='adres'>  Номер:<br> " . $note->num . "</p>
                              <p class='adres'>Адрес: <br> " . $note->adres . "</p>
                              <p class='adres'>Запись:<br>  " . $note_3->note . "</p>
                              <p class='adres'>Дата:<br>  " . $note_3->date . "</p>
                              <p class='adres'>Тип взаимоотношений:<br>  " . $note_2->TOR . "</p>
                              <input type='hidden'  id='file' value='" . $note->id . "'   >
                        </div>

                        <div class='chng_btn','item2' >
                            <button class='del' type='submit' id='del_user' title='Удалить'>Удалить</button>
                            <a href='main.php'>
                              <button class='del' title='Отмена'>Отмена</button>
                            </a>

                        </div>

                    </div>";


      ?>
    </main>
    <?php
        require "blocks/footer.php" ;
    ?>
    <script>

            $('#del_user').click(function(){

                let id = $('#file').val();

                

                $.ajax({
                    url: "ajax/del_note.php",
                    type: 'POST',
                    cache: false,
                    data: {'id': id },
                    datatype: 'html',
                    success: function(data){
                      if(data === "Done"){
                        $("#file").text("Все готово");
                      }
                    }
                });
            });

    </script>


  </body>
</html>
