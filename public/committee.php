<?php
// Database connection settings
$host = "localhost";
$username = "root"; // Adjust this as per your MySQL credentials
$password = ""; // Adjust this as per your MySQL credentials
$dbname = "orgconnect"; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch committee data from the database
$sql = "SELECT * FROM org_commitee WHERE org_id = 1"; // Adjust the table name and query as per your database
$result = $conn->query($sql);

// Initialize variables for dynamic content
$committeeName = "Committee Name Not Found";
$committeeDescription = "Committee Description Not Found";

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $committeeName = $row['commitee_name']; // Replace with the column name for committee name
    $committeeDescription = $row['comm_longDesc']; // Replace with the column name for description
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../css/committee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
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
                      <i class="fa fa-calendar"></i>
                        <h3>WEEKLY EVENTS</h3>
                    </div>
                    <div class="popup-content">
        
                        <div class="notif-item" onclick="window.location.href='aboutusV2.html'">
                            <span class="date">NOV 11</span>
                            <span class="event">Tech Innovators Conference 2024</span>
                            <div class="gradient-linenav"></div>
                        </div>
                        <div class="notif-item">
                            <span class="date">NOV 12</span>
                            <span class="event">Sustainability Workshop for Students</span>
                            <div class="gradient-linenav"></div>
                        </div>
                        <div class="notif-item">
                            <span class="date">NOV 13</span>
                            <span class="event">Leadership Development Forum</span>
                            <div class="gradient-linenav"></div>
                        </div>
        
                        <div class="notif-item">
                          <span class="date">NOV 14</span>
                          <span class="event">Leadership Development Forum</span>
                          <div class="gradient-linenav"></div>
                        </div>
        
                      <div class="notif-item">
                        <span class="date">NOV 15</span>
                        <span class="event">Leadership Development Forum</span>
                        <div class="gradient-linenav"></div>
                      </div>
        
                    </div>
                </div>
            </div>
    
            <input type="checkbox" class="icon-btn darkmode-toggle"  id="darkmode-toggle">
            <label for="darkmode-toggle" class="darkmode-label">
            </label>
    
            <button class="icon-btn logout-icon">
                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
            </button>
        </div>
    </nav>
    
    <div class="sidebar">
        <a class="a" href="aboutusV2.html">About Us</a>
        <a class="a restricted" href="officers.html">Officers</a>
        <a class="a restricted" href="committee.html">Committee</a>
        <a class="a restricted" href="handledevents.html">Handled Events</a>
        <a class="a restricted" href="announcements.html">Announcements</a>
    </div>
    
    <div class="comtext">
        <h1 class="comtxt">COMMITTEE</h1>
    </div>

    <div class="container1">
        <div class="header">
            <div class="header-text">
                <h1 id="committee-name"><?php echo htmlspecialchars($committeeName); ?></h1>
            </div>
        </div>
    
        <div class="bigger-container">
            <h1>Committee Description</h1>
            <p><?php echo htmlspecialchars($committeeDescription); ?></p>
            <div class="gradient-line"></div>
        </div>
        
        <div class="small-container">
            <h1 class="register">How to Register?</h1>
            <p>Visit the SDLO office or sign up online at SLDOrg.com/registration.</p>
            <p><?php echo htmlspecialchars($committeeDescription); ?></p>
        </div>
    </div>
</body>

<script src="../js/committee.js"></script>
</html>
