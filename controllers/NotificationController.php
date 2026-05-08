<?php

require_once "../models/Notification.php";

class NotificationController extends Controller {

    /**
     * Return recent notifications and unread count as JSON.
     *
     * Intended for polling from the dashboard UI.
     */
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

    /**
     * Mark all notifications as read for the current user (JSON response).
     */
    public function readAll() {

        $user_id = $_SESSION['user']['id'];

        (new Notification())->markAllRead($user_id);

        echo json_encode(["success" => true]);
    }
}