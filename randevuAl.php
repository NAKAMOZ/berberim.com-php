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
            <div class="form">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <h3
                            style="
                color: #b90cd6;
                margin-left: 0;
                font-size: 30px;
                opacity: 0.75;
              "
                    >
                        Randevu Al
                    </h3>
                    <div class="inputBox0">
                        <input list="browsers" name="barbers" required/>
                        <datalist id="browsers">
                            <?php
                            $databaseConnection = mysqli_connect("localhost", "root", "", "web_proje");
                            mysqli_set_charset($databaseConnection, "UTF8");
                            if (mysqli_connect_errno()) {
                                echo "Bağlantı Hatası <br />";
                                echo "Hata Açıklaması : ", mysqli_connect_errno();
                                die();
                            }
                            $sql = "SELECT id,name FROM barbers";

                            $result = $databaseConnection->query($sql);
                            $row = $result->fetch_array();
                            foreach ($result as $row) {
                                $a = $row["name"];
                                echo "<option value='$a'></option>";
                            }
                            $result->free_result();

                            $databaseConnection->close();
                            ?>


                        </datalist>
                        <span>Berberler</span>
                    </div>
                    <div class="inputBox0">
                        <input
                                type="datetime-local"
                                id="birthdaytime"
                                name="randevuTime"
                                required
                        />
                    </div>
                    <input
                            type="submit"
                            value="Gönder"
                            class="fill_button0"
                            style="cursor: pointer; width: 100px"
                            name="randevuSubmit"
                    />

                    <?php
                    session_start();


                    if (isset($_POST['randevuSubmit'])) {
                        $randevuTime = $_POST["randevuTime"];
                        $barbers = $_POST["barbers"];

                        $databaseConnection = mysqli_connect("localhost", "root", "", "web_proje");
                        mysqli_set_charset($databaseConnection, "UTF8");

                        if (mysqli_connect_errno()) {
                            echo "Bağlantı Hatası <br />";
                            echo "Hata Açıklaması : ", mysqli_connect_errno();
                            die();
                        }

                        $sql = "SELECT id,name FROM barbers where name = '{$barbers}'";

                        $result = $databaseConnection->query($sql);
                        $row = $result->fetch_array();
                        $barberId = $row[0];

                        $ekle = mysqli_query($databaseConnection, "insert into appointments (time,barber_id,customer_id) values ('{$randevuTime}','{$barberId}','{$_SESSION['id']}')");
                        if ($ekle) {
                            echo "<script> alert('Kayıt Başarıyla Eklendi!')</script>";
                        } else {
                            echo "Sorgu Hatası";
                        }
                        mysqli_close($databaseConnection);
                    }
                    ?>
            </div>
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
