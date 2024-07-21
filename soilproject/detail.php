<?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['Username'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    ::-webkit-scrollbar{
      display: none;
    }
  </style>
</head>
<body class="w-screen flex justify-center items-center flex-col">
    <?php 
    if(!$conn){
        die("cannot connect");
    }
    else{
                $query="Select * from register where username='".$_SESSION['Username']."';";
                $result=mysqli_query($conn,$query);
                $res= mysqli_fetch_assoc($result);
                // var_dump($res)
                // echo $res['fname'];
                // echo $res['sno'];
                // echo $res['address'];
                ?>
                <!-- <table border="2" height="20%" width="40%">
                    <th>Username</th>
                    <th>Designation</th>
                    <th>Age</th>
                    <th>Address</th>
                    <tr>
                        <td>
                        <?php echo $res['username']?>
                        </td>
                        <td>
                            <?php echo $res['Designation']?>
                        </td>
                        <td>
                            <?php echo $res['Age']?>
                        </td>
                        <td>
                            <?php echo $res['Address']?>
                        </td>
                    </tr>
                </table> -->
                <div class="container w-screen lg:h-screen p-2">
    <div class="w-full h-full flex justify-center items-center flex-col gap-10">
      <h1 class="text-5xl font-bold text-center">Welcome to your Dashboard</h1>
      <p>This page contains all your details</p>
      <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-10 transition-all">
        <div class="w-[300px] h-[300px] bg-[#ccc] shadow-md  rounded-lg border-b-8 border-[#2b9fb7]">
          <div class="flex justify-between items-center p-5 flex-col h-full gap-10">
            <h2 class="uppercase text-center text-[2.5rem] font-bold">your username is</h2>
            <p class="text-xl"> <?php echo $res['username']?></p>
          </div>
        </div>
        <div class="w-[300px] h-[300px] bg-[#ccc] shadow-md  rounded-lg border-b-8 border-[#2b9fb7]">
          <div class="flex justify-between items-center p-5 flex-col h-full gap-10">
            <h2 class="uppercase text-center text-[2.5rem] font-bold">your designation is</h2>
            <p class="text-xl"><?php echo $res['designation']?></p>
          </div>
        </div>
        <div class="w-[300px] h-[300px] bg-[#ccc] shadow-md  rounded-lg border-b-8 border-[#2b9fb7]">
          <div class="flex justify-between items-center p-5 flex-col h-full gap-10">
            <h2 class="uppercase text-center text-[2.5rem] font-bold">your address is</h2>
            <p class="text-xl"><?php echo $res['address']?></p>
          </div>
        </div>
        <div class="w-[300px] h-[300px] bg-[#ccc] shadow-md rounded-lg border-b-8 border-[#2b9fb7]">
          <div class="flex justify-between items-center p-5 flex-col h-full gap-10">
            <h2 class="uppercase text-center text-[2.5rem] font-bold">your age is</h2>
            <p class="text-xl"><?php echo $res['age']?></p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
                <?php
            }

    ?>
    <form method='post'>
    <div class="w-screen px-[4.4vw] flex justify-between items-center">
        <button class="bg-[#14bdeedb] text-[#000] py-2 px-3 text-lg font-bold rounded-full shadow-md" formaction="Data.php" name="Show_Data">Show Data</button>
        <button class="bg-[#d00e2cf0] text-[#fff] py-2 px-3 text-lg font-bold rounded-full shadow-md" name="logout">Logout</button>
      </div>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['logout'])){
                unset($_SESSION['sno']);
                session_destroy();
                header("Location: index.php");
            }
        }
    ?>
</body>
</html>