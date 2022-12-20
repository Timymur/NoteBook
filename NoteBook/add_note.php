<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php
        $website_title = 'AddNote';
        require "blocks/head.php" ;
    ?>
  </head>
  <body>
    <?php
        require "blocks/header.php" ;
    ?>
    <main>
      <h1>Добавление новой записи</h1>
      <form>
          <label for="name">Введите  имя</label>
          <input type="text" name="name" id='name'>

          <label for="num">Введите номер</label>
          <input type="text" name="num" id='num'>

          <label for="adres">Введите адрес</label>
          <input type="text" name="adres" id='adres'>

          <label for="note">Напишите напоминание или событие связанное с человеком</label>
          <input type="text" name="note" id='note'>

          <label for="date">Введите дату события</label>
          <input type="date" name="date" id='date'>

          <label for="TOR">Введите тип взаимоотношений</label>
          <input type="text" name="TOR" id='TOR'>

          <h1><div class="error-mess" id='error-block'></div></h1>

          <button type="button" id='add_user'>Добавить</button>
      </form>
    </main>
    <?php
        require "blocks/footer.php" ;
    ?>
    <script>

            $('#add_user').click(function(){
                let name = $('#name').val();
                let num = $('#num').val();
                let adres = $('#adres').val();
                let note = $('#note').val();
                let date = $('#date').val();
                let TOR = $('#TOR').val();

                $.ajax({
                    url: "ajax/add_note.php",
                    type: 'POST',
                    cache: false,
                    data: {'name': name,
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
                        $("#name").val("");
                        $("#num").val("");
                        $("#adres").val("");
                        $("#note").val("");
                        $("#date").val("");
                        $("#TOR").val("");



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
