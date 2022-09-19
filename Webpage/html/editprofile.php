<?php

include(__DIR__ . "/pagehead.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>SearchBook</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery-3.6.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>

    <link rel="stylesheet" type="text/css" href="../css/searchbook.css">
</head>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Home</a></li>
                <li><a href="#">Search Book</a></li>
                <li><a href="#">My Account</a></li>
                <li class="active"><a href="#">Edit Information</a></li>
                <li><a href="#">Check Loan Status</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div class="vr"></div>
        </div>

        <div class="vr"></div>
        <div class="col-md-9">


            <div clas="row">
                <div class="col-md-8 col-md-push-2">
                    <form role="form">
                        <div class="form-group">
                            <label for="first name">First Name</label>
                            <input type="text" class="form-control" id="frsit name" placeholder="Please in put your first name">
                        </div>

                        <div class="form-group">
                            <label for="last name">Last Name</label>
                            <input type="text" class="form-control" id="last name" placeholder="Please input your last name">
                        </div>

                        <div class="form-group">
                            <label for="user name">User Name</label>
                            <input type="text" class="form-control" id="user name" placeholder="please input your user name">
                        </div>

                        <div class="form-group">
                            <label for="pnone">Phnoe Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Please input your phone number">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="passsword" class="form-control" id="password1" placeholder="Please input new password">
                        </div>

                        <div class="form-group">
                            <label for="passord">confirm Password</label>
                            <input type="passsword" class="form-control" id="password2" placeholder="Please reinput new password">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 col-md-push-5">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                        </div>

                    </form>
                </div>


            </div>

        </div>
    </div>
</div>

</body>

</html>
