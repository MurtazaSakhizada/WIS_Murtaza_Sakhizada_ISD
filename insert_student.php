<?php
$message = "";
$messageType = "";

$fullName = "";
$email = "";
$department = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $department = trim($_POST["department"]);

    $conn = new mysqli("localhost", "root", "", "wis_lab");

    if ($conn->connect_error) {

        $message = "Connection failed: " . $conn->connect_error;
        $messageType = "danger";

    } elseif (empty($fullName) || empty($email) || empty($department)) {

        $message = "All fields are required.";
        $messageType = "danger";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";
        $messageType = "danger";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO students (full_name, email, department)
             VALUES (?, ?, ?)"
        );

        $stmt->bind_param("sss", $fullName, $email, $department);

        if ($stmt->execute()) {

            $message = "Student added successfully.";
            $messageType = "success";

            $fullName = "";
            $email = "";
            $department = "";

        } else {

            $message = "Error: " . $stmt->error;
            $messageType = "danger";
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Student</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">
    
<div class="container mt-5">

    <div class="row">
        <div class="col-md-5 ">

            <h2 class="mb-3">Add Student</h2>

            <p class="text-muted">
                Enter student information below.
            </p>

            <?php if ($message): ?>
                <div class="alert alert-<?php echo $messageType; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>

                    <input
                        type="text"
                        name="full_name"
                        class="form-control"
                        value="<?php echo htmlspecialchars($fullName); ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?php echo htmlspecialchars($email); ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>

                    <input
                        type="text"
                        name="department"
                        class="form-control"
                        value="<?php echo htmlspecialchars($department); ?>"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Save Student
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
