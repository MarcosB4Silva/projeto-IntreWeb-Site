<?php
include_once './php_action/conexao_bd.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/style.css">
    <link rel="stylesheet" href="./views/css/reposive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>INTRÊ Aquitetura</title>
</head>

<body>
    <header>
        <a href="index.html">
            <img src="./views/img/logo_roxo_sem_fundo.png" alt="logo_roxo_sem_fundo" id="logo">
        </a>

        <button href="#" id="openMenu"><i class="fa-solid fa-bars"></i></button>

        <nav id="menu">
            <button id="closeMenu"><i class="fa-solid fa-xmark"></i></button>
            <a href="index.php" class="btn_menu">Inicio</a>
            <a href="projetos.html" class="btn_menu">Projetos</a>
            <a href="formulario.html" class="btn_menu">Serviços</a>
            <a href="#" class="btn_menu">Contato</a>
        </nav>
    </header>

    <main>
        <!-- home -->
        <section>
            <div class="home_text">
                <h1>Projetando <br> qualidades <span>únicas</span> <br> para cada lugar!</h1>
                <p>
                    Cada história é única e merece ser contada de forma especial. Por isso, nossos serviços de design de
                    interiores e arquitetura são totalmente personalizados para atender aos seus desejos e necessidades.
                </p>
            </div>
            <div class="home_image">
            </div>
        </section>
        <!-- Sobre (About) -->
        <section id="sobre">
            <div class="container_about">
                <div class="about_image">
                    <img src="./views/img/adm.png" alt="">
                </div>
                <div class="about_text">
                    <h1>QUEM SOMOS</h1>
                    <p>Conheça a Intrê Arquitetura, uma equipe apaixonada composta por três arquitetas talentosas,
                        dedicadas a
                        transformar lares e espaços comerciais em verdadeiras obras de arte.
                        <br><br>
                        Combinando nossa paixão pela arquitetura e design de interiores, trazemos uma abordagem única
                        para cada
                        projeto que assumimos.
                        <br><br>
                        Nossa missão é criar ambientes que encantem, inspirem e se tornem o cenário perfeito para as
                        memórias
                        mais preciosas da sua vida. Seja para uma casa dos sonhos ou um espaço comercial inovador,
                        estamos
                        prontas para tornar seus projetos realidade.
                    </p>
                    <div class="about_icones_redes">
                        <h3> Redes Sociais</h3>
                        <div class="icone_redes">
                            <li id="instagram"><i class="fa-brands fa-instagram"></i></li>
                            <li id="facebook"><i class="fa-brands fa-facebook-f" "></i></li>
                            <li id="tiktok"><i class="fa-brands fa-tiktok"></i></li>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SERVIÇOS -->
        <section class="servicos">
            <h1>Conheça nosso Serviços</h1>

            <div class="container_box">
                <a href="formulario.html">
                    <div class="box">
                        <img src="./views/img/icone-esboco.png" alt="">
                        <h1>Construir</h1>
                        <p>Se você precisa de projeto arquitetônico</p>
                    </div>
                </a>
                <a href="formulario.html">
                    <div class="box">
                        <img src="./views/img/icone-rolo-de-pintura.png" alt="">
                        <h1>Reformar</h1>
                        <p>Se você precisa de um projeto de interiores</p>
                    </div>
                </a>
                <a href="formulario.html">
                    <div class="box">
                        <img src="./views/img/icone-consultoria.png" alt="">
                        <h1>Consultoria</h1>
                        <p>Se você precisa de um serviço express </p>
                    </div>
                </a>
            </div>
        </section>
        <!-- Whatsapp -->
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
                    <!-- <div class="logo_image">
                    <img src="./img/logo_roxo_sem_fundo.png" alt="">
                </div> -->
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


        <script src="./js/scrypt.js"></script>
</body>

</html>