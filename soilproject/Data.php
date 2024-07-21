<!DOCTYPE html>
<?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['Username'])){
        header("Location: login.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA</title>
</head>
<body>
<?php 
    if(!$conn){
        die("cannot connect");
    } else {
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['Show_Data'])){
                
                $query="Select * from record";
                $result=mysqli_query($conn,$query);
                $n=mysqli_num_rows($result);
                ?>
                <div class="w-full flex justify-center items-center">
                    <div class="w-[50vw] h-[50vh] ">
                        <canvas id="moistureChart"></canvas>
                    </div>
                </div>


                <div class="w-full mt-10">
                <div class="bg-[#ccc]">
                <div class="w-full h-full flex justify-center items-center">
                <table class="w-full p-5 bg-white table-auto shadow-lg rounded-md overflow-hidden">
                <thead class="bg-[#6e7bd9] text-[#fff]">
                <tr class="text-center">
                <th class="py-3 border-r-[1px] border-[#6e7b10]">Date Time</th>
                <th class="py-3 border-r-[1px] border-[#6e7b10]">Moisture Level</th>
                <th class="py-3 border-r-[1px] border-[#6e7b10]">Pump Status</th>
                </tr>
                </thead>
                <?php
                for($i=0;$i<$n;$i++){
                    $res=mysqli_fetch_assoc($result);
                    // var_dump($res);
                    ?>
                    <tbody class="text-center font-bold">
                    <tr class="border-b-2">
                        <td class="py-4 hover:bg-slate-50 border-r-[1px]"><?php echo $res['TimeDate']?></td>
                        <td class="py-4 hover:bg-slate-50 border-r-[1px]"> <?php echo $res['MoistureLevel']?></td>
                        <td class="py-4 hover:bg-slate-50 border-r-[1px]"> <?php echo $res['PumpStatus']?></td>
                    </tr>
                    </tbody>
                
                <?php
                }
                ?>
                </table>
            </div>
            
                <?php
            }
        }
    }
?>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
    $sql = "SELECT MoistureLevel, TimeDate FROM record ORDER BY TimeDate DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    
    // loop through the result set and store the data in arrays
    $moisture_data = array();
    $datetime_data = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $moisture_data[] = $row['MoistureLevel'];
        $datetime_data[] = $row['TimeDate'];
    }

    // reverse the arrays to show the data in chronological order
    $moisture_data = array_reverse($moisture_data);
    $datetime_data = array_reverse($datetime_data);

    // var_dump($moisture_data);
    // var_dump($datetime_data);
?>

<script>
        var ctx = document.getElementById('moistureChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($datetime_data); ?>,
                datasets: [{
                    label: 'Sales',
                    data: <?php echo json_encode($moisture_data); ?>,
                    fill: false,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'MoistureLevel'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'TimeDate'
                        }
                    }
                }
            }
        });
    </script>

</html>