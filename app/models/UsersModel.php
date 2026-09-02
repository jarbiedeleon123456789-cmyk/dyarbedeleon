<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * UsersModel (Part E)
 *
 * Represents the "users" table created in Part B.
 * Save this file as: app/models/UsersModel.php
 */
class UsersModel extends Model
{
    /**
     * Table Name of the Database
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Primary Key of the Database Column
     *
     * @var string
     */
    protected $primary_key = 'id';

    /**
     * Fillable attributes for Mass Assignment
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'username'];
}
?>
