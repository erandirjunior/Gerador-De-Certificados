<?php 

function conexao() {
    try {
        $socket = new PDO('mysql:host=localhost;dbname=teste',
            'root', 'root');
        $socket->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $socket;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    

}