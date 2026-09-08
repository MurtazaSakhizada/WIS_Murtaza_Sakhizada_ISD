<?php
$message = "";
$messageType = "";

$conn = new mysqli("localhost", "root", "", "wis_lab");

if ($conn->connect_error) {

    $message = "Connection failed: " . $conn->connect_error;
    $messageType = "danger";

} else {

    $sql = "CREATE TABLE IF NOT EXISTS students (
        id INT PRIMARY KEY AUTO_INCREMENT,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL,
        department VARCHAR(80) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql)) {
        $message = "Students table created successfully.";
        $messageType = "success";
    } else {
        $message = "Error: " . $conn->error;
        $messageType = "danger";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Students Table</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row">
        <div class="col-md-5">

            <h3 class="mb-3">Create Students Table</h3>

            <?php if ($message): ?>
                <div class="alert alert-<?php echo $messageType; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <a href="insert_student.php" class="btn btn-primary">
                Add Student
            </a>

        </div>
    </div>

</div>

</body>
</html>
