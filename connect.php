<?php
$insertconf = false;

if (isset($_POST['name'])) {
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "register";
    $con = mysqli_connect($server, $user, $password, $dbname);

    if (!$con) {
        die('connection failed' . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $addr = $_POST['addr'];
    $phno = $_POST['phno'];
    $adhaar = $_POST['adhaar'];
    $mail = $_POST['mail'];
    $per = $_POST['per'];
    $country = $_POST['country'];

    // Using prepared statement to prevent SQL injection
    $sql_query = $con->prepare("INSERT INTO `test` (`name`, `addr`, `phno`, `adhaar`, `mail`, `per`, `country`) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $sql_query->bind_param("sssssis", $name, $addr, $phno, $adhaar, $mail, $per ,$country);

    if ($sql_query->execute() === TRUE) {
        $insertconf = true;
    } else {
        echo "Error: " . $sql_query . "<br>" . $con->error;
    }

    $sql_query->close();
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>W TRAVELS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    body {
      background: linear-gradient(135deg, #b388ff, #64b5f6);
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 20px; /* Adjust the gap between rows as needed */
    }
    .grp {
      display: flex;
      flex-direction: row;
      align-items: center;
    }
    label {
      min-width: 120px; /* Adjust label width as needed */
    }
    .formc {
      width: 200px; /* Adjust input field width as needed */
    }
    .form-title {
      text-align: center;
    }
    #success-popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      border: 1px solid black;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <i><strong>W TRAVELS</strong></i>
          </li>
          <li class="nav-item">
            <a href="index.html" class="nav-link">
              HOME <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="aboutus.html" class="nav-link">
              ABOUT US
            </a>
          </li>
          <li class="nav-item">
            <a href="contact.html" class="nav-link">
              CONTACT
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="form-title">
    <h1>REGISTRATION FORM</h1>
    <hr><br>
  </div>
  <form action="" method="post">
    <div class="grp">
      <label for="name">Name</label>
      <input type="text" class="formc" name="name" placeholder="Enter name"/>
    </div>
    <div class="grp">
      <label for="addr">Address</label>
      <input type="text" class="formc" name="addr" placeholder="Enter address"/>
    </div>
    <div class="grp">
      <label for="phno">Phone</label>
      <input type="text" class="formc" name="phno" placeholder="Enter phone number"/>
    </div>
    <div class="grp">
      <label for="adhaar">Adhaar</label>
      <input type="text" class="formc" name="adhaar" placeholder="Enter adhaar number"/>
    </div>
    <div class="grp">
      <label for="mail">Email</label>
      <input type="text" class="formc" name="mail" placeholder="Enter email"/>
    </div>
    <div class="grp">
      <label for="per">No. of person</label>
      <input type="number" class="formc" name="per" placeholder="Enter no. of person"/>
    </div>
    <div class="grp">
      <label for="country">Country</label>
      <input type="text" class="formc" name="country" placeholder="Enter country"/>
    </div>
    <div>
      <button type="submit">Submit</button>
    </div>
  </form>
  <div id="success-popup" style="display: none;">
  <p>Form submitted successfully!</p>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const successPopup = document.getElementById('success-popup');

    form.addEventListener('submit', function (event) {
      // Prevent the default form submission behavior
      event.preventDefault();
      
      // Show the success popup
      successPopup.style.display = 'block';
    });
  });
</script>

</body>
</html>


