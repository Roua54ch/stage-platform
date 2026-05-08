<?php

require_once "../models/Offre.php";
require_once "../core/Controller.php";
require_once "../helpers/Validator.php";

class OffreController extends Controller {

    // 📄 LIST
    public function index() {

        $this->auth(); // 🔐 protection

        $data['offres'] = (new Offre())->all();

        $this->view("offres/index", $data);
    }

    // ➕ CREATE
    public function create() {

        $this->auth();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = [];

            if (empty($_POST['titre'])) {
                $errors['titre'] = "Titre required";
            }

            if (empty($_POST['description'])) {
                $errors['description'] = "Description required";
            }

            if (empty($errors)) {

                (new Offre())->insert([
                    "titre" => $_POST['titre'],
                    "description" => $_POST['description'],
                    "entreprise_id" => $_SESSION['user']['id']
                ]);

                $this->redirect("/offre/index");
            }

            return $this->view("offres/create", ["errors" => $errors]);
        }

        $this->view("offres/create");
    }

    // ✏️ EDIT FORM
    public function edit($id) {

        $this->auth();

        $offre = (new Offre())->find($id);

        $this->view("offres/edit", ["offre" => $offre]);
    }

    // 🔁 UPDATE
    public function update($id) {

        $this->auth();

        (new Offre())->update($id, [
            "titre" => $_POST['titre'],
            "description" => $_POST['description']
        ]);

        $this->redirect("/offre/index");
    }

    // 🗑️ DELETE
    public function delete($id) {

        $this->auth();

        (new Offre())->delete($id);

        $this->redirect("/offre/index");
    }
}