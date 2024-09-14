<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Finder - Donor List</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        #h1find{
            text-align:center;

        }

    table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            max-width: 100%;
            overflow-x: auto;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #c0392b;
            color: white;
        }

</style>

</head>
<body class="bg-gray-100">
    <header class="bg-red-600 text-white p-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl md:text-3xl font-bold">Blood Buddy</h1>
                <nav class="hidden md:flex mt-2 space-x-10">
                    <ul class="flex space-x-6">
                        <li><a href="home.html" class="hover:underline">Home</a></li>
                        <li><a href="submit_donor.php" class="hover:underline">Donor Registration Form</a></li>
                        <li><a href="center.html" class="hover:underline">Blood Center</a></li>
                        <li><a href="receiver.html" class="hover:underline">Find Blood Near You</a></li>
                        <li><a href="#" class="hover:underline">Gallery</a></li>
                        <li><a href="camps.html" class="hover:underline">Camps</a></li>
                        <li><a href="comic.html" class="hover:underline">Comic</a></li>
                        <li><a href="contact.html" class="hover:underline">Contact Us</a></li>
                    </ul>
                </nav>
                <button id="menu-button" class="md:hidden flex items-center px-3 py-2 border rounded text-white border-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div id="mobile-menu" class="md:hidden hidden mt-2">
                <ul class="flex flex-col space-y-4">
                    <li><a href="home.html" class="hover:underline">Home</a></li>
                    <li><a href="donor.html" class="hover:underline">Donor Registration Form</a></li>
                    <li><a href="center.html" class="hover:underline">Blood Center</a></li>
                    <li><a href="receiver.html" class="hover:underline">Find Blood Near You</a></li>
                    <li><a href="#" class="hover:underline">Gallery</a></li>
                    <li><a href="camps.html" class="hover:underline">Camps</a></li>
                    <li><a href="comic.html" class="hover:underline">Comic</a></li>
                    <li><a href="contact.html" class="hover:underline">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </header>
<?php

$host = "localhost"; 
$dbname = "blood_donors"; 
$username = "root"; 
$password = ""; 


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $bloodType = $conn->real_escape_string($_POST['bloodType']);


    $sql = "SELECT full_name, dob, age, gender, email, phone, address, location, dnd FROM donors WHERE blood_type = '$bloodType'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1 id='h1find'>Donors with Blood Type: " . htmlspecialchars($bloodType) . "</h1>";
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Date Of Birth</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Location</th>
                    <th>Do Not Distrub Between</th>
                </tr>";

        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["full_name"]) . "</td>
                    <td>" . htmlspecialchars($row["dob"]) . "</td>
                    <td>" . htmlspecialchars($row["age"]) . "</td>
                    <td>" . htmlspecialchars($row["gender"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["phone"]) . "</td>
                    <td>" . htmlspecialchars($row["address"]) . "</td>
                    <td>" . htmlspecialchars($row["location"]) . "</td>
                    <td>" . htmlspecialchars($row["dnd"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No donors found with blood type " . htmlspecialchars($bloodType) . ".</p>";
    }
}


$conn->close();
?>

    <footer>
            <div class="footer-content">
                <p>&copy; 2024 Blood Finder. All Rights Reserved.</p>
                <p>Follow us on:</p>
                <div class="social-icons">
                    <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
                    <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
                </div>
            </div>
    </footer>
    <script>
    // JavaScript to toggle the mobile menu
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
    
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        </script>   
</html>