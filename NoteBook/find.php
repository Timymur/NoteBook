<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php
        $website_title = 'Поиск';
        require "blocks/head.php" ;
    ?>
  </head>
  <body>
    <?php
        require "blocks/header.php" ;
    ?>
    <main>
      <h1>ПОИСК</h1>
      <form>
          <label for="name">Введите  имя</label>
          <input type="text" name="name" id='name'>


          <h1><div class="error-mess" id='error-block'></div></h1>

          <button type="button" id='find_user'>Найти</button>
      </form>
    </main>
    <?php
        require "blocks/footer.php" ;
    ?>
    <script>

            $('#find_user').click(function(){
                let name = $('#name').val();

                $.ajax({
                    url: "ajax/find.php",
                    type: 'POST',
                    cache: false,
                    data: {'name': name},
                    datatype: 'html',
                    success: function(data){
                      if(data === "Введите имя"){
                        $('#error-block').show();
                        $("#error-block").text(data);
                      }
                      else{
                        var a = 'note.php?id=';
                        window.location = a + data;


                      }

                    }
                });
            });

    </script>

  </body>
</html>
