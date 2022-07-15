<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
<body>
<section class="page" id="pageIletisim">
    <div class="form_flex">
        <div class="form-blur">
            <table class="table">
                <tr>
                    <td>Randevu No</td>
                    <td>Berber</td>
                    <td>Berber'in Mekan Adı</td>
                    <td>Randevu Zamanı</td>
                </tr>
                <?php
                session_start();
                $databaseConnection = mysqli_connect("localhost", "root", "", "web_proje");
                mysqli_set_charset($databaseConnection, "UTF8");

                if (mysqli_connect_errno()) {
                    echo "Bağlantı Hatası <br />";
                    echo "Hata Açıklaması : ", mysqli_connect_errno();
                    die();
                }

                $sql = "SELECT * FROM appointments where customer_id = '{$_SESSION['id']}'";
                $result = $databaseConnection->query($sql);
                $row = $result->fetch_array();

                foreach ($result as $row) {
                    $barberId = $row['barber_id'];
                    $sql0 = "SELECT name,storeName FROM barbers where id = '{$barberId}'";
                    $result0 = $databaseConnection->query($sql0);
                    $row0 = $result0->fetch_array();
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row0['name'] ?></td>
                        <td><?= $row0['storeName'] ?></td>
                        <td><?= $row['time'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <div class="bubbles"></div>
</section>
<script>
    let bubblesDOM = document.querySelector(".bubbles");
    let icons = [
        "<i class='fa-solid fa-circle'></i>",
        "<i class='fa-solid fa-xmark'></i>",
        "<i class='fa-solid fa-square'></i>",
        "<i class='fa-regular fa-circle'></i>",
        "<i class='fa-regular fa-square'></i>",
    ];
    for (let i = 0; i <= 100; i++) {
        let createSpan = document.createElement("span");
        createSpan.classList.add("bubble");
        createSpan.style.cssText = "--i:" + Math.floor(Math.random() * 25);
        createSpan.innerHTML = icons[Math.floor(Math.random() * 5)];
        bubblesDOM.append(createSpan);
    }
</script>
</body>
</html>
