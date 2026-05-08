<?php

require_once "../models/Stats.php";

class AdminController extends Controller {

    public function dashboard() {

        Middleware::auth('admin');

        $stats = new Stats();

        $this->view("admin/dashboard", [
            "totalUsers" => $stats->users(),
            "totalOffres" => $stats->offres(),
            "totalCandidatures" => $stats->candidatures()
        ]);
    }
}