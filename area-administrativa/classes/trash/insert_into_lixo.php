$autor = $dados['autor'];
$data = $dados['data'];
$tipo = $dados['tipo'];
$titulo = $dados['titulo'];
$titulo = $dados['semestre'];

$query=$pdo->query("INSERT INTO trabalhos(autor, data, tipo, tituloTrabalho, semestre) VALUES ('$autor', '$data', '$tipo', '$titulo', '$semestre' )");
