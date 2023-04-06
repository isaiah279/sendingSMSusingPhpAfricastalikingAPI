<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <!DOCTYPE html>
<html>
<head>
    <title>Send SMS with Africa's Talking</title>
    <style>
        /* Add some basic styling to the form */
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <h1>Send SMS with Africa's Talking</h1>
    <form method="post" action="index.php">
  <label for="phone">Phone number:</label>
  <input type="text" name="phone" id="phone">

  <label for="message">Message:</label>
  <textarea name="message" id="message"></textarea>

  <button type="submit">Send SMS</button>
</form>
</body>
</html>

</body>
</html>
<?php 
require_once 'vendor/autoload.php';
// Set your API key information
$username = "blessing";
$apiKey = "aac767ba3b4f196dea08261ead848570fcfb1ecdb5fe5f5c24dc423d0a063c10";
// Initialize the Africa's Talking SDK
$AT = new AfricasTalking\SDK\AfricasTalking($username, $apiKey);

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['phone']) && isset($_POST['message'])) {
    // Get the phone number and message from the form submission
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    // Send the message
    $result = $AT->sms()->send([
        'to'      => $phone,
        'message' => $message
    ]);

    // Display a success message if the message was sent successfully
    if ($result['status'] === 'success') {
        echo '<h2>SMS sent successfully!</h2>';
    } else {
        echo '<h2>Failed to send SMS.</h2>';
    }
}
?>


