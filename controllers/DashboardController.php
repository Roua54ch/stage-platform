<?php
require_once "../core/Controller.php";
require_once "../models/Offre.php";
require_once "../models/User.php";
require_once "../models/Candidature.php";

class DashboardController extends Controller {

    public function admin() {

        $this->auth();

        $data['totalOffres'] = count((new Offre())->all());
        $data['totalUsers'] = count((new User())->all());
        $data['totalCandidatures'] = count((new Candidature())->all());

        $this->view("dashboard/admin", $data);
    }
}