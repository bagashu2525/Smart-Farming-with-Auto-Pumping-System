<?php
include('config.php');
?>
<?php
if(!$conn){
    die("cannot connect");
}
else{
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['loginrec'])){
            $query="Select Username from register where Username='".$_POST['username']."' and Password='".$_POST['password']."';";
            $result=mysqli_query($conn,$query);
            $res=0; 
            $res= mysqli_fetch_assoc($result);
            echo $query;
            echo $res['Username'];

            if($res>0){
                session_start();
                $_SESSION['Username']=$res['Username'];;
                echo "hello";
                header("Location: detail.php");
            }
            else{
                //header("Location: login.php");
                ?>
                <h3 style="color:red">Password is incorrect</h3>
                <?php
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/input.css">
    <title>Login</title>
</head>
<body class="bg-[#e2e0e0e6]">
    <div class="md:px-20 bg-[#e2e0e0e6] w-screen">
        <section class="h-screen w-full">
            <div class="h-full w-full">
                <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                    <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                        <img src="login.svg"
                            class="w-full" alt="Sample image" />
                    </div>
                    <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                        <form action="#" method="post">
                            <!-- Email input -->
                            <div class="relative mb-6 bg-white rounded" data-te-input-wrapper-init>
                                <input type="text"
                                    class="text-black peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                                    id="exampleFormControlInput2" placeholder="Username" name="username" />
                                </label>
                            </div>

                            <!-- Password input -->
                            <div class="relative mb-6 bg-white rounded" data-te-input-wrapper-init>
                                <input type="password"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                                    id="exampleFormControlInput22" placeholder="Password" name="password" />
                                </label>
                            </div>

                            <!-- <div class="mb-6 flex items-center justify-between">
                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                    <input
                                        class="relative float-left mt-[0.15rem] mr-[6px] -ml-[1.5rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-blue-400 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:ml-[0.25rem] checked:after:-mt-px checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-t-0 checked:after:border-l-0 checked:after:border-solid checked:after:border-blue-400 checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:ml-[0.25rem] checked:focus:after:-mt-px checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-t-0 checked:focus:after:border-l-0 checked:focus:after:border-solid checked:focus:after:border-blue-400 checked:focus:after:bg-transparent dark:checked:border-primary dark:checked:bg-primary"
                                        type="checkbox" value="" id="exampleCheck2" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="exampleCheck2">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#!">Forgot password?</a>
                            </div> -->

                            <div class="text-center lg:text-left">
                                <button type="submit"
                                    class="inline-block rounded bg-primary px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal bg-white text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                                    data-te-ripple-init data-te-ripple-color="light" name="loginrec">
                                    Login
                                </button>
                                <p class="mt-2 mb-0 pt-1 text-sm font-semibold">
                                    Don't have an account?
                                    <a href="signup.php"
                                        class="text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700 hover:text-blue-600">Register</a>
                                </p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>