<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="/register" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <br>
        <div>
            <label for="nim">NIM (Student ID):</label>
            <input type="text" id="nim" name="nim" required>
        </div>
        <br>
        <div>
            <label for="user">Username:</label>
            <input type="text" id="user" name="user" required>
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <br>
        <div>
            <label for="password">Password (Min 8 characters):</label>
            <input type="password" id="password" name="password" minlength="8" required>
        </div>
        <br>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" required>
        </div>
        <br>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>