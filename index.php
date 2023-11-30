<!DOCTYPE html>

<html>
    <head>
        <title> Welcome! </title>
        <link rel='stylesheet' href='./css/style.css'>
        <meta charset='utf-8'>
        
        <?php
        
        session_start();
        
        function obter_nome() {
            if (isset($_SESSION['nome'])) return $_SESSION['nome'];
            else return '';
            
        }
        
        function obter_matricula() {
            if (isset($_SESSION['matricula'])) return $_SESSION['matricula'];
            else return '';
            
        }
        
        ?>
        
    </head>
    
    
    <body>
        
        <form method = 'POST' action = 'handle_aluno.php' class='content-holder'>
            
            
            <div class='content-row'>
            <input name = 'matricula' type = 'text' placeholder = 'Matricula' value="<?php echo obter_matricula(); ?>">
            
            
            <span color='f00'> Máquina:&#32; </span>
            <select name='maquinaSelecionada'>
                <option value='maq1'> 1 </option>
                <option value='maq2'> 2 </option>
                <option value='maq3'> 3 </option>
            </select>
            </span>
            </div>
            
            
            
            <div class='content-row'>
            <input type="text" name="nome_do_aluno" placeholder= 'Seu Nome' value="<?php echo obter_nome(); ?>">
            </div>
            
            
            
            <div class='content-row'>
            <input type = 'submit' class="enviar">
            </div>
        </form>
        
        <div class='content-holder'>
            <div class='content-row'><a href='./professor_login.php'> Sou Professor </a></div>
        </div>
        
        <?php
        
            if (isset($_SESSION['message'])) {
                
                echo "<br><u>" . $_SESSION['message'] . "</u><br>";
                unset($_SESSION['message']);
                
            }
        
        ?>
    </body>
</html>
