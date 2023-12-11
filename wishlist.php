<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .wishlist {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #wishlistItems {
            list-style-type: none;
            padding: 0;
        }

        #wishlistItems li {
            margin-bottom: 10px;
            padding: 8px;
            background-color: #e0e0e0;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button {
            padding: 10px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
  background-color:  rgb(57, 130, 57);
}
    </style>
</head>
<body>
    <div class="wishlist">
        <ul id="wishlistItems">
            
        </ul>
        <button onclick="clearWishlist()">Clear Wishlist</button>
    </div>

    <script>
        // Retrieve wishlist items from localStorage
        const wishlistItems = JSON.parse(localStorage.getItem('wishlistItems')) || [];
        const wishlist = document.getElementById('wishlistItems');

        // Display wishlist items
        wishlistItems.forEach(name => {
            const listItem = document.createElement('li');
            listItem.appendChild(document.createTextNode(name));
            wishlist.appendChild(listItem);
        });

        // Function to clear the wishlist
        function clearWishlist() {
            // Remove items from localStorage
            localStorage.removeItem('wishlistItems');

            // Clear the displayed list
            wishlist.innerHTML = "";
        }
    </script>
</body>
</html>
