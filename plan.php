<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="bootstrap.css">

<link rel="stylesheet" href="footer.css">
<link rel="stylesheet" href="home.css">
<style>
    button:hover{
        background-color: rgb(99, 179, 99);
    }
    
    </style>
</head>
    
    
<body>
<body style="background-image: url('bodyback.jpg')">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="loggedhome.php">
	<img src="logo.jpg" alt="Adventura Logo" width="40" height="40">
	
	
          <a class="nav-link active" aria-current="page" href="loggedhome.php"><h4>Adventura.com&nbsp&nbsp</h4></a></a>
        
	
      
	
      
    </div>
  </div>
</nav>
    <h2 style="margin-left:50px;margin-top:30px;">Plan your trip</h2>
<hr>
    <br>
    <h3 style="margin-left:50px;">Your Travel Plans:</h3>
        <b><ul id="plans" style="margin-left:75px; margin-top:20px; "></ul></b>
        <br>
        <hr>
    <h3 style="margin-left:50px;">Destinations</h3>

    <!-- Add a place to the wishlist -->
    <label for="placeInput" style="margin-left:50px;">Add a place to the wishlist:</label>
    <input type="text" id="placeInput" placeholder="Enter a place name" style="width:250px; height:40px;border-radius:5px">
    <button onclick="addPlace()" style="margin-left:5px; border-radius:7px;padding:7px;">Add to Wishlist</button>
<hr>
    <!-- Display Wishlist -->
    <h3 style="margin-left:50px;">Wishlist:</h3>
    <ul id="wishlist" style="margin-left:75px; margin-top:20px;"></ul>

    <!-- Move to Plans -->
    <button onclick="showPlans()" style="width:75px; margin-left:75px; border-radius:7px;padding:7px;">Next</button>
<hr>
    <!-- Plans Section -->
    <div id="plansSection" style="display: none;">
        <h2 style="margin-left:50px;">Travel Plans:</h2>

        <!-- Date and Time Input -->
        <label for="dateInput" style="margin-left:60px; border-radius:7px">Enter date:</label>
        <input type="date" id="dateInput">
        
        <label for="timeInput" style="margin-left:5px; border-radius:7px;">Enter time:</label>
        <input type="time" id="timeInput">

        <button onclick="addPlan()" style="margin-left:5px; border-radius:7px;padding:7px;">Add to Plans</button>
<hr>
        <!-- Display Travel Plans -->
        
    </div>

    <script>
        // Wishlist and Plans arrays
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        let plans = [];

        // Function to add a place to the wishlist
        function addPlace() {
            const placeInput = document.getElementById('placeInput');
            const place = placeInput.value.trim();

            if (place === '') {
                alert('Please enter a place name.');
                return;
            }

            if (!wishlist.includes(place)) {
                wishlist.push(place);
                saveWishlist();
                displayWishlist();
                placeInput.value = ''; // Clear the input field
            } else {
                alert(`${place} is already in the wishlist.`);
            }
        }

        // Function to display the wishlist
        function displayWishlist() {
            const wishlistElement = document.getElementById('wishlist');
            wishlistElement.innerHTML = '';

            wishlist.forEach((place, index) => {
                const listItem = document.createElement('li');
                listItem.textContent = `${index + 1}. ${place}`;
                wishlistElement.appendChild(listItem);
            });
        }

        // Function to save wishlist to local storage
        function saveWishlist() {
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
        }

        // Function to show the plans section
        function showPlans() {
            document.getElementById('plansSection').style.display = 'block';
        }

        // Function to add a plan to the plans list
        function addPlan() {
            const dateInput = document.getElementById('dateInput');
            const timeInput = document.getElementById('timeInput');

            const date = dateInput.value.trim();
            const time = timeInput.value.trim();

            if (date === '' || time === '') {
                alert('Please enter a valid date and time.');
                return;
            }

            const place = wishlist.shift(); // Get the first place from the wishlist
            const plan = { place, date, time };
            plans.push(plan);
            saveWishlist();
            displayWishlist();
            displayPlans();
            dateInput.value = ''; // Clear the input fields
            timeInput.value = '';
        }

        // Function to display the travel plans
        function displayPlans() {
            const plansElement = document.getElementById('plans');
            plansElement.innerHTML = '';

            plans.forEach((plan, index) => {
                const listItem = document.createElement('li');
                listItem.textContent = `${index + 1}. ${plan.place} - Date: ${plan.date}, Time: ${plan.time}`;
                plansElement.appendChild(listItem);
            });
        }
    </script>
    <br>
    <br>
</body>
<footer class="footer">
  <div class="container footer__container">
          <div class="footer__1">
              <a href="home.php" class="footer__logo"><h4>Adventura</h4></a>
              <p id="foot">This is the version of our website addressed to speakers of English in India. </p>
          </div>
      
      <div class="footer__2">
          <h4>For Links</h4>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
      </div>

      <div class="footer__3">
          <h4>Privacy</h4>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms and Conditions</a></li>
          <li><a href="#">Refund Policy</a></li>
      </div>

      <div class="footer__4">
          <h4>Contact Us</h4>
          <div>
              
              <p id="foot">teamadventura2023@gmail.com</p>
          </div>
      

      <ul class="footer__socials">

          <li>
              <a href="#"><i class="uil uil-facebook"></i></a>
          </li>
          <li>
              <a href="#"><i class="uil uil-instagram"></i></a>
          </li>
          <li>
              <a href="#"><i class="uil uil-twitter"></i></a>
          </li>
          <li>
              <a href="#"><i class="uil uil-linkedin"></i></a>
          </li>
      </ul>
  </div>
  
  </div>
  <div class="footer__copyright">
      <small style="color: white;">Copyright &copy; <span style="color: rgb(99, 179, 99)">Adventura</span></small>
  </div>
</footer>
</html>