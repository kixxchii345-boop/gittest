<?php 
session_start();
require 'php/connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOED-Mobile Offline Education</title>
    <script src="script/sweetalert2@11.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
        }

        header {
            background-color: rgb(128, 0, 0);
            color: white;
            padding: 20px;
            text-align: center;
        }

        header img {
            max-width: 200px;
            height: auto;
            margin-bottom: -30px;
        }

        .container {
            width: 60%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        h1, h2 {
            margin: 20px 0;
        }

        p {
            line-height: 1.6;
        }

        .benefits {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        
        .login-section {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(128, 0, 0);
            margin: 30px 0;
            text-align: center;
        }

        .login-section h3 {
            color: rgb(128, 0, 0);
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus {
            border-color: rgb(128, 0, 0);
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background-color: rgb(128, 0, 0);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .login-btn:hover {
            background-color: rgb(162, 72, 87);
        }

        .admin-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .admin-link a {
            color: rgb(128, 0, 0);
            text-decoration: none;
        }

        .admin-link a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: rgb(128, 0, 0);
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            h1 {
                font-size: 1.8em;
            }

            h2 {
                font-size: 1.5em;
            }

            p {
                font-size: 0.9em;
            }

            .login-section {
                padding: 20px;
                margin: 20px 0;
            }
        }

        @media (max-width: 480px) {
            header {
                padding: 15px;
            }

            h1 {
                font-size: 1.5em;
            }

            h2 {
                font-size: 1.3em;
            }

            p {
                font-size: 0.85em;
            }

            footer {
                padding: 8px;
            }

            .login-section {
                padding: 15px;
            }
        }

        .info-note {
            background: #a80000;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            font-size: 14px;
            color: #ffffff;
            border-left: 4px solid #480707;
        }

        .password-toggle {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 14px;
        }
    </style>
    <script>
        function validateLRN(event) {
            const lrnInput = document.getElementById('lrn');
            const lrnValue = lrnInput.value;

            if (lrnValue.length > 12) {
                lrnInput.value = lrnValue.slice(0, 12);
            }

            if (!/^\d*$/.test(lrnValue)) {
                lrnInput.value = lrnValue.replace(/[^0-9]/g, '');
            }
        }

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleText = document.getElementById('toggleText');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleText.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleText.textContent = 'Show';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const lrnInput = document.getElementById('lrn');
            if (lrnInput) {
                lrnInput.addEventListener('input', validateLRN);
            }
        });
    </script>
</head>
<body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Data Privacy Act Consent',
            html: `
                <p>By using the MOED module, you agree to the collection, processing, and storage of your personal data (such as LRN, quiz responses, and login details) in accordance with the Data Privacy Act of 2012 (Republic Act No. 10173) and DepEd policies. This data will be used solely for educational purposes, assessment, and improvement of the platform. Your data will be kept confidential and secure.</p>
                <p>If you disagree, you will not be able to proceed with using MOED.</p>
            `,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Agree',
            cancelButtonText: 'Disagree',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (!result.isConfirmed) {
                
                location.href = 'about:blank';
            }
            
        });
    });
</script>
<header>
    <img src="mo ED.png" alt="MOED Logo">
    <h1>Mobile Offline Education</h1>
    <h2>Offline Digital Assessment</h2>
    <h3></h3>
</header>

<div class="container">
    
    <section class="login-section">
        <h3>Student Login</h3>
        <p>Enter your credentials to access your dashboard</p>
        
        <form id="studentForm" method="POST" action="student_login.php" class="login-form">
            <?php
            $form_data = $_SESSION['form_data'] ?? null;
            ?>
            
            <input type="text" name="lrn" id="lrn" pattern="\d{12}" maxlength="12" required 
                   title="Please enter exactly 12 digits." 
                   placeholder="Learner Reference Number (LRN)" 
                   value="<?php echo htmlspecialchars($form_data['lrn'] ?? ''); ?>">

            <div class="password-toggle">
                <input type="password" name="password" id="password" required 
                       placeholder="Password">
                <span class="toggle-password" onclick="togglePassword()">
                    <span id="toggleText">Show</span>
                </span>
            </div>

            <button type="submit" name="proceed" class="login-btn">Login</button>
        </form>
    
        
        <div class="info-note">
            <strong>Note:</strong> Your account must be pre-registered by your teacher. 
            Contact your teacher if you cannot access your account or forgot your password.
        </div>
        
        <div class="admin-link">
            <a href="admin_checkpoint.php">Teacher/Admin Login</a>
        </div>
    </section>

    <section>
        <h1>Welcome to MOED</h1>
		
        <p>The MOED(MOBILE OFFLINE EDUCATION) platform uses offline digital technology to deliver interactive, engaging, and effective assessments that closely replicate the online test-taking experience without requiring an active internet connection. This allows students to complete digital tests on devices such as tablets or laptops entirely offline.</p>
    </section>

    <section class="benefits">
        <h2>Benefits of MOED</h2> 
		
       	    <ul><li>Improved Accessibility.</li>
            <li>Enhanced Learning Experience.</li>
            <li>Efficient Data Management.</li>
            <li>Instant Feedback.</li>
            <li>Increased Security.</li>
            <li>Cost-Effective.</li>
            <li>Scalability and Flexibility.</li>
            <li>Reduced Environmental Impact.</li>
        </ul>
    </section>

    <section>
        <h2>Contact Us</h2>
        <p>If you have any questions or need assistance, please contact us:</p>
        <p>Email: <a href="mailto:kevin.mendoza001@deped.gov.ph">smartel solutions by KYROSS PHILIPPINES CO.</a></p>
        <p>Phone: 0956-133-8720</p>

    </section>
</div>

<footer>
    <p>&copy; 2026 MOED-Mobile Offline Education. All rights reserved.</p>
</footer>

<script>
    const links = document.querySelectorAll('a');
    links.forEach(link => {
        link.removeAttribute('target');
    });
</script>

</body>
</html>

<?php
if (isset($_GET['error'])) {
    $error_message = '';
    switch ($_GET['error']) {
        case 'student_not_found':
            $error_message = 'Invalid LRN or password. Please check your credentials.';
            break;
        case 'invalid_password':
            $error_message = 'Invalid password. Please try again.';
            break;
        case 'missing_fields':
            $error_message = 'Please fill in all required fields.';
            break;
        case 'system_error':
            $error_message = 'A system error occurred. Please try again later.';
            break;
        default:
            $error_message = 'An error occurred. Please try again.';
    }
    
    echo "<script>
        Swal.fire({
            title: 'Error!',
            text: '$error_message',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>";
}
?>