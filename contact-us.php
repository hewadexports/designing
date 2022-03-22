<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $subjectPrefix = '[New Email from Customer]';
    $emailTo       = 'sales@qarsak.com';
    $errors = array(); // array to hold validation errors
    $data   = array(); // array to pass back data
        
        $fname    = stripslashes(trim($_POST['Firstname']));
        $lname   = stripslashes(trim($_POST['Lastname']));
        $phone   = stripslashes(trim($_POST['Phone']));
        $email   = stripslashes(trim($_POST['Email']));
        $message = stripslashes(trim($_POST['Message']));
        
        // if there are any errors in our errors array, return a success boolean or false
       
            $subject = $subjectPrefix;
            $body    = '
                <strong>First Name: </strong>'.$fname.'<br />
                <strong>Last Name: </strong>'.$lname.'<br />
                <strong>Contact no: </strong>'.$phone.'<br />
                <strong>Email: </strong>'.$email.'<br />
                <strong>Message: </strong>'.nl2br($message).'<br />
            ';
            $headers .= "Organization: Vasquez Catering\r\n";
            $headers .= "X-Priority: 3\r\n";
            $headers  = "MIME-Version: 1.1" . PHP_EOL;
            $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
            $headers .= "Content-Transfer-Encoding: 8bit" . PHP_EOL;
            $headers .= "Date: " . date('r', $_SERVER['REQUEST_TIME']) . PHP_EOL;
            $headers .= "Message-ID: <" . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>' . PHP_EOL;
            $headers .= "From: " . "=?UTF-8?B?".base64_encode($name)."?=" . "<$email>" . PHP_EOL;
            $headers .= "Return-Path: $emailTo" . PHP_EOL;
            $headers .= "Reply-To: $email" . PHP_EOL;
            $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
            $headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . PHP_EOL;
            mail($emailTo, "=?utf-8?B?" . base64_encode($subject) . "?=", $body, $headers);
            $data['success'] = true;
            $data['message'] = 'Congratulations. Your message has been sent successfully';
            $_SESSION['msg'] = 'Email Send Successfully!';
             header("Location: contact-us.php?msg=Email Send Successfully!");
    }
    


  



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!--Sticky Links-->
        <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
      href="https://fonts.googleapis.com/css2?family=Coiny&family=Great+Vibes&family=Josefin+Sans:wght@700&family=Notable&family=Pacifico&family=Roboto:wght@900&display=swap"
      rel="stylesheet"
    />
    
    

    <!-- Font Awesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    
        <!-- For Sticky-Menu Coppied header section from main index -->
   
    
    
    
    <meta charset="utf-8">
    <title>Form</title>
    <link rel="stylesheet" href="qarsak.css">
</head>

<body>
   <header>
      <nav class="navbar">
        <div class="logo">
          <h1><a href="index.html">QARSAK</a></h1>
          <p><span>Be Happy</span></p>
        </div>

        <!-- Mobile Hamburger Icon -->
        <button class="navbar-toggler">
          <div class="toggler-btn">
            <span class="bar bar1"></span>
            <span class="bar bar2"></span>
            <span class="bar bar3"></span>
          </div>
        </button>
        <!-- Mobile Hamburger Icon -->

        <!-- Header Search -->
        <div class="header-search">
          <input
            type="text"
            id="search-bar"
            placeholder="find events near me..."
          />
          <button class="search-icon" onclick="redirectToOtherSite()">
            <span><i class="fa-solid fa-magnifying-glass"></i></span>
          </button>
        </div>
        <!-- Header Search -->

        <div class="social-links">
          <a class="menu-item" href="about.html">About Us</a>
          <a class="menu-item" href="contact-us.php">Contact Us</a>
          <a href="#"><i class="fab fa-facebook-f"></i> </a>
          <a href="#"><i class="fab fa-twitter"></i> </a>
          <a href="https://www.instagram.com/qarsak_official/"><i class="fab fa-instagram"></i> </a>
          <a href="https://www.tiktok.com/@qarsak.com"><i class="fab fa-tiktok"></i> </a>
        </div>
      </nav>
    </header>
    <div class="contact-us-wrapper">
        <div class="main">
            <div class="register">
                <h2>Contact Us</h2>
                
       
                <form action="" method="post" id="register">
                    <!-- Gmail Subject -->
                    <input type="hidden" name="_subject" value="You got a new message from Qarsak Website Form!" />
                    <!-- Gmail Subject -->

                    <label>First Name:</label>
                    <br />
                    <input type="text" class="name" id="fname" name="Firstname" placeholder="Enter Your First Name" required />
                    <br /><br />
                    <label>Last Name:</label>
                    <br />
                    <input type="text" class="name" id="lname" name="Lastname" placeholder="Enter Your Last Name" />
                    <br /><br />
                    <label>Phone Number:</label>
                    <br />
                    <input type="phone" class="name" id="phone" name="Phone" placeholder="Enter Your Phone Number" />
                    <br /><br />
                    <label>Email:</label>
                    <br />
                    <input type="email" class="name" id="email" name="Email" placeholder="Enter Your Valid Email" required />
                    <br />
                    <label class="message">Message:</label>
                    <textarea class="name" name="Message" id="message" cols="30" rows="10"></textarea>

                    <br />

                    <button type="submit" id="submit">Submit</button>
                    <?php if (isset($_GET['msg'])) { ?>
                <div style="color:green;text-align:center;margin-top:-7%"> Email Sent Successfully. </div>
            <?php    } ?>
                </form>
            </div>
        </div>
    </div>



 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
    <script src="main.js"></script>

    <!-- Search Functionality -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script>
      function redirectToOtherSite() {
        let searchVal = $("#search-bar").val();
        if (searchVal != undefined && searchVal != null && searchVal != "") {
          window.open("https://tickets.qarsak.com/?q=" + searchVal);
        }
      }
    </script>
</body>

</html>
