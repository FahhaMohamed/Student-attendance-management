<style>
    .fade-in-out {
        animation: fadeOut 0.5s forwards;
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    body {
        transition: transform 0.2s;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<div class="sidebar">
    <div class="wrapper">
        <div class="logo">
            <label><img src="https://gitto.tech/cf-logo.png" alt="Logo" width="40px"></label>
        </div>
        <div class="links">
            <div class="link" onclick="navigate('home')">
                <i class="bi bi-house"></i>
                <label>Home</label>
            </div>

            <div class="link" onclick="navigate('approval')">
                <i class="bi bi-check2-circle"></i>
                <label>Approval</label>
            </div>

            <div class="link" onclick="navigate('allocation')">
                <i class="bi bi-folder2-open"></i>
                <label>Course Allocation</label>
            </div>

            <div class="link" onclick="navigate('courses')">
                <i class="bi bi-book"></i>
                <label>Coursers</label>
            </div>

            <div class="link" onclick="navigate('students')">
                <i class="bi bi-mortarboard"></i>
                <label>Students</label>
            </div>

            <div class="link" onclick="navigate('lecturers')">
                <i class="bi bi-people"></i>
                <label>Lecturers</label>
            </div>

        </div>
        <div class="divider"></div>
    </div>
</div>
<script>
    function navigate(page) {

        document.body.classList.add('fade-in-out');


        setTimeout(() => {
            window.location.href = `${page}.php`;
        }, 200);

    }
</script>