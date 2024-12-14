<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/listOrgs.css">
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
        <div class="logo">
            <img src="../images/longlogo.png" alt="Org Connect Logo">
        </div>

          <div class="search-container">
            <input type="text" placeholder="Search">
            <i class="fas fa-search"></i>
          </div>
        <div class="nav-buttons">

            <button class="btn list-orgs">
                <i class="fa-solid fa-house"></i>LIST OF ORGS</button>
            <button class="btn newsfeed"  id="newsfeed-restricted">
                <i class="fa-solid fa-house"></i>NEWSFEED</button>
        </div>
      </div>
        
        <div class="nav-links">
  
            <button class="icon-btn user-icon user-restricted">
                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
            </button>
            <button class="icon-btn follow-icon follow-restricted">
                <i class="fa-solid fa-heart" style="color: #ffffff;"></i>
            </button>

            <div class="notification-container">
        <button class="icon-btn notif-icon notif-restricted" id="notif-btn">
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
            
            </button>
            <button class="icon-btn logout-icon" onclick="window.location.href='index.html'">
                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
            </button>
        </div>
    </nav>

    <div class="flex-container">
      <?php
      // Include database connection file
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "orgconnect";
  
      $conn = new mysqli($servername, $username, $password, $dbname);
  
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
  
      $sql = "SELECT * FROM organization";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="card-container">
                      <div class="shadow-box"></div>
                      <div class="card">
                          <img src="images/bglogo.png" alt="Background Image">
                          <div class="logo-container">
                              <img src="' . $row["logo"] . '" alt="">
                          </div>

                            <div>
                                <div class="checkbox-div">
                                    <input type="checkbox" class="checkbox-input" id="org1">
                                    <label for="org1" class="checkbox-label">
                                        <i class="fa fa-heart fa-1x" id="heart" aria-hidden="true" data-unchecked></i>
                                        <i class="fa fa-check-circle fa-1x" id="check" aria-hidden="true" data-checked></i>
                                    </label>
                                </div>
          
                            </div>

                          <div class="content">
                              <div class="title">' . $row["org_name"] . '</div>
                              <div class="description">' . $row["short_description"] . '</div>
                              <a href="aboutusV2.html" class="button">SEE MORE</a>
                          </div>
                      </div>
                  </div>';
          }
      } else {
          echo '<p>No organizations available.</p>';
      }
  
      $conn->close();
      ?>
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

</body>

<script src="../js/listOrgs.js"></script>

</html>