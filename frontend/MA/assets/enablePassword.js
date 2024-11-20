const pagePassword = "MA123"; // Replace with your actual page password

        function showPasswordInput(regNo) {
            document.getElementById('lock-' + regNo).style.display = 'none';
            document.getElementById('input-' + regNo).style.display = 'inline';
        }

        function checkPassword(regNo) {
            var input = document.getElementById('input-' + regNo).value;
            if (input === pagePassword) {
                document.getElementById('input-' + regNo).style.display = 'none';
                var passwordField = document.getElementById('password-' + regNo);
                passwordField.type = 'text';
                passwordField.style.display = 'inline';
            }
        }

        // Add event listener to detect clicks outside the password field
        window.onclick = function (event) {
            if (!event.target.matches('.bi-lock-fill') && !event.target.matches('.input-password')) {
                var passwords = document.querySelectorAll('.password-field');
                var inputs = document.querySelectorAll('.input-password');

                passwords.forEach(function (password) {
                    password.style.display = 'none';
                    password.type = 'password'; // reset to password type
                });

                inputs.forEach(function (input) {
                    input.style.display = 'none';
                });

                var locks = document.querySelectorAll('.bi-lock-fill');
                locks.forEach(function (lock) {
                    lock.style.display = 'inline';
                });
            }
        }