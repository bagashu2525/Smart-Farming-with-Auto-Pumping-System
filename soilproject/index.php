<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./public/css/input.css">
    <link rel="stylesheet" href="style1.css">
    <style>
        ::-webkit-scrollbar {
            display :none;
        }
    </style>
</head>
<body>
    
    <div class="flex justify-center items-center overflow-y-hidden w-screen w-full h-screen bg-no-repeat bg-cover"
        style="flex-direction: column; background-image: url('farmingbg.jpg'); background-attachment: fixed;" >
        <!--<div class="object-cover flex justify-center items-center">
            <img src="farmingbg.jpg" class="" alt="">
        </div> class="flex column justify-center items-center overflow-y-hidden w-screen h-screen"-->
        <div class="bg-[#6f492e85] rounded-lg text-white absolute mx-10 w-3/5 p-5 shadow-2xl">
            <div class="flex flex-row justify-between items-center p-5 gap-3 h-full">
                <div class="w-full h-full p-5">
                    <h1 class="text-[2.9rem] font-extrabold">Smart Farming and Auto-pumping Monitoring System</h1>
                </div>
                <div class=" w-full flex justify-center py-10">
                    <ul class="flex w-[50%] font-bold text-lg justify-start flex-col gap-12">
                        <a href="login.php" class="hover:text-2xl duration-100 border-b-2 border-b-gray-400 "><li>Login</li></a>
                        <a href="signup.php" class="hover:text-2xl duration-100 border-b-2 border-b-gray-400 "><li>Sign Up</li></a>
                        <a href="#aboutsec" class="hover:text-2xl duration-100 border-b-2 border-b-gray-400 "><li>About</li></a>
                        <a href="#scopesec" class="hover:text-2xl duration-100 border-b-2 border-b-gray-400 "><li>Scope</li></a>
                        <a href="#contactsec" class="hover:text-2xl duration-100 border-b-2 border-b-gray-400 "><li>Contact</li></a>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>  
    <div id="aboutsec" class="h-screen">
        <h1 class="text-[2.9rem] font-extrabold">ABOUT</h1>
        <div class="about">
            <div class="text-[1.7rem] w-[50%] font-bold">The mission of our site is to keep a detailed study or tracking of soil moisture and with respect to that the on/off status of automated water pump in a farm all day. Here this details of tracking is represented by a simple table and a graph which plots the moisture level and pump status across the time in a day. So, our site make the monitoring of Soil moisture easy and fruitful. Our main moto is to track the soil moisture throughout the day which might be in use in near future.</div>
            <div ><img src="farm.jpeg"></div>
        </div>
    </div>
    <div id="scopesec">
        <h1 class="text-[2.9rem] font-extrabold">SCOPE OF OUR HARDWARE PROJECT</h1>
        <div class="aboutsec2">
        <div class="aboutsec3">
                <img class="aimg" src="download (1).jpg"><br>
                <p class="norm">Water pumping in the huge area by any person can be a difficult function. So in future this can be effective in the purpose of agriculture.
</p>

            </div>
            <div class="aboutsec3">
                <img class="aimg" src="download.jpg"><br>
                <p class="norm">The primary function of our project is to have a landscape irrigation system which ensures that water is spread regularly, timely and evenly throughout any given landscape.
</p>

            </div>
            <div class="aboutsec3">
                <img class="aimg" src="NEWS2FARMER.jpg"><br>
                <p class="norm">It is being made in very low cost. So that can be effective for farmers
</p>

            </div>
            <div class="aboutsec3">
                <img class="aimg" src="images (1).jpg"><br>
                <p class="norm">In the case of gardener, this system is very useful.
</p>

            </div>
        </div>
    </div>
    <div id="contactsec" style="color:rgb(10, 78, 26)">
        <h1 class="text-[2.9rem] font-extrabold">CONTACT</h1>
        <div class="flex justify-around items-center">
        <div>
        <h1 class="text-[1.9rem] font-extrabold">Address</h1>
        <h1 class="text-[1.0rem] font-extrabold">33 eden Hospita Rd,Kolakata 54</h1>
        <h1 class="text-[1.9rem] font-extrabold">Contact</h1>
        <h1 class="text-[1.0rem] font-extrabold">8697367941<br>7439338600<br>6290517059</h1>
        <h1 class="text-[1.9rem] font-extrabold">Email</h1>
        <h1 class="text-[1.0rem] font-extrabold">shrobonasil@gmail.com</h1>
        <h1 class="text-[1.9rem] font-extrabold">Linkdin account</h1>
        <h1 class="text-[1.0rem] "><a href="https://www.linkedin.com/in/kaushik-das-79107421b">https://www.linkedin.com/in/kaushik-das-79107421b</a></h1>
        </div>
        <img src="kk.png" alt="">
</div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>