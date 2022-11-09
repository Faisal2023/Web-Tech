<?php

require_once '../Model/Model.php';

session_start();

$msg = $error = '';

if (isset($_POST["submit"])) {
    if (empty($_POST["currentPassword"])) {
        $error = "<label class='text-danger'>Please enter current password</label>";
    } else if ($_POST["currentPassword"] != $_SESSION["password"]) {
        $error = "Incorrect password";
    } else if (empty($_POST["newPassword"])) {
        $error = "<label class='text-danger'>New password is required</label>";
    } else if (strlen($_POST["newPassword"]) < 6) {
        $error = "*New password must not be less than six (6) characters";
    } else if (!preg_match('/[A-Z]+/', $_POST["newPassword"])) {
        $error = "*New password must contain at least one upper case letter, one lower case letter and one numeric character";
    } else if (!preg_match('/[a-z]+/', $_POST["newPassword"])) {
        $error = "*New password must contain at least one upper case letter, one lower case letter and one numeric character";
    } else if (!preg_match('/[0-9]+/', $_POST["newPassword"])) {
        $error = "*New password must contain at least one upper case letter, one lower case letter and one numeric character";
    } else if ($_SESSION["password"] == $_POST["newPassword"]) {
        $error = "Current password and new password must be different";
    } else if (empty($_POST["reNewPassword"])) {
        $error = "Retyping new password is required";
    } else if ($_POST["newPassword"] != $_POST["reNewPassword"]) {
        $error = "New password and retyped password must be same";
    } else {
        $msg = "Password successfully changed";
        if (file_exists('../Model/Student_Data.json')) {
            $msg = updatePasswordToJson($_POST);
            // $data = file_get_contents("Customer_Data.json");
            // $data = json_decode($data, true);
            // foreach ($data as $row) {
            //     if ($row["email"] == $_SESSION['email'] && $row["password"] == $_SESSION['password']) {
            //         $current_data = file_get_contents('Customer_Data.json');
            //         $array_data = json_decode($current_data, true);
            //         $extra = array(
            //             'name'               =>     $row["name"],
            //             'email'              =>     $row['email'],
            //             'phoneNo'            =>     $row["phoneNo"],
            //             'password'           =>     test_input($_POST["password"]),
            //             'gender'             =>     $row["gender"],
            //             'dateOfBirth'        =>     $row["dateOfBirth"],
            //             'profilePic'         =>     $row["profilePic"]
            //         );
            //         $array_data[] = $extra;
            //         $final_data = json_encode($array_data);
            //     }
            // }
            // if (file_put_contents('Customer_Data.json', $final_data)) {
            //     $msg = '<span class="green">Updated successfully</span>';
            // } else {
            //     $msg = '<span class="red">Update failed</span>';
            // }
        } else {
            $msg = '<span class="red">JSON file does not exit</span>';
        }
        $_SESSION['password'] = $_POST['newPassword'];
        
    }
}

// function test_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }
?>