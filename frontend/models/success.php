<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.success-box {
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

@keyframes bounce {
    0% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0); }
}

.success-icon {
    width: 400px; /* Adjust the size of the image */
    opacity: 0;
    animation: bounce 1s ease-in-out, fade-in 1s ease-in-out forwards;
}

@keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
}



.success-message {
    padding: 15px;
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    border-radius: 10px;
}

/* Trigger the animation */
.success-box.loaded .success-icon {
    opacity: 1;
}

    </style>
</head>
<body>
    <div class="success-box" id="successBox">
        <img src="../assets/success-icon.png" alt="Success Icon" class="success-icon">
        <div class="success-message">You can login after get approval, Thank you.</div>
    </div>

    <script>
        // Trigger the animation after the page loads
        window.addEventListener('load', function() {
            document.getElementById('successBox').classList.add('loaded');
        });


        // After 3 seconds (adjust as needed), redirect to another page
        setTimeout(function() {
            window.location.href = "../students/pages/auth/login.php";
        }, 3000); // 3000 milliseconds = 3 seconds
    
    </script>
</body>
</html>
