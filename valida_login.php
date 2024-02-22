<?php
    session_start();
 //variavel de authenticação
    $usuario_autenticacao = false;
    $usuario = null;
    $usuario_id = null;
    $perfil_usuario_id = null;

    $perfis = array (1 => 'administrativo', 2 => 'usuario');

$usuarios_app = array(
    array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '12345', 'perfil_usuario' => 1),
    array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '6789', 'perfil_usuario' => 1),
    array('id' => 3, 'email' => 'luis@teste.com.br', 'senha' => '123', 'perfil_usuario' => 2),
    array('id' => 4, 'email' => 'eduarda@teste.com.br', 'senha' => '123', 'perfil_usuario' => 2),
);

foreach ($usuarios_app as $user){
    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticacao = true;
        $usuario = $user['email'];
        $usuario_id = $user['id'];
        $perfil_usuario_id = $user['perfil_usuario'];
    }
   
}


if($usuario_autenticacao){
    echo 'usuario autenticado';
    $_SESSION['autenticado'] = 'sim';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_usuario'] = $perfil_usuario_id;
    $_SESSION['usuario'] = $usuario;
    header('location: home.php');
}else{
    $_SESSION['autenticado'] = 'nao';
    header('location: index.php?login=erro');
}

?>