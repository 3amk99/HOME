<?php
$student_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        .box {
            width: 900px;
            margin: auto;
        }

        select {
            padding: 8px;
            margin-bottom: 20px;
        }

        canvas {
            background: #fff;
            border: 1px solid #ddd;
            padding: 10px;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>Student Statistics</h2>

    <select id="type">
        <option value="day">Day (08-18)</option>
        <option value="week">Week (36h)</option>
        <option value="month">Month (Sep-Jun)</option>
    </select>

    <canvas id="chart"></canvas>

</div>

<script>
let chart ;
let studentId = <?= $student_id ?> ;

document.getElementById("type").addEventListener("change", loadData);

loadData();

function loadData() 
{

    let type = document.getElementById("type").value;

    fetch("get_stats.php?student_id=" + studentId + "&type=" + type)
    .then(res => res.json())
    .then(data => {

        let labels = [];
        let present = [];
        let absent = [];

        data.forEach(item => 
        {

            if (type == "day")
            {
                labels.push(item.hour + ":00");
            }

            if (type == "week")
            {
                labels.push("Week " + item.week);
            }

            if (type == "month") 
            {
                labels.push("Month " + item.month);
            }

            present.push(item.present);
            absent.push(item.absent);
        });

        if (chart) 
        {
            chart.destroy();
        }

        chart = new Chart(document.getElementById("chart"), 
        {
            type: "bar",
            data: 
            {
                labels: labels,
                datasets: 
                [
                    {
                        label: "Present",
                        data: present,
                        backgroundColor: "green"
                    },

                    {
                        label: "Absent",
                        data: absent,
                        backgroundColor: "red"
                    }
                ]
            }
        });
    });
}
</script>

</body>
</html>