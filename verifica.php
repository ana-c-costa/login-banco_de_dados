<?php

    $login= $_POST["login"];
    $senha= $_POST["senha"];

    include("conecta.php");/*responsável por conhectar o banco de dados*/

    $comando = $pdo->prepare("SELECT * FROM usuarios where login= '$login' and senha='$senha'");
    $resultado = $comando->execute();

    $n=0;
    $admin="n";   

    while($linhas = $comando->fetch())
    {
        $n=1;
        $admin= $linhas["admin"];

    }
    if($n==0)
    {
        header("Location:index.html");
    }

    if($n==1)
    {
        if($admin == "s")
        {
            header("Location:admin.html");
        }
    else
        {
        header("Location:usuario.html");
        }
    }
?>