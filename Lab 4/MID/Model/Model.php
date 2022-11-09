<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addCustomerToJson($data)
{
    $current_data = file_get_contents('Student_Data.json');
    $array_data = json_decode($current_data, true);
    $extra = array(
        'name'               =>     test_input($data["name"]),
        'email'              =>     test_input($data["email"]),
        'phoneNo'            =>     test_input($data["phoneNo"]),
        'password'           =>     test_input($data["password"]),
        'gender'             =>     test_input($data["gender"]),
        'dateOfBirth'        =>     test_input($data["dateOfBirth"]),
        'profilePic'         =>     'Dummy.png'
    );
    $array_data[] = $extra;
    $final_data = json_encode($array_data);
    if (file_put_contents('Student_Data.json', $final_data)) {
        return '<span class="green">Registered successfully</span>';
    } else {
        return '<span class="red">Registration failed</span>';
    }
}

function updateProfilePicToJson($pic)
{
    $current_data = file_get_contents("../Student_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["email"] == $_SESSION['email'] && $entry["password"] == $_SESSION['password']) {
            $current_data[$key]['name']          =   $current_data[$key]['name'];
            $current_data[$key]['email']         =   $current_data[$key]['email'];
            $current_data[$key]['phoneNo']       =   $current_data[$key]['phoneNo'];
            $current_data[$key]['password']      =   $current_data[$key]['password'];
            $current_data[$key]['gender']        =   $current_data[$key]['gender'];
            $current_data[$key]['dateOfBirth']   =   $current_data[$key]['dateOfBirth'];
            $current_data[$key]['profilePic']    =   $pic;

            $updated_data = json_encode($current_data);

            if (file_put_contents('../Model/Student_Data.json', $updated_data)) {
                return '<span class="green">Uploaded successfully</span>';
            } else {
                return '<span class="red">Upload failed</span>';
            }
        }
    }
}

function updateProfileInfoToJson($data)
{
    $current_data = file_get_contents("../Model/Student_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["email"] == $_SESSION['email'] && $entry["password"] == $_SESSION['password']) {
            $current_data[$key]['name']          =   test_input($data["name"]);
            $current_data[$key]['email']         =   $current_data[$key]['email'];
            $current_data[$key]['phoneNo']       =   test_input($data["phoneNo"]);
            $current_data[$key]['password']      =   $current_data[$key]['password'];
            $current_data[$key]['gender']        =   test_input($data["gender"]);
            $current_data[$key]['dateOfBirth']   =   test_input($data["dateOfBirth"]);
            $current_data[$key]['profilePic']    =   $current_data[$key]['profilePic'];

            $updated_data = json_encode($current_data);

            if (file_put_contents('../Model/Student_Data.json', $updated_data)) {
                return '<span class="green">Updated successfully</span>';
            } else {
                return '<span class="red">Update failed</span>';
            }
        }
    }
}

function updatePasswordToJson($data)
{
    $current_data = file_get_contents("../Model/Student_Data.json");
    $current_data = json_decode($current_data, true);
    foreach ($current_data as $key => $entry) {
        if ($entry["email"] == $_SESSION['email'] && $entry["password"] == $_SESSION['password']) {
            $current_data[$key]['name']          =   $current_data[$key]['name'];
            $current_data[$key]['email']         =   $current_data[$key]['email'];
            $current_data[$key]['phoneNo']       =   $current_data[$key]['phoneNo'];
            $current_data[$key]['password']      =   test_input($data["newPassword"]);
            $current_data[$key]['gender']        =   $current_data[$key]['gender'];
            $current_data[$key]['dateOfBirth']   =   $current_data[$key]['dateOfBirth'];
            $current_data[$key]['profilePic']    =   $current_data[$key]['profilePic'];

            $updated_data = json_encode($current_data);

            if (file_put_contents('../Model/Student_Data.json', $updated_data)) {
                return '<span class="green">Password changed successfully</span>';
            } else {
                return '<span class="red">Password change failed</span>';
            }
        }
    }
}


        