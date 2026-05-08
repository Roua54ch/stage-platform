<?php

require_once "../models/User.php";
require_once "../core/Controller.php";
require_once "../helpers/Validator.php";
require_once "../helpers/Flash.php";

class AuthController extends Controller {

    /* ================= LOGIN ================= */
    /**
     * Login page + login submission.
     *
     * On POST: validates credentials, sets `$_SESSION['user']`, then redirects by role.
     * On GET: renders the login form.
     */
    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $errors = Validator::validateLogin($_POST);

            if (empty($errors)) {

                $user = (new User())->findByEmail($_POST['email']);

                if ($user && password_verify($_POST['password'], $user['password'])) {

                    // 🔐 regenerate session (security)
                    session_regenerate_id(true);

                    $_SESSION['user'] = [
                        "id" => $user['id'],
                        "name" => $user['name'],
                        "email" => $user['email'],
                        "role" => $user['role']
                    ];

                    // 🎯 redirect حسب role
                    switch ($user['role']) {
                        case 'admin':
                            $this->redirect("/admin/dashboard");
                            break;

                        case 'entreprise':
                            $this->redirect("/entreprise/dashboard");
                            break;

                        case 'etudiant':
                            $this->redirect("/offre/index");
                            break;

                        default:
                            $this->redirect("/auth/login");
                    }

                    return;

                } else {
                    $errors['general'] = "Email ou mot de passe incorrect";
                }
            }

            return $this->view("auth/login", ["errors" => $errors]);
        }

        $this->view("auth/login");
    }

    /* ================= REGISTER ================= */
    /**
     * Registration page + registration submission.
     *
     * On POST: validates inputs, prevents duplicate emails, inserts the user, then redirects to login.
     * On GET: renders the registration form.
     */
    public function register() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $errors = Validator::validateRegister($_POST);

            // 🔥 check email déjà existant
            $existingUser = (new User())->findByEmail($_POST['email']);
            if ($existingUser) {
                $errors['email'] = "Email already exists";
            }

            if (empty($errors)) {

                (new User())->insert([
                    "name" => htmlspecialchars($_POST['name']),
                    "email" => htmlspecialchars($_POST['email']),
                    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    "role" => $_POST['role']
                ]);

                Flash::set("success", "Account created successfully 🎉");
                return $this->redirect("/auth/login");
            }

            return $this->view("auth/register", ["errors" => $errors]);
        }

        $this->view("auth/register");
    }

    /* ================= LOGOUT ================= */
    /**
     * Logout: clears and destroys the session, then redirects to login.
     */
    public function logout() {

        session_start();

        // 🔐 destroy session safely
        $_SESSION = [];
        session_destroy();

        session_regenerate_id(true);

        $this->redirect("/auth/login");
    }
}