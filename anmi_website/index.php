<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmi Webinar</title>
    <div class="head">
        <a href="https://anmi.in/">
            <img id="logo" src="./img/anmi logo1.jpeg" alt="anmi-logo">
        </a>
    <h1>Association Of <span style="color: red; line-height: 48px;">National Exchanges</span> Members Of India</h1>
    <div class="icon">
        <a href="facebook.com/ANMIOfficial"><img src="./img/facebook icon.png" alt="facebook icon"></a>
        <a href="twitter.com/OfficialAnmi"><img src="img/twitter icon.png" alt="twitter icon"></a>
        <a href="linkedin.com/company/anmi"><img src="img/linkedin icon.png" alt="linkedin icon"></a>
        <a href="instagram.com/anmiofficial?igsh=NWhqOXBhajZvYWo2"><img src="img/instagram icon.png" alt="instagram icon"></a>
        <a href="https://www.youtube.com/@anmi"><img src="img/youtube icon.png" alt="youtube icon"></a>
    </div>
    </div>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <h2 class="tittle">Webinar Registration</h2>
        <input type="hidden" id="year_val" name="year_val">
        <p class="subtittle">
            <b>Webinar and events conducted by Anmi for progress of stakeholder of capital market.</b>
        </p>
        <hr>
        <p class="content">
            Every month Anmi conducts several webinars on various market related themes which affect the member brokers and capital market, in general. The webinars have speakers from various regulatory bodies like RBI, SEBI and MIIs.
        </p>
    </div>

    <!-- <div class="timeline">
        <div class="year" onclick="filterYear(2024)">2024</div>
        <div class="year" onclick="filterYear(2025)">2025</div>
        <div class="year" onclick="filterYear(2026)">2026</div>
        <div class="year" onclick="filterYear(2027)">2027</div>
        <div class="year" onclick="filterYear(2028)">2028</div>
        <div class="year" onclick="filterYear(2029)">2029</div>
        <div class="year" onclick="filterYear(2030)">2030</div>
    </div>

    <div class="filters">
        <label for="month">Month:</label>
        <select id="month" onchange="filterMonth()">
            <option value="all">Select Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
    </div> -->

    <table id="webinarTable">
        <thead>
            <tr>
                <th>Webinar No.</th>
                <th>Webinar / Seminar</th>
                <th>Date/Time/Day</th>
                <th>In association with</th>
                <th>Category</th>
                <th>Summary & Presentation</th>
                <th>Registration</th>
                <th>Invite</th>
                <th>YouTube</th>
                <th>View Photos</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        let selectedYear = new Date().getFullYear();
        let selectedMonth = 0; // 0 means all months

        function fetchWebinars() {
            // const queryParams = [];
            // if (selectedYear) queryParams.push(`year=${selectedYear}`);
            // if (selectedMonth) queryParams.push(`month=${selectedMonth}`);
            // const queryString = queryParams.length ? '?' + queryParams.join('&') : '';

            fetch(`fetch_webinars.php${queryString}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.querySelector('#webinarTable tbody');
                    tableBody.innerHTML = '';

                    data.forEach(webinar => {
                        const row = document.createElement('tr');
                        
                        row.innerHTML = `
                            <td>${webinar.webinar_no}</td>
                            <td>${webinar.webinar_seminar}</td>
                            <td>${webinar.date_time_day}</td>
                            <td>${webinar.association}</td>
                            <td>${webinar.category}</td>
                            <td>${webinar.summary}</td>
                            <td>${webinar.registration}</td>
                            <td>${webinar.invite}</td>
                            <td>${webinar.youtube}</td>
                            <td>${webinar.photos}</td>
                        `;
                        
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error fetching webinars:', error));
        }

        // function filterYear(year) {
        //     selectedYear = year;
        //     fetchWebinars();
        // }

        // function filterMonth() {
        //     selectedMonth = document.getElementById('month').value;
        //     fetchWebinars();
        // }

        // Fetch webinars for the current year by default
        document.addEventListener('DOMContentLoaded', () => fetchWebinars());
    </script>
</body>
</html>
