<!DOCTYPE html>
<html>
<head>
    <title>Blossom Farm Volunteer Form</title>
    <style>
        body {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            font-family: sans-serif;
            background-image: linear-gradient(lightcyan,  #00cc66);
            height: auto;
        }
        h1 {
            margin-top: 20px;
        }
        #form {
            background-color: hotpink;
            padding: 20px;
            width: 70%;
            margin-bottom: 20px;
        }
        .submitted-user-details{
            background-color: hotpink;
            padding: 20px;
            width: 70%;
            margin-bottom: 20px;
        }
    </style> 
</head>
<body>
<?php
//set empty variables to be filled with user input
$name = $email = $phone = $interest = $check = "";
//empty variables for error messages
$nameErr = $emailErr = $phoneErr = $interestErr = $checkErr = "";
    
    //test user input and throw up error for undefined fields
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name required";
        } else {
            $name = ($_POST["name"]);   
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email required";
        } else {
            $email = ($_POST["email"]);   
        }
        
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone no. required";
        } else {
            $phone = ($_POST["phone"]);   
        }
        
        if (empty($_POST["interest"])) {
            $interestErr = "";
        } else {
            $interest = ($_POST["interest_list"]);   
        }
        
        if (empty($_POST["check_list"])) {
            $checkErr = "";
        } else {
            $check = ($_POST["check_list"]);   
        }
    }
        
?>
<h1>Volunteer form for Blossom Farm</h1>

<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
    <strong>(* Indicates a required field)</strong>
    <br><br>
    
    Name: <br><input type="text" name="name">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br>
    E-mail: <br><input type="email" name="email">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br>
    Contact Number: <br><input type="tel" name="phone">
    <span class="error">*<?php echo $phoneErr; ?></span>
    <br><br>
    
    <strong>Area of interest:</strong>
    <br>
    Please check the appropriate boxes to indicate your prefered area of work:
    <br>
    <input type="checkbox" name="interest_list[]" value="Growing/Gardening">Growing/Gardening<br>
    <input type="checkbox" name="interest_list[]" value="Building/Woodwork">Building/Woodwork<br>
    <input type="checkbox" name="interest_list[]" value="Catering/Kitchen">Catering/Kitchen<br>

    <br><br>
    
    <strong>Prefered days to volunteer:</strong>
    <br>
    Please check the appropriate boxes to indicate your prefered day(s) to volunteer:
    <br>
    <input type="checkbox" name="check_list[]" value="Monday">Monday<br>
    <input type="checkbox" name="check_list[]" value="Tuesday">Tuesday<br>
    <input type="checkbox" name="check_list[]"
    value="Wednesday">Wednesday<br>
    <input type="checkbox" name="check_list[]"
    value="Thursday">Thursday<br>
    <input type="checkbox" name="check_list[]" value="Friday">Friday<br>
    <input type="checkbox" name="check_list[]" value="Saturday">Saturday<br>
    <input type="checkbox" name="check_list[]" value="Sunday">Sunday<br>
    <br><br>
<input type="submit" name="submit" value="Submit">
<h2>Scroll down to check your details</h2>
</form>

<?php
//for function, pass variables of user data as parameters
//function to output user input data
function output_data($name, $email, $phone, $interest, $check) {
    if ($name == null or $email == null or $phone == null) {
        echo "<div class='submitted-user-details'>Please fill all required fields</div>";
    } else {
        echo "<div class='submitted-user-details'>
        <strong>Name: </strong><br>" . $name .
        "<br><br><strong>Email: </strong><br>" . $email .
        "<br><br><strong>Phone: </strong><br>" . $phone .
        "<br><br>";
        
        echo "<strong>Your chosen areas of Interest: </strong><br>";
            
            if ($interest == " ") {
                echo "Nothing selected";
            } else {
            foreach($_POST['interest_list'] as $interest) {
            echo $interest.'<br>';
            }}
    
        echo "<br><strong>Your availability: </strong>" . '<br>';
    
            if ($check == null) {
                echo "Nothing selected";
            } else {
            foreach($_POST['check_list'] as $check) {
            echo $check.'<br>';
            }}
        }
    }
//call function to output data
output_data($name, $email, $phone, $interest, $check);
?>
</body>
</html>