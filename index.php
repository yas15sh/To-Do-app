
<?php
$mysqli = new mysqli("localhost", "root", "", "todo");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $mysqli->query("INSERT INTO tasks (description) VALUES ('$task')");
}
$result = $mysqli->query("SELECT * FROM tasks");
?>
<!DOCTYPE html>
<html>
<head><title>PHP To-Do App</title></head>
<body>
  <h2>To-Do List</h2>
  <form method="POST">
    <input type="text" name="task" required>
    <button type="submit">Add</button>
  </form>
  <ul>
    <?php while($row = $result->fetch_assoc()) { ?>
      <li><?php echo $row["description"]; ?></li>
    <?php } ?>
  </ul>
</body>
</html>
