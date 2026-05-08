<?php

require_once "../models/Stats.php";
require_once "../core/Controller.php";
require_once "../core/Middleware.php";

class AdminController extends Controller {

    /**
     * Admin dashboard with platform totals.
     *
     * Requires `admin` role.
     */
    public function dashboard() {

        Middleware::auth('admin');

        $stats = new Stats();

        $this->view("dashboard/admin", [
            "totalUsers" => $stats->users(),
            "totalOffres" => $stats->offres(),
            "totalCandidatures" => $stats->candidatures()
        ]);
    }
}