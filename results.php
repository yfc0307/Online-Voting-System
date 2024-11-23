<?php
$conn = new mysqli("localhost", "root", "", "userdatabase");
$poll_id = $_GET['poll_id'] ?? 2;

// 獲取投票及選項
$poll = $conn->query("SELECT * FROM voteInfo WHERE voteId = $poll_id")->fetch_assoc();
$options = $conn->query("SELECT * FROM voteChoice WHERE voteId = $poll_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票結果</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4"><?php echo htmlspecialchars($poll['voteTitle']); ?> - 結果</h1>
        <canvas id="resultsChart" width="400" height="200"></canvas>
    </div>

    <?php
    $countchoice = $conn->query("SELECT COUNT(*) FROM voteChoice WHERE voteId = $poll_id");
    $countchoice = $countchoice->fetch_assoc();
    for ($x = 1; $x <= $countchoice; $x++){
        $result = $conn->query("SELECT * FROM userVote WHERE voteChoiceId = $x");
        $result_n = mysqli_num_rows($result);

        if($result_n <= 0) {
            break;
        } else {
            while ($option = $options->fetch_assoc()) {
                echo $result_n. " Votes. <br>";    
                echo $option["votechoiceText"]. "<br>";
            }
        }
    }
?>
</body>
</html>
