<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=select', 'root', '');
?>

<form method="post">
    <select id="estados" name="estados">
        <?php 
            $estados = $pdo->prepare("SELECT * FROM estados");
            $estados->execute();
            foreach ($estados as $key => $value) {
        ?>
        <option value="<?php echo $value['id_estado']; ?>"><?php echo $value['nome']; ?></option>
        <?php 
            }
        ?>
    </select>
    <select style="display: none;" id="cidades" name="cidades"></select>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    /*
     $(function(){
         $('#estados').on('change', function(){
             let idEstado = $('#estados').val();
             let form = $('form');
             $.ajax({
                 url: 'cidades.php',
                 type: 'post',
                 data: {id: idEstado},
                 beforeSend: function(){
                     $('#cidades').css('display', 'block');
                 },
                 success: function(data){
                     $('#cidades').css('display', 'block');
                     $('#cidades').html(data);
                 }
             })
         });
     })
    */
    let estados = document.getElementById('estados');

    estados.onchange = function(){
        let url = 'cidades.php';
        let idEstado = document.getElementById('estados').value;
        let xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let cidades = document.getElementById('cidades');
                cidades.style.display = 'block';
                cidades.innerHTML = this.responseText;
            }
        }
        xhr.send("id="+idEstado);


    }
    
</script>