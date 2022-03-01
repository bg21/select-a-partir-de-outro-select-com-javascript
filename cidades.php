<?php 
	$pdo = new PDO('mysql:host=localhost;dbname=select', 'root', ''); //nossa conexão

	$cidades = $pdo->prepare("SELECT * FROM cidades WHERE estados_id = ?");
    $cidades->execute([$_POST['id']]);

    $cidades = $cidades->fetchAll();
    foreach ($cidades as $key => $value) {
?>
	<option><?php echo $value['nome']; ?></option>

<?php } ?>