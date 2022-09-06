<?php

include_once ("conexao.php");

$filtro = isset($_GET["filtro"])?$_GET["filtro"]:"";
$sql = "select * from usuarios where profissao like '%$filtro%' order by nome";
$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Cadastro</title>
        <link rel="stylesheet" href="_css/estilo.css">
    </head>
    <body>
        <div class="container">
            <nav>
                <ul class="menu">
                    <a href="index.php"><li>Cadastro</li></a>
                    <a href="consultas.php"><li>Consultas</li></a>
                </ul>
            </nav>
            <section>
                <h1>Consultas</h1>
                <hr><br>

                <form method="get" action="">
                    Filtrar por profissão: <input type="text" name="filtro" class="campo" required autofocus>
                    <input type="submit" value="Pesquisar" class="btn">
                </form>

                <form method="get" action="teste.php">
                    <input type="submit" value="Teste" class="btn">

                    <?php

                        print "Resultado da pesquisa com a palavra <strong>$filtro</strong><br><br>";

                        print "$registros registros encontrados.";

                        print "<br><br>";

                        while($exibirRegistros = mysqli_fetch_array($consulta)) {
                            

                            $codigo = $exibirRegistros[0];
                            $nome = $exibirRegistros[1];
                            $email = $exibirRegistros[2];
                            $profissao = $exibirRegistros[3];

                            print "<article>";

                            print "<input type='checkbox' id='$codigo' name='$codigo'><br>";

                            #print "$codigo<br>";
                            print "$nome<br>";
                            print "$email<br>";
                            print "$profissao";

                            print "</article>";
                        }

                        mysqli_close($conexao);

                    ?>
                </form>
            </section>
        </div>
    </body>
</html>