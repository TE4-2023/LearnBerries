<?php

include_once "Includes/header.php";
include 'Includes/courseview.php';

?>

    <div style="width:100%;height:50%;display:flex;justify-content:center;background-color:<?php getCourseColor(); ?>;border-bottom-left-radius:1.5vh;border-bottom-right-radius:1.5vh;align-items:center;flex-direction:column;flex-wrap:wrap;">
        <h1 style="color:white;text-decoration:none !important;"><?php getCourseName(); ?></h1><br>
        <p style="color:white;text-decoration:none !important;">Lärare A</p>
    </div>

    <div class="pane" style="width:100%;height:100%;display:flex;justify-content:center;flex-direction:column;flex-wrap:wrap;">
    </div>

    </div>
    <!-- END OF WEBSITE -->
</body>
</html>
<!-- SCRIPTS -->
   
<script src="homescript.js"></script>