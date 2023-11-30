<!DOCTYPE html>

<?php 

session_start();

?>

<html>
    <head>
        <title> Welcome! </title>
    </head>
    
    
    <body>
        
        <h4> Login do Professor </h4><br>
        
        <form method = 'POST' action = 'handle_professor.php'>
            
            <input name = 'matricula' type = 'text' placeholder = 'Matricula' >
            <input name = 'senha' type='password' placeholder = 'Senha'>
            
            <!-- Aqui é o lugar reservado para se escolher as máquinas -->
            
            <input type = 'submit'>
        </form>
        
        <hr>
        
        <a href='./'><h4> Sou Aluno </h4></a>
        
    </body>
</html>
