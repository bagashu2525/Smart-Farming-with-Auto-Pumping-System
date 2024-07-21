<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/input.css">
    <title>Sign up</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <div class="container md:px-20">
        <section class="h-screen">
            <div class="h-full">
                <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                    <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                        <img src="signup.webp"
                            class="w-full" alt="Sample image" />
                    </div>
                    <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                        <form action="#" method="post">
                            <!-- Name input -->
                            <div class="relative mb-6 bg-white rounded" data-te-input-wrapper-init>
                                <input type="text"
                                    class="text-black peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                                    id="exampleFormControlInput2" placeholder="USERNAME" name="username" style="border: 2px solid" required/>
                                </label>
                            </div>

                            <!-- Designation input -->
                            <div class="relative mb-6 bg-white rounded" data-te-input-wrapper-init>
                                <input type="text"
                                    class="text-black peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                                    id="exampleFormControlInput2" placeholder="DESIGNATION" name="designation" style="border: 2px solid" required/>
                                </label>
                            </div>

                            <!-- Age input -->
                            <div class="relative mb-6 bg-white rounded" data-te-input-wrapper-init>
                                <input type="number"
                                    class="text-black peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                                    id="exampleFormControlInput2" placeholder="AGE" name="age" style="border: 2px solid" required/>
                                </label>
                            </div>

                            <!-- Address input -->
                            <div class="relative mb-6 bg-white rounded" data-te-input-wrapper-init>
                                <input type="text"
                                    class="text-black peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                                    id="exampleFormControlInput2" placeholder="ADDRESS" name="address" style="border: 2px solid" required/>
                                </label>
                            </div>

                            <!-- Password input -->
                            <div class="relative mb-6 bg-white rounded" data-te-input-wrapper-init>
                                <input type="password"
                                    class="text-black peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                                    id="exampleFormControlInput2" placeholder="PASSWORD" name="password" style="border: 2px solid" required/>
                                </label>
                            </div>

                            <div class="text-center lg:text-left">
                                <button type="submit"
                                    class="inline-block rounded bg-primary px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal bg-white text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                    data-te-ripple-init data-te-ripple-color="light" name="datasubmit">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    if(!$conn){
        die("cannot connect");
    }
    else{
        $result=0;
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['datasubmit'])){
                $query="insert into register values('".$_POST['username']."','".$_POST['designation']."',".$_POST['age'].",'".$_POST['address']."','".$_POST['password']."');";
                try{
                    $result=mysqli_query($conn,$query);
                }
                catch(Exception $e){
                    ?>
                    <script>
                        alert('Username unavailable!');
                    </script>
                    <?php
                }
                //echo $query;
                if($result){
                    ?>
                    <script>
                        alert('Successfully Registered');
                    </script>
                    <?php
                    header("Location: login.php");
                }
            }
        }
    }
    ?>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>