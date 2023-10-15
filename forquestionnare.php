<?php
$host = "localhost"; // Database host
$username = "apm"; // Database username
$password = ""; // Database password
$database = "fork"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codename = $_POST["codename"];
    $message = $_POST["message"];

    // Insert the data into the database
    $sql = "INSERT INTO user_answers (user_name, answer_text) VALUES ('$codename', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Answer submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve and Display Answers
$answers = array();
$result = $conn->query("SELECT * FROM user_answers");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $answers[] = $row;
    }
}
?>

<!-- Display answers in your HTML -->
<div class="answers">
    <h2>Answers</h2>
    <?php foreach ($answers as $answer) : ?>
        <div class="answer">
            <p><strong>Codename: </strong><?php echo $answer["user_name"]; ?></p>
            <p><strong>Message: </strong><?php echo $answer["answer_text"]; ?></p>
        </div>
    <?php endforeach; ?>
</div>