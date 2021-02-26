<?php
    // Message Vars
    $msg = '';
    $msgClass= '';

    // check for submit
    if(filter_has_var(INPUT_POST,'submit')){
        // Get form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        //Check required fields
        if(!empty($email) && !empty($name) && !empty($message)){
            // Passed
            // check email
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                // Failed
                $msg = 'Please use a valid email';
                $msgClass = 'flex items-center bg-yellow-500 text-white text-sm font-bold px-4 py-3';
            } else {
                // Passed
                // Recipient Email
                $toEmail = 'a.mchichi@laposte.net';
                $subject = 'contact Request From'.$name;
                $body = '<h2>Contact Request</h2>
                        <h4>Name</h4><p>'.$name.'</p>
                        <h4>Email</h4><p>'.$email.'</p>
                        <h4>Message</h4><p>'.$message.'</p>
                        ';
                // Email headers
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

                // additional headers
                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                if(mail($toEmail, $subject, $body, $headers)){
                    // Email Sent
                    $msg = 'Your email has been sent';
                    $msgClass ='flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3';
                } else {
                    $msg = 'Your email was NOT sent';
                    $msgClass ='flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3';
                }
            }
        } else {
            // Failed
            $msg = 'Please fill in all fields';
            $msgClass = 'flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3';
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Ayoub Mchichi</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body class="antialiased relative text-gray-600">
    <?php if($msg != ''):  ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>
        <div class="absolute w-full min-h-screen">
            <div
                class="absolute z-0 top-0 w-full h-1/2 bg-cover bg-bottom pt-20 px-12 text-white text-center"
                style="background-image: url('images/background.jpg')"
            ></div>
            <!--<div
                class="absolute z-20 bottom-10 right-0 left-0 inline-flex space-x-20 justify-center font-bold uppercase tracking-wide text-gray-600"
            >
                <a href="#" class="hover:text-cyan-600">Services</a>
                <a href="#" class="hover:text-cyan-600">Work</a>
                <a href="#" class="hover:text-cyan-600">Experience</a>
                <a href="#" class="hover:text-cyan-600">Contact</a>
            </div>-->
        </div>
        <div
            class="relative z-10 flex min-h-screen h-auto justify-center items-center"
        >
            <div class="relative max-w-4xl">
                <div
                    class="absolute z-10 inset-0 bg-gradient-to-r from-cyan-400 to-emerald-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-lg"
                ></div>
                <div
                    class="relative z-20 bg-white md:flex justify-between p-12 shadow-lg rounded-lg w-full max-w-4xl"
                >
                    <div
                        class="sm:flex flex-col justify-between space-y-6 py-6 md:pr-10"
                    >
                        <div>
                            <h2 class="text-lg">Bonjours, Je suis</h2>
                            <h1 class="pt-1 text-5xl font-bold text-gray-800">
                                Ayoub Mchichi
                            </h1>
                        </div>
                        <p class="text-xl leading-relaxed">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel iure delectus, possimus nulla neque officia voluptatem fuga tempora eos quis aliquam!
                        </p>
                        <div
                            class="inline-flex text-xl text-gray-600 space-x-5"
                        >
                            <a href="#"
                                ><ion-icon
                                    name="logo-youtube"
                                    class="hover:text-red-600"
                                ></ion-icon
                            ></a>
                            <a href="#"
                                ><ion-icon
                                    name="logo-twitter"
                                    class="hover:text-blue-500"
                                ></ion-icon
                            ></a>
                            <a href="#"
                                ><ion-icon
                                    name="logo-linkedin"
                                    class="hover:text-blue-700"
                                ></ion-icon
                            ></a>
                            <a href="#"
                                ><ion-icon
                                    name="logo-github"
                                    class="hover:text-blue-500"
                                ></ion-icon
                            ></a>
                        </div>
                    </div>
                    <img
                        src="images/portfolio_img.jpg"
                        alt=""
                        class="flex-shrink-0 w-80 rounded-full border-8 border-white shadow-md"
                    />
                </div>
            </div>
        </div>
        <!-- services section -->
        <section class="bg-gray-50 pt-20 pb-28 px-8">
            <div class="max-w-6xl mx-auto">
                <div class="text-center">
                    <h1 class="text-6xl font-bold text-gray-800">Services</h1>
                    <p class="pt-2">Voici ce que j'offre</p>
                </div>
                <div
                    class="mt-24 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20"
                >
                    <div class="relative">
                        <div
                            class="absolute z-10 inset-0 bg-gradient-to-r from-cyan-400 to-emerald-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-lg"
                        ></div>

                        <div
                            class="relative z-20 bg-white h-full rounded-md shadow-md px-10 py-12"
                        >
                            <ion-icon
                                name="phone-portrait-outline"
                                class="text-5xl text-cyan-500"
                            ></ion-icon>
                            <h2 class="pt-3 font-bold text-2xl">
                                RESPONSIVE DESIGN
                            </h2>
                            <p class="pt-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Consequuntur aperiam quibusdam
                                repudiandae et necessitatibus culpa libero
                                mollitia.
                            </p>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute z-10 inset-0 bg-gradient-to-r from-cyan-400 to-emerald-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-lg"
                        ></div>

                        <div
                            class="relative z-20 bg-white h-full rounded-md shadow-md px-10 py-12"
                        >
                            <ion-icon
                                name="layers-outline"
                                class="text-5xl text-cyan-500"
                            ></ion-icon>
                            <h2 class="pt-3 font-bold text-2xl">Web Apps</h2>
                            <p class="pt-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Consequuntur aperiam quibusdam
                                repudiandae et necessitatibus culpa libero
                                mollitia.
                            </p>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute z-10 inset-0 bg-gradient-to-r from-cyan-400 to-emerald-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-lg"
                        ></div>

                        <div
                            class="relative z-20 bg-white h-full rounded-md shadow-md px-10 py-12"
                        >
                            <ion-icon
                                name="chatbubbles-outline"
                                class="text-5xl text-cyan-500"
                            ></ion-icon>
                            <h2 class="pt-3 font-bold text-2xl">
                                RÉFÉRENCEMENT 
                            </h2>
                            <p class="pt-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Consequuntur aperiam quibusdam
                                repudiandae et necessitatibus culpa libero
                                mollitia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-20 px-8">
            <div class="max-w-6xl mx-auto">
                <div class="text-center">
                    <h1 class="text-6xl font-bold text-gray-800">Work</h1>
                    <p class="pt-2">The best of my works</p>
                </div>
                <div
                        class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-14"
                >
                    <div class="bg-white rounded-md shadow-md lg:col-span-2">
                        <img
                                src="images/work1.jpg"
                                alt=""
                                class="object-cover w-full h-80"
                        />
                        <div class="p-8">
                            <h3 class="font-bold text-2xl">Work Title</h3>
                            <p class="pt-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Repellat sequi minima vero
                                sunt perferendis.
                            </p>
                            <a
                                    href="#"
                                    class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-cyan-400 to-emerald-400 rounded-md shadow-md text-sm font-bold text-white"
                            >View More</a
                            >
                        </div>
                    </div>
                    <div class="bg-white rounded-md shadow-md">
                        <img
                                src="images/work2.jpg"
                                alt=""
                                class="object-cover w-full h-80"
                        />
                        <div class="p-8">
                            <h3 class="font-bold text-2xl">Work Title</h3>
                            <p class="pt-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit.
                            </p>
                            <a
                                    href="#"
                                    class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-cyan-400 to-emerald-400 rounded-md shadow-md text-sm font-bold text-white"
                            >View More</a
                            >
                        </div>
                    </div>
                    <div class="bg-white rounded-md shadow-md">
                        <img
                                src="images/work3.jpg"
                                alt=""
                                class="object-cover w-full h-80"
                        />
                        <div class="p-8">
                            <h3 class="font-bold text-2xl">Work Title</h3>
                            <p class="pt-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit.
                            </p>
                            <a
                                    href="#"
                                    class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-cyan-400 to-emerald-400 rounded-md shadow-md text-sm font-bold text-white"
                            >View More</a
                            >
                        </div>
                    </div>
                    <div class="bg-white rounded-md shadow-md lg:col-span-2">
                        <img
                                src="images/work4.jpg"
                                alt=""
                                class="object-cover w-full h-80"
                        />
                        <div class="p-8">
                            <h3 class="font-bold text-2xl">Work Title</h3>
                            <p class="pt-3">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Repellat sequi minima vero
                                sunt perferendis.
                            </p>
                            <a
                                    href="#"
                                    class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-cyan-400 to-emerald-400 rounded-md shadow-md text-sm font-bold text-white"
                            >View More</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact section -->
        <section class="pt-20 pb-36 px-8 bg-gray-50">
            <div class="max-w-6xl mx-auto">
                <div class="text-center">
                    <h1 class="text-6xl font-bold text-gray-800">Contact</h1>
                    <p class="pt-2">Get in touch with me</p>
                </div>
            </div>
            <div class="mt-16 relative max-w-4xl mx-auto">
                <div
                        class="absolute z-10 inset-0 bg-gradient-to-r from-cyan-400 to-emerald-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-lg"
                ></div>
                <div class="relative z-20 bg-white rounded-md shadow-md p-12">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6"
                        >
                            <input
                                    type="text"
                                    name="name"
                                    value="<?php  echo isset($_POST['name']) ? $name : ''; ?>"
                                    placeholder="Name"
                                    class="border border-gray-200 outline-none px-4 py-2 rounded-md hover:border-gray-400 focus:border-gray-400"
                            />
                            <input
                                    type="text"
                                    name="email"
                                    value="<?php  echo isset($_POST['email']) ? $email : ''; ?>"
                                    placeholder="Email"
                                    class="border border-gray-200 outline-none px-4 py-2 rounded-md hover:border-gray-400 focus:border-gray-400"
                            />
                            <input
                                    type="text"
                                    placeholder="Subject"
                                    class="border border-gray-200 outline-none px-4 py-2 rounded-md hover:border-gray-400 focus:border-gray-400 md:col-span-2"
                            />
                            <textarea
                                    rows="5"
                                    placeholder="Message"
                                    name="message"
                                    class="border border-gray-200 outline-none px-4 py-2 rounded-md hover:border-gray-400 focus:border-gray-400 md:col-span-2"
                            ><?php  echo isset($_POST['message']) ? $message : ''; ?></textarea>
                        </div>
                        <button
                                type="submit"
                                name="submit"
                                class="inline-block w-auto mt-4 px-6 py-2 bg-gradient-to-r from-cyan-400 to-emerald-400 rounded-md shadow-md text-sm font-bold text-white"
                        >
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!-- icons script -->
        <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>