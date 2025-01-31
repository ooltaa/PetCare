<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Grooming Contact Form</title>
  <link rel="stylesheet" href="CSS/style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right,rgb(171, 119, 121),rgb(234, 164, 164));
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }

    h1 {
      font-size: 28px;
      color: #333;
      text-align: center;
      margin-bottom: 10px;
    }

    p {
      color: #777;
      font-size: 16px;
      text-align: center;
      margin-bottom: 20px;
    }

    .form-container {
      background: white;
      border-radius: 12px;
      padding: 25px;
      max-width: 600px;
      width: 100%;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 2px solidrgb(174, 111, 121);
    }

    .success-message {
      display: none;
      background:rgb(137, 69, 74);
      color: white;
      padding: 15px;
      border-radius: 8px;
      margin-top: 10px;
      text-align: center;
      font-weight: bold;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input[type="text"], input[type="email"], input[type="tel"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      transition: 0.3s;
    }

    input:focus {
      border-color:rgb(76, 29, 34);
      outline: none;
    }

    .name-container {
      display: flex;
      gap: 15px;
    }

    .name-container input {
      flex: 1;
    }

    .checkbox-group {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
    }

    .checkbox-group p {
      width: 100%;
      text-align: center;
      font-size: 16px;
      font-weight: bold;
      color: #444;
      margin-bottom: 10px;
    }

    .checkbox-group label {
      display: flex;
      align-items: center;
      gap: 5px;
      background: white;
      padding: 10px 15px;
      border-radius: 20px;
      border: 1px solid #ddd;
      cursor: pointer;
      font-size: 16px;
      transition: 0.3s;
    }

    .checkbox-group input {
      display: none;
    }

    .checkbox-group input:checked + label {
      background:rgb(97, 40, 48);
      color: white;
      border-color: #ff6b81;
    }

    button {
      background:rgb(142, 69, 80);
      color: white;
      border: none;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 18px;
      font-weight: bold;
      transition: 0.3s;
    }

    button:hover {
      background: #e35b72;
    }
  </style>
</head>
<body>
  <h1>Pet Grooming Contact Form</h1>
  <p>Fill out the form below, and we will contact you soon.</p>
  <div class="form-container">
  <form id="contact-form" action="process_contact.php" method="POST">
      <div class="name-container">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
      </div>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="tel" name="phone" placeholder="Phone Number" required>
      <div class="checkbox-group">
        <p>Choose the services for your pet:</p>
        <input type="checkbox" id="grooming" name="service[]" value="Grooming">
        <label for="grooming">Grooming</label>
        <input type="checkbox" id="daycare" name="service[]" value="Daycare">
        <label for="daycare">Daycare</label>
        <input type="checkbox" id="teeth-cleaning" name="service[]" value="Teeth cleaning">
        <label for="teeth-cleaning">Teeth Cleaning</label>
        <input type="checkbox" id="boarding" name="service[]" value="Boarding">
        <label for="boarding">Boarding</label>
        <input type="checkbox" id="other" name="service[]" value="Other">
        <label for="other">Other</label>
      </div>
      <button type="submit">Submit</button>
    </form>
</body>
</html>
