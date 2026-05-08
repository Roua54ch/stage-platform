<?php

require_once "../app/core/Controller.php";
require_once "../app/models/User.php";

class ProfileController extends Controller {

    public function index() {

        $this->auth();

        $data['user'] = $_SESSION['user'];

        $this->view("profile/index", $data);
    }

    public function update() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            (new User())->update($_SESSION['user']['id'], [
                "name" => $_POST['name'],
                "email" => $_POST['email']
            ]);

            $_SESSION['user']['name'] = $_POST['name'];
            $_SESSION['user']['email'] = $_POST['email'];

            $this->redirect("/profile/index");
        }
    }
}