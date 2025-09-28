<?php
include_once "../db.php";
include('nav.php');

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    
    $pName = mysqli_real_escape_string($conn, $_POST['pName']);

   
    // Generate unique company ID (or use an auto-increment column)
    $cid = uniqid("COMP_");

    // SQL query to insert the data into the 'company' table
    $sql = "INSERT INTO company (cid, cName, cEmail, cPassword, cAddress, pName,  cCountry,   cPhoneName) 
    VALUES ('$cid', '$company_name', '$email', '$password', '$address', '$pName',   '$country',   '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }





    // Close connection
    $conn->close();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration - Medical B2B</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            position: relative;
            overflow: hidden;
        }

        .This-my-Comp-Reg-container {
            max-width: 600px;
            /* Reduced max width */
            margin: 100px auto;
            background: #fff;
            padding: 15px;
            /* Reduced padding */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            position: relative;
            z-index: 10;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .This-my-Comp-Reg-form {
            /* padding: 50px; */
        }

        .This-my-Comp-Reg-label {
            margin-top: 8px;
            /* Reduced margin */
            font-weight: 500;
            font-size: 14px;
            /* Reduced font size */
        }

        .This-my-Comp-Reg-input,
        .This-my-Comp-Reg-select,
        .This-my-Comp-Reg-textarea {
            margin-top: 5px;
            padding: 8px;
            /* Reduced padding */
            font-size: 14px;
            /* Reduced font size */
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            /* Ensure input fields take up full width of container */
        }




        /* Animation for background */
        .This-my-Comp-Reg-animated-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }

        .This-my-Comp-Reg-animated-background img {
            position: absolute;
            width: 80px;
            /* Reduced icon size */
            height: 80px;
            /* Reduced icon size */
            opacity: 0.1;
            animation: float 10s infinite;
        }




        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .This-my-Comp-Reg-container {
                margin: 20px;
                padding: 15px;
            }

            .This-my-Comp-Reg-input,
            .This-my-Comp-Reg-select,
            .This-my-Comp-Reg-textarea {
                font-size: 13px;
                /* Slightly reduced font size for small screens */
                padding: 6px;
                /* Reduced padding */
            }

            .This-my-Comp-Reg-button {
                padding: 10px;
                /* Reduced button size */
                font-size: 14px;
                /* Reduced button font size */
            }
        }

        @media (max-width: 480px) {
            .This-my-Comp-Reg-container {
                margin: 10px;
                padding: 10px;
            }

            .This-my-Comp-Reg-input,
            .This-my-Comp-Reg-select,
            .This-my-Comp-Reg-textarea {
                font-size: 12px;
                /* Reduced font size for very small screens */
                padding: 5px;
                /* Reduced padding */
            }

            .This-my-Comp-Reg-button {
                padding: 8px;
                /* Reduced button size */
                font-size: 12px;
                /* Reduced button font size */
            }
        }
    </style>
</head>

<body>
    <div class="This-my-Comp-Reg-animated-background">
        <img alt="A stethoscope icon" height="100" src="https://storage.googleapis.com/a1aa/image/Ep9SRQegAbVfE0oN5ZR3J766Ajf4pTYGJo3eJluJJHMRw9yPB.jpg" style="top: 10%; left: 20%; animation-delay: 0s;" width="100" />
        <img alt="A syringe icon" height="100" src="https://storage.googleapis.com/a1aa/image/cA9gQ4YEnIZ8GZRB06MxzOYo56eXS6US1b6BXxefWlvV4eyPB.jpg" style="top: 30%; left: 50%; animation-delay: 2s;" width="100" />
        <img alt="A pill icon" height="100" src="https://storage.googleapis.com/a1aa/image/LMbFfR1zlVX6cqI8XoUQMPawN8OopdlZMetYrfUvQ2ZE4eyPB.jpg" style="top: 50%; left: 70%; animation-delay: 4s;" width="100" />
        <img alt="A heart icon" height="100" src="https://storage.googleapis.com/a1aa/image/QcrlDQX3Gpq0M9he2J7hF3ILcoC4qf4dW1jiLylh7UGGcv8TA.jpg" style="top: 70%; left: 30%; animation-delay: 6s;" width="100" />
        <img alt="A microscope icon" height="100" src="https://storage.googleapis.com/a1aa/image/Wount5bXfEzeOEXgNS70rmEtFAF0ZHF6RaG2UOptucKIcv8TA.jpg" style="top: 90%; left: 80%; animation-delay: 8s;" width="100" />
    </div>
    <div class="This-my-Comp-Reg-container">
        <h1 class="text-center text-2xl font-semibold mb-4">Owner Registration</h1>
        <form class="This-my-Comp-Reg-form" method="POST">
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="This-my-Comp-Reg-label" for="company_name"> Name</label>
                    <input class="This-my-Comp-Reg-input w-full" id="company_name" name="company_name" required type="text">
                </div>

                <div class="flex-1">
                    <label class="This-my-Comp-Reg-label" for="email">Email</label>
                    <input class="This-my-Comp-Reg-input w-full" id="email" name="email" required type="email">
                </div>

                <div class="flex-1">
                    <label class="This-my-Comp-Reg-label" for="phone">Phone Number</label>
                    <input class="This-my-Comp-Reg-input w-full" id="phone" name="phone" required type="tel">
                </div>
            </div>

            <div class="flex space-x-4">
                <!-- Password Field -->
                <div class="flex-1">
                    <label class="This-my-Comp-Reg-label" for="password">Password</label>
                    <input class="This-my-Comp-Reg-input w-full" id="password" name="password" required type="password">
                </div>

                <!-- Country Select -->
                <div class="flex-1">
                    <label class="This-my-Comp-Reg-label" for="country">Country</label>
                    <select class="This-my-Comp-Reg-select w-full" id="country" name="country" required>
                        <option value="USA">USA</option>
                        <option value="Canada">Canada</option>
                        <option value="UK">UK</option>
                        <option value="Australia">Australia</option>
                        <option value="India">India</option>
                        <option value="Germany">Germany</option>
                        <option value="France">France</option>
                        <option value="China">China</option>
                        <option value="Japan">Japan</option>
                        <option value="Brazil">Brazil</option>
                    </select>
                </div>
                  
                
            </div>


            <div>

 

                <label class="This-my-Comp-Reg-label" for="address">Address</label>
                <textarea class="This-my-Comp-Reg-textarea" id="address" name="address" required="" rows="4"></textarea>



                <label class="This-my-Comp-Reg-label" for="pName">product Name </label>
                <textarea class="This-my-Comp-Reg-textarea" id="pName" name="pName" required="" rows="3"></textarea>
            </div>

            <button class="This-my-Comp-Reg-button bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-full mt-4" type="submit">
                Register
            </button>
        </form>
    </div>
</body>

</html>