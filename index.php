<!DOCTYPE html>
<html lang="se"> <!-- Change to "en" when translated -->
<head>
    <!-- WEBSITE INFORMATION -->
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-Sentials</title>

    <!-- STYLES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed&family=Roboto+Slab:wght@400;600&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

    
</head>

<!--

    OBSERVE:
    Website will NOT have functionality except basic button clicking that redirects the user to new pages.
    This website is also made in swedish but translation to english would not be too hard to implement.

-->

<!--
    Needed features:
    Add a searhcbar in the topnav as well as quickactions such as viewing the next lesson,
    lunch, nearest beak, etc.

    For teachers add a attendance button that is extremely accessible!
-->


<body>
    <div class="head">
        <button onclick="toggleSidenavbar()" style="margin-left: 1%;"><ion-icon name="reorder-four" ></ion-icon></button>
    </div>

    <!-- Will contains links to useful pages making it easier to navigate compared to other websites -->
    <div class="sidenav" id="sidenavbar">
        <button onclick="toggleSidenavbar()" id="sidenavtoggle" style="margin-right: 1%; float: right;"><ion-icon name="close"></ion-icon></button>
        <h1>Hello, Firstname Lastname!</h1>
        <span>Attendance rate: </span><span style="color:green">46% (increased)</span><br>
        <span>Next lesson: </span><span style="color:red">CH3 in 14 minutes</span><br>
        <span>Lunch: </span><span style="color:green">Fish</span><span style="color: rgb(122, 122, 122)"> (Alt: Pasta)</span>



        <a href="index.html"><button class="sidenav-button"><ion-icon name="home" class="sidenav-icon"></ion-icon>Home</button></a>
        <a href="schedule/index.html"><button class="sidenav-button"><ion-icon name="calendar" class="sidenav-icon"></ion-icon>Schedule</button></a>
        <a href="grades/index.html"><button class="sidenav-button"><ion-icon name="pie-chart" class="sidenav-icon"></ion-icon>Grades</button></a>
        <a href="assignments/index.html"><button class="sidenav-button"><ion-icon name="document-text" class="sidenav-icon"></ion-icon>Assingment</button></a>
        <button class="sidenav-button" onclick="theme_toggle()"><ion-icon name="sunny" class="sidenav-icon"></ion-icon>Change theme</button>
    </div>

    <!-- Contains content for the landing page -->
    <div class="content">

        <!-- This div should be split up into a grid to allow more information on screen without scrolling -->
        <div class="container">
            <div class="sub-container-column">
                <div class="sub-container">
                    <div><h1>Schedule</h1></div>
                    <div>
                        <h1>Chemistry (CH3)</h1>
                        <p>20:23 - 21:00 (Foo FooBar)</p>
                        <p>TE4 In Azeroth</p>
                    </div>
                </div>
                <div class="sub-container">
                    <div><h1>Attendance</h1></div>
                    <div>
                        <h1>This Week</h1>
                        <p style="color:green">91% Attendance rate</p>
                        <span style="color: rgb(122, 122, 122)">5% Non reported -</span><span style="color:red;"> 4% Reported</span> 
                    </div>
                    <div>
                        <h1>This month</h1>
                        <p style="color:green">45% Attendance rate</p>
                        <span style="color: rgb(122, 122, 122)">20% Non reported -</span><span style="color:red;"> 35% Reported</span> 
                    </div>
                </div>
            </div>
            <div class="sub-container-column">
                <div class="sub-container">
                    <div><h1>Lunch</h1></div>
                    <div>
                        <h1>Mon</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                    <div>
                        <h1>Tue</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                    <div>
                        <h1>Wen</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                </div>
                <div class="sub-container">
                    <div><h1>Nyheter</h1></div>
                    <div>
                        <h1>Cykelstöld</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                    <div>
                        <h1>Nya stolar i matsalen</h1>
                        <p>Dolor Sit Amet</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="foot">
            <a href="#">Legal</a>
            <a href="#">Projects</a>
            <a href="#">Items</a>
            <a href="#">Contact</a>
        </div>

        <!-- END OF CONTENT -->
    </div>
    <!-- Contains content for the landing page -->
    <div class="content">

        <!-- This div should be split up into a grid to allow more information on screen without scrolling -->
        <div class="container">
            <div class="sub-container-column">
                <h1>ssentials</h1>
                <div class="sub-container">
                    <div><h1>Schedule</h1></div>
                    <div>
                        <h1>Chemistry (CH3)</h1>
                        <p>20:23 - 21:00 (Foo FooBar)</p>
                        <p>TE4 In Azeroth</p>
                    </div>
                </div>
                <div class="sub-container">
                    <div><h1>Attendance</h1></div>
                    <div>
                        <h1>This Week</h1>
                        <p style="color:green">91% Attendance rate</p>
                        <span style="color: rgb(122, 122, 122)">5% Non reported -</span><span style="color:red;"> 4% Reported</span> 
                    </div>
                    <div>
                        <h1>This month</h1>
                        <p style="color:green">45% Attendance rate</p>
                        <span style="color: rgb(122, 122, 122)">20% Non reported -</span><span style="color:red;"> 35% Reported</span> 
                    </div>
                </div>
            </div>
            <div class="sub-container-column">
                <div class="sub-container">
                    <div><h1>Lunch</h1></div>
                    <div>
                        <h1>Mon</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                    <div>
                        <h1>Tue</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                    <div>
                        <h1>Wen</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                </div>
                <div class="sub-container">
                    <div><h1>Nyheter</h1></div>
                    <div>
                        <h1>Cykelstöld</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                    <div>
                        <h1>Nya stolar i matsalen</h1>
                        <p>Dolor Sit Amet</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="foot">
            <a href="#">Legal</a>
            <a href="#">Projects</a>
            <a href="#">Items</a>
            <a href="#">Contact</a>
        </div>

        <!-- END OF CONTENT -->
    </div>
    <!-- Contains content for the landing page -->
    <div class="content">

        <!-- This div should be split up into a grid to allow more information on screen without scrolling -->
        <div class="container">
            <div class="sub-container-column">
                <h1>ssentials</h1>
                <div class="sub-container">
                    <div><h1>Schedule</h1></div>
                    <div>
                        <h1>Chemistry (CH3)</h1>
                        <p>20:23 - 21:00 (Foo FooBar)</p>
                        <p>TE4 In Azeroth</p>
                    </div>
                </div>
                <div class="sub-container">
                    <div><h1>Attendance</h1></div>
                    <div>
                        <h1>This Week</h1>
                        <p style="color:green">91% Attendance rate</p>
                        <span style="color: rgb(122, 122, 122)">5% Non reported -</span><span style="color:red;"> 4% Reported</span> 
                    </div>
                    <div>
                        <h1>This month</h1>
                        <p style="color:green">45% Attendance rate</p>
                        <span style="color: rgb(122, 122, 122)">20% Non reported -</span><span style="color:red;"> 35% Reported</span> 
                    </div>
                </div>
            </div>
            <div class="sub-container-column">
                <div class="sub-container">
                    <div><h1>Lunch</h1></div>
                    <div>
                        <h1>Mon</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                    <div>
                        <h1>Tue</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                    <div>
                        <h1>Wen</h1>
                        <p>Green fish with salt</p>
                        <p>Alternatively catfood</p>
                    </div>
                </div>
                <div class="sub-container">
                    <div><h1>Nyheter</h1></div>
                    <div>
                        <h1>Cykelstöld</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                    <div>
                        <h1>Nya stolar i matsalen</h1>
                        <p>Dolor Sit Amet</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="foot">
            <a href="#">Legal</a>
            <a href="#">Projects</a>
            <a href="#">Items</a>
            <a href="#">Contact</a>
        </div>

        <!-- END OF CONTENT -->
    </div>
    
    <div class="foot">
        <a href="#">Legal</a>
        <a href="#">Projects</a>
        <a href="#">Items</a>
        <a href="#">Contact</a>
    </div>
    <!-- END OF WEBSITE -->
</body>
</html>
<!-- SCRIPTS -->
   
<script src="scripts/script.js"></script>