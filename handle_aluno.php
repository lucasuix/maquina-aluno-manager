<?php

session_start();

function obter_aluno($matricula_inserida) {
    
    include("config.php");
    
    $stmt = $pdo->prepare("SELECT (matricula) FROM alunos WHERE matricula = :matricula_inserida");
    $stmt->bindParam(':matricula_inserida', $matricula_inserida, PDO::PARAM_STR);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function verificar_sintaxe($matricula) {
    
    if (is_numeric($matricula)): return is_int(intval($matricula));
    else: return false;
    endif;
}

function retornar_com_mensagem($mensagem) {
 
    $_SESSION['message'] = $mensagem;
    header("Location: ./index.php");
    die;
    
}

function cadastro($matricula_inserida, $nome_inserido, $maquina_inserida) {
    
    include("config.php");
    
    $stmt = $pdo->prepare("SELECT (maquina) FROM alunos WHERE maquina = :maquina_inserida");
    $stmt->bindParam(':maquina_inserida', $maquina_inserida, PDO::PARAM_STR);
    $stmt->execute();
    
    $rowCount = $stmt->rowCount();
    
    if ($rowCount == 0):
    
        $stmt = $pdo->prepare("INSERT INTO alunos (matricula, nome, maquina) VALUES (?, ?, ?)");
        $stmt->execute([$matricula_inserida,
                        $nome_inserido,
                        $maquina_inserida]);
                        
        return true;
    
    else:
        
        return false;
        
    endif;
}







if ($_SERVER['REQUEST_METHOD'] == 'POST'):

    $nome_inserido = $_POST['nome_do_aluno'];
    $matricula_inserida = $_POST['matricula'];
    
    if (verificar_sintaxe($matricula_inserida) == false) retornar_com_mensagem('Matricula deve conter apenas números.');
    //Verificar sintaxe do nome
    
    $_SESSION['nome'] = $nome_inserido;
    $_SESSION['matricula'] = $matricula_inserida;
    
    $aluno = obter_aluno($matricula_inserida);
    
    if ($aluno)
    { //O aluno já escolheu uma máquina, e só o professor pode alterar
    retornar_com_mensagem('Você já escolheu uma máquina. Contate seu professor para realizar quaisquer mudanças.');
    }
    
    else
    { //É uma matrícula nova, possível escolher uma máquina
        
        if (cadastro($matricula_inserida, $nome_inserido, $_POST['maquinaSelecionada']))
        {
        retornar_com_mensagem('Cadastro realizado com sucesso');
        }
        else
        {
        retornar_com_mensagem('Máquina não disponível');
        }
        
    }

else: retornar_com_mensagem('Dados inválidos');
endif;
