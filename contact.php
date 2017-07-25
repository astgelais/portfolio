<?php

foreach ($_GET as $key => $val) {
    $$key = $val;
}

//Functions
function send_contact_request($subject, $data, $from, $to = "astgelais@gmail.com"){
    $message = "From: " . $from . "<br>" . $data."<br>";
    $email = "noreply@aaronstg.com";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <" .$email. ">" . "\r\n";
    $to = "astgelais@gmail.com";
    $sendmail = mail ($to, $subject, $message, $headers);
    return $sendmail;
}

//Sumbit form values to lc_uts_cgid_request
if(isset($submit)) {
    
    $edata = "";
    
    //print_r($_POST);
    foreach($_POST as $k => $v) {
        $edata .= "<br><strong>".$k."</strong>:<br>".$v."<br>";
    }
    
    //Email Data
    $to = "astgelais@gmail.com";
    $from = $_SERVER["SCRIPT_NAME"];
    $subject = "aaronstg - Contact Request";
    
    send_contact_request($subject, $edata, $from, $to);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Stylesheets -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-inverse bg-inverse fixed-top" style="padding: 0rem 1rem;border-bottom: .1rem solid white;">
        <button class="navbar-toggler navbar-toggler-right" style="height: 100%;" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">Aaron St Gelais
            <small style="display:block; font-size: 60%; font-weight: 300;">Online Marketing & Development</small>
        </a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about.html">About Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/resume.html">Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/portfolio.html">Portfolio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/contact.php">Contact <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/astgelais" target="_BLANK">GitHub</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->

    <?php if(isset($submit)) { ?>
    <div class="container-fluid">
        <h1>Success</h1>
        <hr>
        <div class="content-l-align">
        <h2>Thank you for contact request. I will get back to you shortly.</h2>
        </div>
    </div>
    <?php } else { ?>
    <div class="container-fluid">
        <h1>Contact</h1>
        <hr>
        <div class="content-l-align">
        <form id="regiration_form" action="/contact.php?submit=true" method="post" onSubmit="return validateForm()">
            <div class="form-group">
                <label for="inputEmail">Email <sup>*</sup></label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text">I'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="messageTextarea">Message <sup>*</sup></label>
                <textarea class="form-control" name="messageTextarea" id="messageTextarea" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="inputTel">Phone <sup>(optional)</sup></label>
                <div>
                    <input class="form-control" name="inputTel" type="tel" value="1-(555)-555-5555" id="inputTel">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    <?php } ?>
    <!-- /.container -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>