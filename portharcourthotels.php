<?php

/*
ob_start — Turn on output buffering
This function will turn output buffering on. While output buffering is active no output is sent from the script (other than headers), instead the output is stored in an internal buffer.

Think of ob_start() as saying "Start remembering everything that would normally be outputted, but don't quite do anything with it yet."There are two other functions you typically pair it with: ob_get_contents(), which basically gives you whatever has been "saved" to the buffer since it was turned on with ob_start(), and then ob_end_clean() or ob_flush(), which either stops saving things and discards whatever was saved, or stops saving and outputs it all at once, respectively.
*/

ob_start();
session_start();

$timezone = date_default_timezone_set("Africa/Lagos"); //Set timezone parameters.

$con = mysqli_connect("localhost","root","","hotel_database"); //Connect to database with database parameters

//conditional to check if connection to database was successful.
if(mysqli_connect_errno()) {
  echo "Failed to connect: ". mysqli_connect_errno();
}


?>

<!DOCTYPE html>
  <head>
      <title>Hotel Finder</title>
      <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
      <style>
            @import url('./blog.css');
      </style>
      <style>
          .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
          }

          @media (min-width: 768px) {
              .bd-placeholder-img-lg {
              font-size: 3.5rem;
              }
          }
      </style>
      <link rel="stylesheet" href="bootstrap.min.css"
      <script src="bootstrap.min.js"></script>
  </head> 
  
  <body>

  <div class="container-fluid background">

    <header class="blog-header py-3 mb-5">
      <div class="row flex-nowrap justify-content-between align-items-center">
      
        <div class="col-12 text-center">
          <a class="blog-header-logo text-white" href="index.php">Hotel Finder</a>
        </div>
        
      </div>
    </header>

<main role="main" class="container-fluid">

<div class="main-container row mx-auto">
        
    <div class="post-section bg-light col-12 col-md-9">
        <h2><span class="font-weight-bold">Hotels in Portharcourt</span></h2>

        <?php

        $sql = "SELECT * FROM hotels WHERE state='portharcourt'";

        $result = mysqli_query($con, $sql); ?>

        <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo  
            '<div class="row border w-100 mt-2 mb-3">
                <div class="col pb-3">                   
                    <div class="post-body row ml-1">  
                    <div class="d-inline-block mt-2 col-auto" >
                        <a href="'.$row["url"].'" target="_blank">
                        <img style="width: 300px; height: auto; border-radius: 8px; background-color: rgba(0,0,255,.1)" src="'.$row["image"].'" />
                        </a>
                        </div>
                        <div class="ml-2 mt-2 col">
                            <div class="">
                             <h6 class="postTitle font-weight-bold">'.$row["name"].'</h6>
                            </div>
                            <div>
                             <p>'.$row["description"].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                        }
                    } else {
                        echo "0 results";
                    }
        ?>


        
    </div>

    <div class="form-section bg-light col">
        <form class="border border-light shadow-lg rounded col" method="post" action="recommended.php">
        <h3><span class="font-weight-bold mb-4">Search Hotels</span></h3>

            <div class="form-group ">
            <div class="form-row">
                <div class="form group col-md-6">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" name="firstname" placeholder="First Name">
                </div>
                <div class="form group col-md-">
                    <label for="lasttName">Last name</label>
                    <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Last Name">
                </div>

            </div>
            </div>

            <div class="form-group col-md-8">
            <label for="gender">Gender</label>
            <select id="gender" class="form-control" name="gender">
                <option selected>Choose...</option>
                <option>Male</option>
                <option>Female</option>
            </select>
            </div>

            <div class="form-group col-md-8">
            <label for="occupation">Occupation</label>
            <select class="form-control" name="occupation">
                <option selected>Choose...</option>
                <option value="civil">Civil Servant</option>
                <option value="military">Military</option>
                <option value="engineer">Engineering</option>
                <option value="scholar">Student</option>
            </select>
            </div>

            <div class="form-group col-md-8">
            <label for="state">State</label>
            <select class="form-control" name="state">
                <option selected>Choose...</option>
                <option value="lagos">Lagos</option>
                <option value="abuja">Abuja</option>
                <option value="portharcourt">Port-Harcourt</option>
                <option value="ife">Osun</option>
                <option value="oyo">OYO</option>
            </select>
            </div>

            <div class="form-group col-md-8">
            <label for="purpose">Purpose of visit</label>
            <select id="purpose" class="form-control">
                <option selected>Choose...</option>
                <option>Official</option>
                <option>Study</option>
                <option>Vacation</option>
            </select>
            </div>

            <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary ">Search</button>
            </div>
        </form>
    </div>
</div>



</main><!-- /.container -->

</body> </html>
