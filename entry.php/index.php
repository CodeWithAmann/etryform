<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <label for="01">Enter Name :</label>
            <input type="text" name="name" id="01" placeholder="Enter Name">
            <p></p>

            <label for="2">Enter Gmail :</label>
            <input type="email" name="email" id="2" placeholder="Enter Gmail">
            <p></p>

            <label for="6">Enter Age :</label>
            <input type="text" name="age" id="6" placeholder="Enter Age">
            <p></p>

            <label for="3">Phone No :</label>
            <input type="text" name="phone" id="3" placeholder="Enter Your Phone No">
            <p></p>

            <label for="city">Select Place :</label>
            <select name="place" id="city">
                <option value="">Select place</option>
                <option value="Sasaram">Sasaram</option>
                <option value="Aurangabad">Aurangabad</option>
                <option value="Banka">Banka</option>
                <option value="Rohtas">Rohtas</option>
                <option value="Bengusarai">Bengusarai</option>
                <option value="Buxar">Buxar</option>
                <option value="Darbhanga">Darbhanga</option>
                <option value="Gaya">Gaya</option>
                <option value="Kaimur">Kaimur</option>
                <option value="Madhubani">Madhubani</option>
                <option value="Nalanda">Nalanda</option>
                <option value="Patna">Patna</option>
                <option value="Purnia">Purnia</option>
                <option value="Bengusarai">Bengusarai</option>
                <option value="Arwal">Arwal</option>
                <option value="Dehri">Dehri</option>
                <option value="OTHER">OTHER</option>
            </select>
            <p></p>

            <input type="reset" value="Reset Form">
            <input type="submit" name="submit" value="Submit Form">

        </form>
    </center>

    
    <script src="logic.js"> </script>

<?php
if(isset($_POST["submit"])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "firstdb";  // Replace with your actual database name

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    mysqli_select_db($con, $database);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $place = mysqli_real_escape_string($con, $_POST['place']);

    $sql = "INSERT INTO firsttb (name, age, email, phone, place) 
            VALUES ('$name', '$age', '$email', '$phone', '$place')";

    if(mysqli_query($con, $sql)) {
        echo "Successfully inserted data.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
</body>
</html>
