<?php
$result = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    if ($weight > 0 && $height > 0) {
        $bmi = $weight / ($height * $height);

        if ($bmi < 18.5) {
            $interpretation = "Underweight";
        } elseif ($bmi < 25) {
            $interpretation = "Normal weight";
        } elseif ($bmi < 30) {
            $interpretation = "Overweight";
        } else {
            $interpretation = "Obesity";
        }

        $result = "Hello, $name. Your BMI is " . number_format($bmi, 2) . " ($interpretation).";
    } else {
        $result = "Invalid input values.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
    <script src="script.js" defer></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #e9ebec;
  }
  
  h1 {
    color: #1e88fa;
  }
  
  label {
    display: inline-block;
    width: 120px;
    margin-bottom: 30px;
  }
  
  input[type="text"],
input[type="number"] {
  width: 900px;  
  padding: 10px;  
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-bottom: 10px;
}
input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    background-color: #1873fa;
    color: white;
    border: none;
    cursor: pointer;
  }
  
    </style>
    
</head>
<body>
    <h1>BMI Calculator</h1>

    <?php if (!empty($result)) : ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>

    <form action="" method="post" onsubmit="return validateForm();">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" required><br>

        <label for="height">Height (Cm):</label>
        <input type="number" id="height" name="height" required><br>

        <input type="submit" value="Calculate">
    </form>
</body>
</html>
