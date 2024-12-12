<?php include('db_config.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../css/aboutus.css">
    
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"
  />
  <link href="https://db.onlinewebfonts.com/c/83e4a6b639612cd501853be5a7cf97ab?family=Trend+Sans+One+Regular" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/proxima-nova-condensed" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/dm-sans" rel="stylesheet">
</head>

<body>

    <nav class="navbar">

        <div class="nav-logo">
            <img src="../images/longlogo.png" alt="Org Connect Logo">
        </div>
            
        <div class="nav-links">
  
            <button class="icon-btn home-icon">
                <i class="fa-solid fa-house" style="color: #ffffff;"></i>
            </button>
            <button class="icon-btn user-icon">
                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
            </button>
            <button class="icon-btn follow-icon">
                <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
            </button>
            <button class="icon-btn notif-icon">
                <i class="fa-solid fa-bell" style="color: #ffffff;"></i>
            </button>

            <input type="checkbox" class="icon-btn darkmode-toggle"  id="darkmode-toggle">
            <label for="darkmode-toggle">
                <img src="../images/earth-15-svgrepo-com.svg" class="sun" alt="SVG Icon">
                <img src="../images/earth-15-svgrepo-com.svg" class="moon" alt="SVG Icon">
            </label>

            <button class="icon-btn logout-icon">
                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
            </button>
        </div>
    </nav>
    
    <div class="sidebar">
    <a class="a" href="aboutus.html">About Us</a>
    <a class="a restricted" href="officers.html">Officers</a>
    <a class="a restricted" href="committee.html">Comittee</a>
    <a class="a restricted" href="handledevents.html">Handled Events</a>
    <a class="a restricted" href="announcements.html">Announcements</a>
    </div>

    <!-- Modal -->
<div id="restrictionModal" class="modal">
    <div class="modal-content">
        <h2>SIGN IN REQUIRED</h2>
        <p>Sign in to view full access to OrgConnect.</p>
        <button id="modalCloseBtn" class="close-btn">Close</button>
    </div>
</div>

<!-- Modal -->

     <div class="container">
      <!---->
        <div class="card-container">
              <div class="header">
              <div class="logo">
                  <img src="../images/orgs.png" alt="SDLO Logo">
              </div>
              <div class="header-text">
                  <h1>STUDENT DEVELOPMENT AND LEADERSHIP ORGANIZATION</h1>
                  <h2>( S D L O )</h2>

              </div>
          </div>
          
          <div class="card">

              <div class="description">
                <h3>ORG DESCRIPTION</h3>
                <p>
                    The Student Development and Leadership Organization (SDLO) is a dynamic and inclusive 
                    student-driven group dedicated to empowering individuals through the development of 
                    leadership skills, personal growth, and active community involvement. SDLO offers a 
                    supportive environment for students to explore and enhance their leadership potential, 
                    providing numerous opportunities for engagement in extracurricular activities, 
                    workshops, and projects that foster both professional and personal growth.
                </p>
                <p>
                    By encouraging participation in a wide range of events, the organization helps students 
                    cultivate critical thinking, teamwork, and communication skills while also promoting a 
                    strong sense of social responsibility. Through collaboration, networking, and hands-on 
                    initiatives, SDLO serves as a platform for students to actively shape the future, 
                    advocate for positive change, and become proactive leaders who drive social and 
                    community-oriented initiatives both on and off-campus.
                </p>
            </div>
            </div>
            <!---->
            <div class="contactus">
                <h1>CONTACT US</h1>
                <p>VIA EMAIL</p>
                <h3>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    sldo@university.edu
                </h3>
                <p>VIA FACEBOOK</p>
                <h3>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    www.facebook.com/SLDO.University
                </h3>
                <h1>or<br> 
                    Visit Us at the Office</h1>
                    <p>SLDO - Student Leadership and Development Office</p>
                    <H3>Building A, Room 102</H3>
                    <H3>Monday - Friday, 9 AM - 5 PM</H3>
            </div>
            <!---->
          </div>
          </div>          
</body>

<script src="../js/aboutus.js"></script>
</html>