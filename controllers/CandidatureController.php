<?php

require_once "../models/Candidature.php";
require_once "../models/Notification.php";

class CandidatureController extends Controller {

    /* ================= POSTULER ================= */
    /**
     * Submit a candidature for a given offer.
     *
     * Requirements/constraints:
     * - Must be logged in as `etudiant`
     * - Upload must be a PDF
     * - CV is stored under `storage/cv/` and only the filename is stored in DB
     *
     * @param mixed $offre_id Offer id
     */
    public function postuler($offre_id) {

        Middleware::auth('etudiant');

        $user_id = $_SESSION['user']['id'];

        // upload CV
        $cv = $_FILES['cv'];

        if ($cv['type'] !== 'application/pdf') {
            die("PDF only");
        }

        $filename = uniqid() . ".pdf";
        move_uploaded_file($cv['tmp_name'], "../storage/cv/" . $filename);

        // insert candidature
        (new Candidature())->create([
            "user_id" => $user_id,
            "offre_id" => $offre_id,
            "cv" => $filename,
            "status" => "pending"
        ]);

        // 🔔 notification entreprise
        $entreprise_id = (new Candidature())->getEntrepriseByOffre($offre_id);

        (new Notification())->create(
            $entreprise_id,
            "New candidature received 🎯"
        );

        $this->redirect("/offre/index");
    }

    /* ================= UPDATE STATUS ================= */
    /**
     * Enterprise updates candidature status (e.g. accepted/refused/pending).
     * Also creates a notification for the student.
     *
     * @param mixed $id Candidature id
     * @param mixed $status New status value
     */
    public function updateStatus($id, $status) {

        Middleware::auth('entreprise');

        (new Candidature())->updateStatus($id, $status);

        // 🔔 notif étudiant
        $user_id = (new Candidature())->getUserByCandidature($id);

        (new Notification())->create(
            $user_id,
            "Your candidature is $status"
        );

        $this->redirect("/entreprise/candidatures");
    }
}