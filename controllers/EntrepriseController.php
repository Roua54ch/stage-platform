<?php

require_once "../core/Controller.php";
require_once "../core/Middleware.php";

require_once "../models/Candidature.php";
require_once "../models/Offre.php";
require_once "../models/Notification.php";

class EntrepriseController extends Controller {

    /* ================= DASHBOARD ================= */
    public function dashboard() {

        Middleware::auth('entreprise');

        $entreprise_id = $_SESSION['user']['id'];

        $offreModel = new Offre();
        $candidatureModel = new Candidature();

        $data = [
            "totalOffres" => $offreModel->countByEntreprise($entreprise_id),
            "totalCandidatures" => $candidatureModel->countByEntreprise($entreprise_id)
        ];

        $this->view("entreprise/dashboard", $data);
    }

    /* ================= LISTE OFFRES ================= */
    public function offres() {

        Middleware::auth('entreprise');

        $entreprise_id = $_SESSION['user']['id'];

        $offres = (new Offre())->getByEntreprise($entreprise_id);

        $this->view("entreprise/offres", [
            "offres" => $offres
        ]);
    }

    /* ================= CREATE OFFRE ================= */
    public function createOffre() {

        Middleware::auth('entreprise');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            (new Offre())->create([
                "titre" => $_POST['titre'],
                "description" => $_POST['description'],
                "entreprise_id" => $_SESSION['user']['id']
            ]);

            $this->redirect("/entreprise/offres");
        }

        $this->view("entreprise/create_offre");
    }

    /* ================= CANDIDATURES ================= */
    public function candidatures() {

        Middleware::auth('entreprise');

        $entreprise_id = $_SESSION['user']['id'];

        $candidatures = (new Candidature())->getByEntreprise($entreprise_id);

        $this->view("entreprise/candidatures", [
            "candidatures" => $candidatures
        ]);
    }

    /* ================= DELETE OFFRE ================= */
    public function deleteOffre($id) {

        Middleware::auth('entreprise');

        (new Offre())->delete($id);

        $this->redirect("/entreprise/offres");
    }
}
