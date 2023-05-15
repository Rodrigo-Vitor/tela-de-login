<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    public function index() {
        if(!isset($_SESSION['user'])) {
            $this->render('home');
        } else {
            $this->redirect('/feed/'.$_SESSION['user']['id']);
        }
    }
}