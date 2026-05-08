<?php

require_once "../models/Notification.php";

class NotificationController extends Controller {

    public function index() {

        $user_id = $_SESSION['user']['id'];

        $notifModel = new Notification();

        $notifications = $notifModel->getByUser($user_id);
        $count = $notifModel->countUnread($user_id);

        echo json_encode([
            "notifications" => $notifications,
            "count" => $count
        ]);
    }

    public function readAll() {

        $user_id = $_SESSION['user']['id'];

        (new Notification())->markAllRead($user_id);

        echo json_encode(["success" => true]);
    }
}