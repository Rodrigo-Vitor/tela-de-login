<?php 
namespace src\controllers;

use \core\Controller;
use src\models\User;

class UserController extends Controller {
    public function feed($args) {
        $data = User::select()->where('id', $args['id'])->execute();
        if(count($data) > 0) {
            if(isset($_SESSION['user'])){
                $this->render('feed');
                exit;
            }
        }
        $this->redirect('/');
    }

    public function create() {
       $name = filter_input(INPUT_POST, 'name');
       $email = filter_input(INPUT_POST, 'email');
       $password = filter_input(INPUT_POST, 'password');
       $confPass = filter_input(INPUT_POST, 'confPass');

       if($name && $email && $password && $confPass) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $data = User::select()->where('email', $email)->execute();
            if(count($data) === 0) {
                User::insert([
                    "name" => $name,
                    "email" => $email,
                    "senha" => $hash,
                ])->execute();
                $this->redirect('/?msg=cadastrado com sucesso');
            }
       } else {
        $this->redirect('/?msg=preenche todos os dados');
       }
    }

    public function login() {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if($email && $password) {
            $data = User::select()->where('email', $email)->execute();
            if(count($data) > 0) {
                if(password_verify($password, $data[0]['senha'])) {
                    $_SESSION['user'] = $data[0];
                    $this->redirect('/feed/'.$data[0]['id']);   
                }
            }
        }

        $this->redirect('/');
    }

    public function logout() {
        session_destroy();
        $this->redirect('/');
    }
}

?>