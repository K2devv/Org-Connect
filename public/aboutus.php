<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgconnect";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the org_id from the URL
if (isset($_GET['org_id']) && is_numeric($_GET['org_id'])) {
    $org_id = intval($_GET['org_id']); // Sanitize input

    // Fetch organization details
    $stmt = $conn->prepare("SELECT * FROM organization WHERE org_id = ?");
    $stmt->bind_param("i", $org_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $org = $result->fetch_assoc(); // Fetch the organization data
    } else {
        echo "<h1>Organization not found.</h1>";
        exit;
    }
} else {
    echo "<h1>Invalid organization ID.</h1>";
    exit;
}
?>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        
                <div class="notification-container">
                <button class="icon-btn notif-icon" id="notif-btn">
                    <i class="fa-solid fa-bell" style="color: #ffffff;"></i>
                </button>
                <div class="notification-popup" id="notif-popup">
                    <div class="popup-header">
                        <h3>NOTIFICATIONS</h3>
                    </div>
                    <div class="popup-content">
        
                        <div class="notif-item" onclick="window.location.href='aboutusV2.html'">
                            <span class="date">NOV 11</span>
                            <span class="event">Tech Innovators Conference 2024</span>
                            <div class="gradient-line"></div>
                        </div>
                        <div class="notif-item">
                            <span class="date">NOV 12</span>
                            <span class="event">Sustainability Workshop for Students</span>
                            <div class="gradient-line"></div>
                        </div>
                        <div class="notif-item">
                            <span class="date">NOV 13</span>
                            <span class="event">Leadership Development Forum</span>
                            <div class="gradient-line"></div>
                        </div>
        
                        <div class="notif-item">
                          <span class="date">NOV 14</span>
                          <span class="event">Leadership Development Forum</span>
                          <div class="gradient-line"></div>
                        </div>
        
                      <div class="notif-item">
                        <span class="date">NOV 15</span>
                        <span class="event">Leadership Development Forum</span>
                        <div class="gradient-line"></div>
                      </div>
        
                    </div>
                </div>
            </div>
    
            <input type="checkbox" class="icon-btn darkmode-toggle"  id="darkmode-toggle">
            <label for="darkmode-toggle" class="darkmode-label">
            </label>
    
            <button class="icon-btn logout-icon" onclick="logout()">
                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
            </button>
        </div>
    </nav>
    
    <div class="sidebar">
    <a class="a" href="aboutusV2.html">About Us</a>
    <a class="a restricted" href="officers.html">Officers</a>
    <a class="a restricted" href="committee.html">Comittee</a>
    <a class="a restricted" href="handledevents.html">Handled Events</a>
    <a class="a restricted" href="announcements.html">Announcements</a>
    </div>

    <!-- Modal -->

<div class="overlay" id="restrictionModal">
    <div class="guestlock-container">
    <div class="guestlock-icon">
        <img src="../images/guestlock.png" alt="Lock Icon">
    </div>
    <div class="guestlock-content">
        <h1>SIGN IN REQUIRED</h1>
        <p>Sign in to view full access to OrgConnect. Where you can explore detailed content, connect with organizations, and discover events on your campus.</p>
        <button id="modalCloseBtn" class="btn">LOG IN</button>
    </div>
    </div>
</div>

     <div class="container">
      <!---->
        <div class="card-container">
              <div class="header">
              <div class="logo">
              <img src="../images/orgs.png">
              </div>
              <div class="header-text">
                <h1><?php echo htmlspecialchars($org['org_name']); ?></h1>
                <h2>(<?php echo htmlspecialchars($org['org_acronym']); ?>)</h2>
                  
              </div>

              <div class="checkbox-div">
                <input type="checkbox" class="checkbox-input" id="org1">
                <label for="org1" class="checkbox-label">
                    <i class="fa fa-heart fa-1x" id="heart" aria-hidden="true" data-unchecked></i>
                    <i class="fa fa-check-circle fa-1x" id="check" aria-hidden="true" data-checked></i>
                </label>
              </div>

          </div>
          
          <div class="card">

              <div class="description">
                <h3>ORG DESCRIPTION</h3>
                <p id="text-content">
                <?php echo nl2br(htmlspecialchars($org['long_description'])); ?>
                </p>
                
            </div>
            </div>
            <!---->
            <div class="contactus">
                <h1 id="text-content" class="contact">CONTACT US</h1>
                <p id="text-content">VIA EMAIL</p>
                <h3 id="text-content">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <?php echo htmlspecialchars($org['org_email']); ?>
                </h3>
                <p id="text-content">VIA FACEBOOK</p>
                <h3 id="text-content">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <?php echo htmlspecialchars($org['org_email']); ?>
                </h3>
                <h1 id="text-content" class="visit">or<br> 
                    Visit Us at the Office</h1>
                    <p id="text-content"><?php echo htmlspecialchars($org['org_email']); ?></p>
                    <H3 id="text-content">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo htmlspecialchars($org['org_email']); ?></H3>
                    <H3 id="text-content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <?php echo htmlspecialchars($org['org_email']); ?></H3>
                    <p id="text-content">We'd love to help you get involved and take your leadership skills to the next level! </p>
            </div>
            <!---->
          </div>
          </div>          
</body>

<script src="../js/aboutus.js"></script>
</html>
