<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account - FraudXpert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #007bff, #6610f2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeIn 1s ease-in-out;
        }
        .register-container {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 450px;
            width: 100%;
            animation: slideIn 1s ease-in-out;
        }
        .register-container img {
            width: 90px;
            margin-bottom: 10px;
        }
        .form-control {
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 10px;
            transition: 0.3s;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn-primary {
            width: 100%;
            border-radius: 6px;
            font-weight: bold;
            background: #007bff;
            border: none;
            padding: 10px;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .login-link {
            display: block;
            margin-top: 12px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .login-link:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>

    <div class="register-container">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Bank Logo">
        <h3 class="mb-3">Create Your Account</h3>

        <form action="{{ route('register_account') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Account Type</label>
                <select name="account_type" class="form-control" required>
                    <option value="savings">Savings Account</option>
                    <option value="checking">Checking Account</option>
                    <option value="business">Business Account</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Security Question</label>
                <select name="security_question" class="form-control" required>
                    <option value="pet">What is the name of your first pet?</option>
                    <option value="school">What is the name of your first school?</option>
                    <option value="mother">What is your mother's maiden name?</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Security Answer</label>
                <input type="text" name="security_answer" class="form-control" placeholder="Enter your answer" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter a secure password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="{{ route('login_account') }}" class="login-link">Already have an account? Login</a>
        </form>
    </div>

</body>
</html>
