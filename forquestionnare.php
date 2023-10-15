<?php
// Retrieve and display answers
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
