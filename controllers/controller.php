<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 21-Jul-17
 * Time: 10:53 PM
 */

include('../db_config/paths.php');

$_data_handler = new DataHandler();

if(isset($_POST['case']) AND !empty($_POST['case'])) {
    switch ($_POST['case']) {

        case 'loginData':

            $user   = $_POST['user'];
            $pass   = $_POST['pass'];

            $r      = $_data_handler->login($user, $pass);

            if($r)
            {
                $_SESSION['user'] = $user;
                $redirect         = PAGES_PATH . "add_contact_form.php";
                echo json_encode($redirect);
            }

            else echo json_encode(0);

            break;

        case 'contactInfo':

            $name     = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email    = $_POST['email'];
            $phone    = $_POST['phone'];

            $r = $_data_handler->insertContact($name, $lastname, $email, $phone);

            if($r) echo json_encode(1);

            else echo json_encode(0);

            break;

        case 'searchContacts':

            $searchParam = $_POST['parameter'];

            $r = $_data_handler->searchContacts($searchParam);

            echo json_encode($r);

            break;

        case 'deleteContact':

            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $phone = $_POST['phone'];

            $r = $_data_handler->deleteContact($name, $lastname, $phone);

            if($r) echo json_encode(1);
            else echo json_encode(0);

            break;
    }

}

