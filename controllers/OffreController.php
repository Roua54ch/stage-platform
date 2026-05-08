<?php

require_once "../models/Offre.php";
require_once "../core/Controller.php";
require_once "../helpers/Validator.php";

class OffreController extends Controller {

    // 📄 LIST
    /**
     * List all offers.
     *
     * Requires authentication.
     */
    public function index() {

        $this->auth(); // 🔐 protection

        $data['offres'] = (new Offre())->all();

        $this->view("offres/index", $data);
    }

    // ➕ CREATE
    /**
     * Create a new offer.
     *
     * Requires authentication. On POST, validates and inserts an offer tied to the current user id.
     */
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
    /**
     * Show edit form for a specific offer id.
     *
     * @param mixed $id Offer id
     */
    public function edit($id) {

        $this->auth();

        $offre = (new Offre())->find($id);

        $this->view("offres/edit", ["offre" => $offre]);
    }

    // 🔁 UPDATE
    /**
     * Update a specific offer id.
     *
     * @param mixed $id Offer id
     */
    public function update($id) {

        $this->auth();

        (new Offre())->update($id, [
            "titre" => $_POST['titre'],
            "description" => $_POST['description']
        ]);

        $this->redirect("/offre/index");
    }

    // 🗑️ DELETE
    /**
     * Delete a specific offer id.
     *
     * @param mixed $id Offer id
     */
    public function delete($id) {

        $this->auth();

        (new Offre())->delete($id);

        $this->redirect("/offre/index");
    }
}