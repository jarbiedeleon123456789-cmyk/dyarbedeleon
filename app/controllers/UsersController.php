<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * UsersController (Part F & G)
 *
 * Retrieves all rows from the "users" table via UsersModel and
 * passes them to the "users" view.
 * Save this file as: app/controllers/UsersController.php
 */
class UsersController extends Controller
{
    /**
     * Show all users.
     * Reached via the /users route (see routes.php).
     *
     * @return void
     */
    public function index()
    {
        $this->call->database();

        // 1. Load UsersModel
        $this->call->model('UsersModel');

        // 2 & 3. Execute all() and store the returned records
        $users = $this->UsersModel->all();

        // 4 & 5. Pass the records to the view and load it
        $this->call->view('users', ['users' => $users]);
    }
}
?>
