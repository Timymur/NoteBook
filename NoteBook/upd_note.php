<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php
          $pdo = new PDO('mysql:host=localhost;dbname=NoteBook','root','');
          $sql = "SELECT * FROM users WHERE id = ?";
          $query = $pdo->prepare($sql);
          $query->execute([$_GET['id']]);

          $note = $query->fetch(PDO::FETCH_OBJ);

          $website_title = 'Обновление записи';
          require "blocks/head.php" ;

          $sql = "SELECT * FROM typeOfRelationShip WHERE ? = typeOfRelationShip.id_user ";
          $query = $pdo->prepare($sql);
          $query->execute([$note->id]);
          $note_2 = $query->fetch(PDO::FETCH_OBJ);

          $sql = "SELECT * FROM notes WHERE ? = notes.user_id ";
          $query = $pdo->prepare($sql);
          $query->execute([$note->id]);
          $note_3 = $query->fetch(PDO::FETCH_OBJ);


    ?>
  </head>
  <body>
    <?php
        require "blocks/header.php" ;
    ?>
    <main>
      <?php
       echo "
      <h1>Обновление записи</h1>
      <form>
          <label for='name'>Введите  имя</label>
          <input type='text' name='name' id='name' value='".$note->name."'>

          <label for='num'>Введите номер</label>
          <input type='text' name='num' id='num' value='".$note->num."'>

          <label for='adres'>Введите адрес</label>
          <input type='text' name='adres' id='adres' value='".$note->adres."'>

          <label for='note'>Напишите напоминание или событие связанное с человеком</label>
          <input type='text' name='note' id='note' value='".$note_3->note."'>

          <label for='date'>Введите дату события</label>
          <input type='date' name='date' id='date' value='".$note_3->date."'>

          <label for='TOR'>Введите тип взаимоотношений</label>
          <input type='text' name='TOR' id='TOR' value='".$note_2->TOR."'>

          <h1><div class='error-mess' id='error-block'></div></h1>

          <button type='button' id='upd_user'>Обновить</button>

          <input type='hidden'  id='upd_id' value=' " . $note->id . "'   >
      </form>";
      ?>
    </main>
    <?php
        require "blocks/footer.php" ;
    ?>
    <script>

            $('#upd_user').click(function(){
                let id = $('#upd_id').val();
                let name = $('#name').val();
                let num = $('#num').val();
                let adres = $('#adres').val();
                let note = $('#note').val();
                let date = $('#date').val();
                let TOR = $('#TOR').val();

                $.ajax({
                    url: "ajax/upd_note.php",
                    type: 'POST',
                    cache: false,
                    data: {'name': name,
                            'id': id,
                          'num': num,
                          'adres': adres,
                          'note': note,
                          'date': date,
                          'TOR': TOR
                        },
                    datatype: 'html',
                    success: function(data){
                      if(data === "Done"){
                        $('#error-block').hide();

                      }
                      else{
                        $('#error-block').show();
                        $("#error-block").text(data);

                      }

                    }
                });
            });

    </script>

  </body>
</html>
