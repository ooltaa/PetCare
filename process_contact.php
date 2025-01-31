<?php
require_once 'Database.php'; // Lidhja me databazën

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $conn = $db->getConnection();

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $services = isset($_POST['service']) ? implode(", ", $_POST['service']) : '';

    $message = "";

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone) && !empty($services)) {
        $stmt = $conn->prepare("INSERT INTO contact_requests (first_name, last_name, email, phone, services) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $services);

        if ($stmt->execute()) {
            $message = "Thank you! Your request has been received and confirmed. We will contact you soon.";
        } else {
            $message = "Error submitting request. Please try again later.";
        }

        $stmt->close();
    } else {
        $message = "Please fill in all required fields.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Confirmation</title>
    <link rel="stylesheet" href="CSS/process.css">
</head>
<body>

    <div class="confirmation-container">
        <h1>Request Confirmation</h1>
        <p><?php echo htmlspecialchars($message); ?></p>
        <a href="contact.php">Back to Contact Page</a>
    </div>

</body>
</html>