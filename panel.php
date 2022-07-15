<?php
session_start();
if (isset($_SESSION['id'])) {
    ?>

    <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" href="./img/logo_mini.svg" type="image/x-icon"/>
        <script
                src="https://kit.fontawesome.com/0f9536c9fd.js"
                crossorigin="anonymous"
        ></script>
        <link
                rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Audiowide"
        />
        <title>berberim.com</title>
    </head>
    <main>
        <section class="page" style="--i: 5">
            <header>
                <a href="panel.php" class="logo">
                    <img src="./img/logo.svg" alt="berberim.comm"/>
                </a>
                <ul>
                    <li><a href="#" class="fill_button" id="randevu-list">Randevularım</a></li>
                    <li>
                        <a href="#" class="fill_button0" id="randevu-al">Randevu Al</a>
                    </li>
                    <li>
                        <a href="cikis.php" class="border_button" id="cikis">Çıkış</a>
                    </li>
                </ul>
            </header>
            <section>
                <iframe src="randevuAl.php" id="ekran" style="width: 100%;height: 91vh;"></iframe>
            </section>
        </section>
    </main>
    <script>
        const randevuList = document.querySelector("#randevu-list")
        const randevuAl = document.querySelector("#randevu-al")
        const ekran = document.querySelector("#ekran")
        randevuList.addEventListener("click", () => {
            ekran.contentWindow.location = "randevuList.php"
        })
        randevuAl.addEventListener("click", () => {
            ekran.contentWindow.location = "randevuAl.php"
        })

    </script>

    </body>
    </html>
    <?php
}else{
    header("refresh:0;url=index.php");
}
?>