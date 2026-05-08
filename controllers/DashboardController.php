<?php
require_once "../app/core/Controller.php";
require_once "../app/models/Offre.php";
require_once "../app/models/User.php";
require_once "../app/models/Candidature.php";

class DashboardController extends Controller {

    public function admin() {

        $this->auth();

        $data['totalOffres'] = count((new Offre())->all());
        $data['totalUsers'] = count((new User())->all());
        $data['totalCandidatures'] = count((new Candidature())->all());

        $this->view("dashboard/admin", $data);
    }
}