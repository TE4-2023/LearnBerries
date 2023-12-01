<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <nav>
        <ul>
            <li><img class="bild" src="logga.png" alt="logga" /></li>
            <li>
                <h1 class="header">Skapa konto</h1>
            </li>

            <div class="left-nav">
                <li><a href="Includes/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a></li>
            </div>
        </ul>
    </nav>
    <div class="logruta">
      <form action="Includes/addcourse.php" method="post">
        <div class="txtrut">
          <span>name:</span>
          <input type="text" name="name" placeholder="name">

          <label for="color">Color:</label>
        <select id="color" name="color" onchange="changeColor(this)" required>
            <option style="background-color: white;" value="custom">custom</option>
            <option style="background-color: #B88A67;"value="#B88A67"></option>
            <option style="background-color: #B86767;"value="#B86767"></option>
            <option style="background-color: #86B867;"value="#86B867"></option>
            <option style="background-color: #679BB8;"value="#679BB8"></option>
            <option style="background-color: #B667B8;"value="#B667B8"></option>
            
        </select>

          <span>custom color:</span>
          <input type="color" name="customcolor">

        </div>
        <input class="logbtn" type="submit" value="add">
      </form>
    </div>
    
</body>
<script>
    function changeColor(selected)
    {
        selected.style.backgroundColor = selected.options[selected.selectedIndex].style.backgroundColor;
    }
</script>
</html>