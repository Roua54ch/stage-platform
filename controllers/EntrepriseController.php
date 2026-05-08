<?php

require_once "../core/Controller.php";
require_once "../core/Middleware.php";

require_once "../models/Candidature.php";
require_once "../models/Offre.php";
require_once "../models/Notification.php";

class EntrepriseController extends Controller {

    /* ================= DASHBOARD ================= */
    /**
     * Enterprise dashboard (counts offers and received candidatures).
     *
     * Requires `entreprise` role.
     */
    public function dashboard() {

        Middleware::auth('entreprise');

        $entreprise_id = $_SESSION['user']['id'];

        $offreModel = new Offre();
        $candidatureModel = new Candidature();

        $data = [
            "totalOffres" => $offreModel->countByEntreprise($entreprise_id),
            "totalCandidatures" => $candidatureModel->countByEntreprise($entreprise_id)
        ];

        $this->view("dashboard/entreprise", $data);
    }

    /* ================= LISTE OFFRES ================= */
    /**
     * List offers created by the current enterprise user.
     *
     * Requires `entreprise` role.
     */
    public function offres() {

        Middleware::auth('entreprise');

        $entreprise_id = $_SESSION['user']['id'];

        $offres = (new Offre())->getByEntreprise($entreprise_id);

        $this->view("entreprise/offres", [
            "offres" => $offres
        ]);
    }

    /* ================= CREATE OFFRE ================= */
    /**
     * Create a new offer as the current enterprise user.
     *
     * Requires `entreprise` role.
     */
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
    /**
     * List candidatures received for the enterprise's offers.
     *
     * Requires `entreprise` role.
     */
    public function candidatures() {

        Middleware::auth('entreprise');

        $entreprise_id = $_SESSION['user']['id'];

        $candidatures = (new Candidature())->getByEntreprise($entreprise_id);

        $this->view("entreprise/candidatures", [
            "candidatures" => $candidatures
        ]);
    }

    /* ================= DELETE OFFRE ================= */
    /**
     * Delete an offer owned by the enterprise.
     *
     * Requires `entreprise` role.
     *
     * @param mixed $id Offer id
     */
    public function deleteOffre($id) {

        Middleware::auth('entreprise');

        (new Offre())->delete($id);

        $this->redirect("/entreprise/offres");
    }
}
