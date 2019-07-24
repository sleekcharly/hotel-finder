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

echo 
"<!DOCTYPE html>" .
  "<head>" .
      "<title>Hotel Finder</title>" .
      "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>" .
      "<style>" .
    "@import url('./blog.css')" . // Import the css style required for the page.
      "</style>" .
      "<style>
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
      </style>" .
      '<link rel="stylesheet" href="bootstrap.min.css">' .
      '<script src="bootstrap.min.js"></script>' .
  "</head> <body>" .

  '<div class="container-fluid background">

    <header class="blog-header py-3 mb-5">
      <div class="row flex-nowrap justify-content-between align-items-center">
      
        <div class="col-12 text-center">
          <a class="blog-header-logo text-white" href="#">Hotel Finder</a>
        </div>
        
      </div>
    </header>

    <form class="border border-light shadow-lg rounded col-md-5 mb-5" method="post" action="recommended.php">
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

  </div>' .

  '<div class="container-fluid">
  <h2>Recommended Destinations</h2>
    <div class="gallery">
      <figure class="gallery__item gallery__item--1 image-box">
      <a href="ifehotels.php" target="_blank">
        <img src="images/osun.jpeg" class="gallery__img rounded" alt="Osun state">
      </a>
      </figure>
      <div class="gallery-text-1 text-white">
        <h3 class="font-weight-bold">Ile-Ife</h3>
        <p>32,000 people are looking for hotels today</p>
      </div>

      <figure class="gallery__item gallery__item--2">
      <a href="lagoshotels.php" target="_blank">
        <img src="images/lagos.jpg" class="gallery__img rounded" alt="Lagos state">
      </a>
      </figure>
      <div class="gallery-text-2 text-white">
        <h3 class="font-weight-bold">Lagos</h3>
        <p>57,000 people are looking for hotels today</p>
      </div>

      <figure class="gallery__item gallery__item--3">
        <a href="oyohotels.php" target="_blank">
          <img src="images/ibadan.jpg" class="gallery__img rounded" alt="Oyo state">
        </a>
      </figure>
      <div class="gallery-text-3 text-white">
        <h3 class="font-weight-bold">Ibadan</h3>
        <p>35,000 people are looking for hotels today</p>
      </div>

      <figure class="gallery__item gallery__item--4">
        <a href="abujahotels.php" target="_blank">
          <img src="images/abuja.jpg" class="gallery__img rounded" alt="Federal Capital Territory">
        </a>
      </figure>
      <div class="gallery-text-4 text-white">
        <h3 class="font-weight-bold">Abuja</h3>
        <p>50,000 people are looking for hotels today</p>
      </div>

      <figure class="gallery__item gallery__item--5">
        <a href="portharcourthotels.php" target="_blank">
          <img src="images/rivers.jpg" class="gallery__img rounded" alt="Rivers state">
        </a>
      </figure>
      <div class="gallery-text-5 text-white">
        <h3 class="font-weight-bold">Porthacourt</h3>
        <p>49,000 people are looking for hotels today</p>
      </div>

    </div>
  </div>' .

  "</body> </html>";
?>