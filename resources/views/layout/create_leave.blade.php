<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    @if ($errors->any())
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
        <strong>The following errors occurred:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{ route('users.store')}}" method="POST">
    @csrf
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
            <label for="user_role">User Role:</label>
        <select id="user_role" name="user" required>
            <option value="" disabled selected>Select Role</option>
            <option value="student" {{ old('user') == 'student' ? 'selected' : '' }}>Student</option>
            <option value="faculty" {{ old('user') == 'faculty' ? 'selected' : '' }}>Faculty</option>
            <option value="admin" {{ old('user') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
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