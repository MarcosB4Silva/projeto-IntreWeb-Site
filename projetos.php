<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/style.css">
    <link rel="stylesheet" href="./views/css/reposive.css">
    <link rel="stylesheet" href="./views/css/projetos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>INTRÊ Aquitetura</title>
</head>

<body>
    <header>
        <a href="index.php">
            <img src="./views/img/logo_roxo_sem_fundo.png" alt="logo_roxo_sem_fundo" id="logo">
        </a>

        <button href="#" id="openMenu"><i class="fa-solid fa-bars"></i></button>

        <nav id="menu">
            <button id="closeMenu"><i class="fa-solid fa-xmark"></i></button>
            <a href="index.php" class="btn_menu">Inicio</a>
            <a href="projetos.html" class="btn_menu">Projetos</a>
            <a href="#" class="btn_menu">Serviços</a>
            <a href="#" class="btn_menu">Contato</a>
        </nav>
    </header>
    <h1>Projetos</h1>
    <main>
        <div class="background_content"></div>
        <div class="container_projetos">
            <?PHP
            include_once ("./models/conexao_bd.php");

            $sql_pesquisa_image = "SELECT codImg, tituloGal, descricaoGal, fotosGaleria FROM tbgaleria";
            $result = mysqli_query($conexao, $sql_pesquisa_image);

            if ($result->num_rows > 0) {
                $titulo_projeto = '';
                // Exibe as imagens
                while ($row = $result->fetch_assoc()) {
                    // Verica se exite valor no projeto
                    if ($titulo_projeto == '') {
                        $titulo_projeto = $row['tituloGal'];

                        echo '<div class="box_image" id="abrir_fotos">';
                        echo "<img src='data:image/jpeg;base64," . base64_encode($row['fotosGaleria']) . "' />";
                        echo "<p>$titulo_projeto</p>";
                        echo "</div>";


                        echo '<div class="carousel-container" id"carrosel">';
                        echo '<div class="carross">';
                        echo '<button class="prev" onclick="prevSlide(' . "'carousel-1'" . ')">&#10094;</button>';
                        echo '<div class="carousel carousel-1">';
                        echo '<ul>';

                        $sql_fotos_carrossel = mysqli_query($conexao, "SELECT tituloGal, fotosGaleria FROM tbgaleria");
                        while ($slide = $sql_fotos_carrossel->fetch_assoc()) {
                            if ($slide['tituloGal'] == $titulo_projeto) {
                                echo "<li>";
                                echo "<img src='data:image/jpeg;base64," . base64_encode($slide['fotosGaleria']) . "' />";
                                echo "</li>";
                            }
                        }

                        echo '</ul>';
                        echo '</div>';
                        echo '<button class="next" onclick="nextSlide(' . "'carousel-1'" . ')"> &#10095;</button>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        if ($row['tituloGal'] != $titulo_projeto) {
                            $titulo_projeto = $row['tituloGal'];
                            echo '<div class="box_image">';
                            echo "<img src='data:image/jpeg;base64," . base64_encode($row['fotosGaleria']) . "' />";
                            echo "<p>$titulo_projeto</p>";
                            echo "</div>";

                            echo '<div class="carousel-container">';
                            echo '<div class="carross">';
                            echo '<button class="prev" onclick="prevSlide(' . "'carousel-1'" . ')">&#10094;</button>';
                            echo '<div class="carousel carousel-1">';
                            echo '<ul>';

                            $sql_fotos_carrossel = mysqli_query($conexao, "SELECT tituloGal, fotosGaleria FROM tbgaleria");
                            while ($slide = $sql_fotos_carrossel->fetch_assoc()) {
                                if ($slide['tituloGal'] == $titulo_projeto) {
                                    echo "<li>";
                                    echo "<img src='data:image/jpeg;base64," . base64_encode($slide['fotosGaleria']) . "' />";
                                    echo "</li>";
                                }
                            }

                            echo '</ul>';
                            echo '</div>';
                            echo '<button class="next" onclick="nextSlide(' . "'carousel-1'" . ')"> &#10095;</button>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                }
            } else {
                echo "404 - Nenhuma imagem encontrada.";
            }
            ?>
        </div>
    </main>
    <div class="button_whatsapp">
        <li><i class="fa-brands fa-whatsapp" id="whatsapp"></i></li>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer_content">
            <div class="footer_info">
                <h3>Desenvolvido</h3>
                <div class="footer_info_container">
                    <ul>
                        <li><a href="#">Marcos Barros</a></li>
                        <li><a href="#">Jhonatan Julio</a></li>
                        <li><a href="#">Allan Sampaio</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Fernanda Souza</a></li>
                        <li><a href="#">Jeferson Cardoso</a></li>
                        <li><a href="#">Vinicius Lira</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer_contacts">
                <h3>Contatos</h3>
                <p><i class="fa-solid fa-envelope"></i> E-mail: contato@intrearquitetura.com</p>
                <p><i class="fa-solid fa-phone"></i> Tel: (11) 93067-2567</p>
            </div>
            <div class="footer_social_media">
                <h3>Redes Sociais</h3>
                <div class="icone_redes">
                    <li id="instagram"><i class="fa-brands fa-instagram"></i></li>
                    <li id="facebook"><i class="fa-brands fa-facebook-f" "></i></li>
                    <li id="tiktok"><i class="fa-brands fa-tiktok"></i></li>
                </div>
            </div>
        </div>
        <div class="footer_copyrigth">
            &#169 2024 INTRÊ arquitetura
        </div>
    </footer>

    <script src="./views/js/scrypt.js"></script>
    <script src="./views/js/carrossel-galeria.js"></script>
</body>

</html>