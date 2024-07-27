<?php

include_once 'models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    // Método para criar um novo usuário
    public function create($nome, $email) {
        $this->user->nome = $nome;
        $this->user->email = $email;

        if($this->user->create()) {
            return "Usuário criado.";
        } else {
            return "Não foi possível criar usuário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne($id) {
        $this->user->id = $id;
        $this->user->readOne();

        if($this->user->nome != null) {
            // Cria um array associativo com os detalhes do usuário
            $user_arr = array(
                "id" => $this->user->id,
                "nome" => $this->user->nome,
                "email" => $this->user->email
            );
            return $user_arr;
        } else {
            return "Usuário não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update($id, $nome, $email) {
        $this->user->id = $id;
        $this->user->nome = $nome;
        $this->user->email = $email;

        if($this->user->update()) {
            return "Usuário atualizado.";
        } else {
            return "Não foi possível atualizar o usuário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete($id) {
        $this->user->id = $id;

        if($this->user->delete()) {
            return "Usuário foi excluído.";
        } else {
            return "Não foi possível excluir usuário.";
        }
    }

    public function index() {
        return $this->readAll();
    }
    
    // Método para listar todos os usuários (exemplo adicional)
    public function readAll() {
        $query = "SELECT id, nome, email FROM " . $this->user->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}
?>
