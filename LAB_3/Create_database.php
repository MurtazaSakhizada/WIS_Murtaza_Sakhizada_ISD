<?php
$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $databaseName = trim($_POST["database_name"]);

    $conn = new mysqli("localhost", "root", "");

    if ($conn->connect_error) {
        $message = "Connection failed: " . $conn->connect_error;
        $messageType = "danger";
    } elseif (empty($databaseName)) {
        $message = "Please enter a database name.";
        $messageType = "danger";
    } elseif (!preg_match("/^[A-Za-z0-9_]+$/", $databaseName)) {
        $message = "Only letters, numbers, and underscores are allowed.";
        $messageType = "danger";
    } else {

        $sql = "CREATE DATABASE `$databaseName`";

        if ($conn->query($sql)) {
            $message = "Database created successfully.";
            $messageType = "success";
        } else {
            $message = "Error: " . $conn->error;
            $messageType = "danger";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Database</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row">
        <div class="col-md-6">

            <h2 class="mb-3">Create Database</h2>

            <p class="text-muted">
                Enter a name for your student database.
            </p>

            <?php if ($message): ?>
                <div class="alert alert-<?php echo $messageType; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Database Name</label>

                    <input
                        type="text"
                        name="database_name"
                        class="form-control"
                        placeholder="Example: wis_lab"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Create Database
                </button>

                <button type="reset" class="btn btn-secondary">
                    Clear
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>
