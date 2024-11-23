<?php
session_start();
$conn = new mysqli("localhost", "root", "", "userdatabase");
$poll_id = $_GET['poll_id'] ?? 2;
$k = $_SESSION['userName'];

// 獲取投票信息
$poll = $conn->query("SELECT * FROM voteInfo WHERE voteId = $poll_id")->fetch_assoc();
$options = $conn->query("SELECT * FROM voteChoice WHERE voteId = $poll_id");
$option = $options->fetch_assoc();
$user = $conn->query("SELECT * FROM userInfo WHERE userName = '$k'") or die($conn->error);
$user = $user->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_options = $_POST['options'];
    foreach ($selected_options as $option_id) {
        $userid = $user['userId'];
        $optiontext = $option['votechoiceText'];
        $option_num = $conn->query("SELECT voteChoiceId FROM votechoice WHERE votechoiceText = '$optiontext' GROUP BY votechoiceText")->fetch_assoc();
        $optionid = $option_num["voteChoiceId"];
        $sql= "INSERT INTO userVote (`userId`, `voteId`, `voteChoiceId`) VALUES ('$userid', '$poll_id', '$optionid')";
        $conn->query($sql) or die($conn->error);
    }
    header("Location: results.php?poll_id=$poll_id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>參與投票</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4"><?php echo htmlspecialchars($poll['voteTitle']); ?></h1>
        <form method="post">
            <?php while ($option = $options->fetch_assoc()): ?>
                <div class="form-check">
                    <input class="form-check-input" type="<?php echo $poll['is_multiple'] ? 'checkbox' : 'radio'; ?>" 
                           name="options[]" value="<?php echo $optiontext; ?>" id="option-<?php echo $option['voteChoiceId']; ?>">
                    <label class="form-check-label" for="option-<?php echo $option['voteChoiceId']; ?>">
                        <?php echo htmlspecialchars($optiontext); ?>
                    </label>
                </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary mt-3">提交</button>
        </form>
    </div>
</body>
</html>
