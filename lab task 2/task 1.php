<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Form Validation</title>

</head>

<body>
  <?php
  $name = $email = $dob = $gender = $degree = $bloodGroup = "";
  $nameError = $emailError = $dobError = $genderError = $degreeError = $bloodGroupError = "";

  //$range = date('Y', strtotime($dob));

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameError = "Cannot be empty";
    } else {
      $name = $_POST["name"];
      if (!preg_match("/^[a-zA-Z- ]+$/", $name)) {
        $nameError = "Only letters, dash and periods are allowed";
      } elseif (!preg_match("/(\w+\s\w+)/", $name)) {
        $nameError = "Must be two words long";
      } else {
        if (!preg_match("/^[\pL]/", $name)) {
          $nameError = "Must start with a letter";
        }
      }
    }

    if (empty($_POST["email"])) {
      $emailError = "Cannot be empty";
    } else {
      $email = $_POST["email"];
      if (!preg_match("/(\w+)@(\w+){3,}.com/", $email)) {
        $emailError = "Is not valid";
      }
    }

    if (empty($_POST["dob"])) {
      $dobError = "Cannot be empty";
    } else {
      $dob = $_POST["dob"];
      if ($_POST["dob"] >= strtotime("1953") && $_POST["dob"] <= strtotime("1998")) {
        $dob = $_POST["dob"];
      } else {
        $dobError = "Out of range";
      }
    }

    if (empty($_POST["gender"])) {
      $genderError = "Gender is required";
    } else {
      $gender = $_POST["gender"];
    }

    if (isset($_POST["submit"])) {
      if (!empty($_POST["degree"])) {
        foreach ($_POST["degree"] as $checked) {
          $degree = $_POST["degree"];
        }
      } else {
        $degreeError = "Cannot be empty";
      }
    }

    if (empty($_POST["bloodGroup"])) {
      $bloodGroupError = "";
    } else {
      $bloodGroup = $_POST["bloodGroup"];
    }
  }
  ?>



  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div>
      <span>Name</span><br><br>
      <input type="text" name="name" value="<?php echo $name ?>"><br>
      <span><?php echo $nameError ?></span>
    </div>
    <div>
      <Span>Email</Span><br><br>
      <input type="text" name="email" value="<?php echo $email ?>"><br>
      <span><?php echo $emailError ?></span>
    </div>
    <div>
      <span>Date of Birth</span><br><br>
      <input type="date" name="dob" value="<?php echo $dob ?>"><br>
      <span><?php echo $dobError ?></span>
    </div>
    <div>
      <Span>Gender</Span><br><br>
      <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>>Male
      <input type="radio" name="gender" value="female" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>>Female
      <input type="radio" name="gender" value="other" <?php if (isset($gender) && $gender == "other") echo "checked"; ?>>Other
      <br>
      <span><?php echo $genderError ?></span>
    </div>
    <div>
      <Span>Degree</Span><br><br>
      <input type="checkbox" name="degree[]" value="ssc">SSC
      <input type="checkbox" name="degree[]" value="hsc">HSC
      <input type="checkbox" name="degree[]" value="bsc">BSc
      <input type="checkbox" name="degree[]" value="msc">MSc
      <br>
      <span><?php echo $degreeError ?></span>
    </div>
    <div>
      <span>Blood Group</span><br><br>
      <select name="list" onchange="combo(this, bloodGroup)">
        <option>A+</option>
        <option>B+</option>
        <option>AB+</option>
        <option>O+</option>
      </select>
    </div>
    <div>
      <input type="submit" name="submit">
    </div>
  </form>

  <br><br>
  <div>
    <?php
    echo "Name: ", $name;
    echo "<br>";
    echo "Email: ", $email;
    echo "<br>";
    echo "Date of Birth: ", $dob;
    echo "<br>";
    echo "Gender: ", $gender;
    echo "<br>";
    echo "Degree: ", $degree;
    echo "<br>";
    echo "Blood Group: ", $bloodGroup;
    ?>
  </div>
</body>

</html>