<?php
// 連接資料庫
$conn = new mysqli("localhost", "root", "", "userdatabase");

// 檢查連接
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

// 獲取投票及其選項
$poll_id = $_GET['poll_id'] ?? 2; // 預設選擇第一個投票
$poll = $conn->query("SELECT * FROM voteInfo WHERE voteId = $poll_id")->fetch_assoc();
$options = $conn->query("SELECT * FROM voteChoice WHERE voteId = $poll_id");





?>

<h1><?php echo $poll['voteTitle'];; ?></h1>
<form method="POST" action="vote.php">
<input type="hidden" name="poll_id" value="<?php echo $poll_id; ?>">
    <?php while ($option = $options->fetch_assoc()): ?>
        <label>
            <input type="<?php echo $poll['is_multiple'] ? 'checkbox' : 'radio'; ?>" 
                   name="options[]" 
                   value="<?php echo $option['votechoiceText']; ?>">
            <?php echo $option['votechoiceText']; ?>
        </label><br>
    <?php endwhile; ?>
    <button type="submit">投票</button>

    
    

</form>






