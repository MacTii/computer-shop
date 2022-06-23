<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Computer-Tech</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
    <link rel="stylesheet" href="css/style-login.css">

</head>

<body>
    <form action="action_login.php" method="post">
        <!-- partial:index.partial.html -->
        <div class="screen-1">
            <svg class="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="300" height="300" viewbox="0 0 640 480" xml:space="preserve">
                <g transform="matrix(3.31 0 0 3.31 320.4 240.4)">
                    <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: #20c997; fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
                </g>
                <g transform="matrix(0.98 0 0 0.98 268.7 213.7)">
                    <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
                </g>
                <g transform="matrix(1.01 0 0 1.01 362.9 210.9)">
                    <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
                </g>
                <g transform="matrix(0.92 0 0 0.92 318.5 286.5)">
                    <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
                </g>
                <g transform="matrix(0.16 -0.12 0.49 0.66 290.57 243.57)">
                    <polygon style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
                </g>
                <g transform="matrix(0.16 0.1 -0.44 0.69 342.03 248.34)">
                    <polygon style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
                </g>
            </svg>

            <div class="user">
                <label for="user">Username</label>
                <div class="sec-2">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="user" placeholder="Enter username" />
                </div>
            </div>

            <div class="password">
                <label for="password">Password</label>
                <div class="sec-2">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input class="pas" type="password" name="pass" placeholder="Enter password" />
                    <!-- <ion-icon class="show-hide" name="eye-outline"></ion-icon> -->
                </div>
            </div>

            <button class="login" name="login" value="login">Login</button>
            <div class="footer">
                <span>
                    <a href="panel_register.php">Sign up</a>
                </span>
                <span>
                    <a href="index.html">Back to home</a>
                </span>
            </div>
            <div>
                <?php if (isset($_GET['error'])) { ?>

                    <p class="error">
                        <?php
                        echo $_GET['error'];
                        ?>
                    </p>

                <?php } ?>
            </div>
        </div>
    </form>
    <!-- partial -->
</body>

</html>