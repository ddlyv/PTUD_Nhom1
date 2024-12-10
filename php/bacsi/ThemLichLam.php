<?php include '../layout/header.php'; ?>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 700px;
            margin-top: 50px;
            padding: 20px;
            background-color: #d7e5fa;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .work-day {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .work-day-item {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .form-check-input {
            margin-top: 0;
        }

        .submit-button {
            width: 100%;
            margin-top: 20px;
        }
    </style>

    <div class="container">
        <div class="header">
            <h1 class="h4">Đăng ký lịch làm</h1>
        </div>

        <div class="work-day">
            <div class="work-day-item">
                <input type="checkbox" class="form-check-input" id="saturday">
                <label class="form-check-label" id="saturday-label">09-11-2024</label>
            </div>
            <div class="work-day-item">
                <input type="checkbox" class="form-check-input" id="morning1">
                <label class="form-check-label" for="morning1">Buổi Sáng (7h30 - 11h30)</label>
            </div>
            <div class="work-day-item">
                <input type="checkbox" class="form-check-input" id="afternoon1">
                <label class="form-check-label" for="afternoon1">Buổi Chiều (13h00 - 16h30)</label>
            </div>
            <div class="work-day-item">
                <input type="checkbox" class="form-check-input" id="evening1">
                <label class="form-check-label" for="evening1">Ngoài Giờ (17h00 - 19h30)</label>
            </div>
        </div>

        <div class="work-day">
            <div class="work-day-item">
                <input type="checkbox" class="form-check-input" id="sunday">
                <label class="form-check-label" id="sunday-label">10-11-2024</label>
            </div>
            <div class="work-day-item">
                <input type="checkbox" class="form-check-input" id="morning2">
                <label class="form-check-label" for="morning2">Buổi Sáng (7h30 - 11h30)</label>
            </div>
            <div class="work-day-item">
                <input type="checkbox" class="form-check-input" id="afternoon2">
                <label class="form-check-label" for="afternoon2">Buổi Chiều (13h00 - 16h30)</label>
            </div>
            <div class="work-day-item">
                <input type="checkbox" class="form-check-input" id="evening2">
                <label class="form-check-label" for="evening2">Ngoài Giờ (17h00 - 19h30)</label>
            </div>
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary submit-button">Thêm lịch làm</button>
    </div>

    <script>
        function getWeekendDates() {
            const today = new Date();
            const dayOfWeek = today.getDay();
            const daysUntilSaturday = 6 - dayOfWeek;
            const daysUntilSunday = 7 - dayOfWeek;

            const saturday = new Date(today);
            saturday.setDate(today.getDate() + daysUntilSaturday);

            const sunday = new Date(today);
            sunday.setDate(today.getDate() + daysUntilSunday);

            const options = { day: '2-digit', month: '2-digit', year: 'numeric' };

            document.getElementById("saturday-label").textContent = saturday.toLocaleDateString('en-GB', options);
            document.getElementById("sunday-label").textContent = sunday.toLocaleDateString('en-GB', options);
        }

        // Run the function to set the dates on page load
        getWeekendDates();
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include '../layout/footer.php'; ?>