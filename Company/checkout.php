<?php
session_start();
include('nav.php');
include_once "../db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process order and save to the database
    unset($_SESSION['cart']);
    header('Location: order_success.php');
}
?>
<form method="post">
    <h2>Checkout</h2>
    <label>Name</label>
    <input type="text" name="name" required>
    <label>Address</label>
    <textarea name="address" required></textarea>
    <button type="submit">Place Order</button>
</form>



<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    .container {
        width: 100%;
        max-width: 900px;
        margin: 50px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        font-size: 2.5rem;
        margin-bottom: 30px;
    }

    label {
        font-size: 1.1rem;
        color: #555;
        display: block;
        margin-bottom: 8px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f9f9f9;
    }

    input[type="text"]:focus,
    textarea:focus {
        outline: none;
        border-color: #007bff;
        background-color: #fff;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    button {
        background-color: #007bff;
        color: white;
        padding: 15px 30px;
        font-size: 1.2rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    button:active {
        background-color: #003366;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        h2 {
            font-size: 2rem;
        }

        label {
            font-size: 1rem;
        }

        input[type="text"],
        textarea {
            padding: 10px;
            font-size: 1rem;
        }

        button {
            font-size: 1rem;
            padding: 12px 25px;
        }
    }
</style>