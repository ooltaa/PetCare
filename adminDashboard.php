<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/admin.css">
</head>
<body>
    
    <div class="navbar">
        <h2>Admin Dashboard</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    
    <div class="sidebar">
        <h3>Navigation</h3>
        <ul>
            <li><a href="manage_products.php">📦 Manage Products</a></li>
            <li><a href="manage_requests.php">📩 Client Requests</a></li>
        </ul>
    </div>

    
    <div class="main-content">
        <h1>Welcome, Admin!</h1>
        <p>Select an option from the sidebar to start managing your store and client requests.</p>

        <div class="dashboard-sections">
            <a href="manage_products.php" class="dashboard-card">
                <h3>📦 Manage Products</h3>
                <p>Add, edit, and delete products in the store.</p>
            </a>
            <a href="manage_requests.php" class="dashboard-card">
                <h3>📩 Client Requests</h3>
                <p>View and manage requests from clients.</p>
            </a>
        </div>
    </div>
    <div class="sidebar">
    <h3>Navigation</h3>
    <ul>
        <li><a href="adminDashboard.php">🏠 Dashboard</a></li>
        <li><a href="manage_products.php">📦 Manage Products</a></li>
        <li><a href="admin_orders.php">🛒 View Orders</a></li>
    </ul>
</div>
</body>
</html>