<?php
session_start();
if (!isset($_SESSION['id_uzytkownika']))
{
    header("Location: index.php");
    die();
}
?>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forum wiedzy SGGW</title>
    <link  rel="stylesheet" href="SGGW_FORUM/style.css">
</head>
<body>
    <script src="SGGW_FORUM/script.js"></script>
    <!-- <div id="navbar_check" onmouseover="show_menu()"></div>
    <div id="navtop">
        
        <nav id="navbar">
            
            <label class="logo">Forum SGGW</label>
            <ul>
            <li><a href="#">Strona Glowna</a></li>
            <li><a href="#">Mój Profil</a></li>
            <li><a class="aktywna" href="#">Materialy</a></li>
            <li><a href="SGGW_FORUM/wykladowcy.html">Wykładowcy</a></li>
            <li><a href="SGGW_FORUM/korepetytorzy.html">Korepetycje</a></li>
            <li><a href="#">Wyloguj</a></li>
             </ul>
    
        </nav>
 
    </div> -->
    <nav>
        <div class="logo">
            <h4>Forum SGGW</h4>
        </div>
        <ul class="nav-links">
            <li><a href="mainstrona.html">Start</a></li>
            <li><a href="SGGW_FORUM/profil.html">Profil</a></li>
            <li><a href="materialy.html">Materiały</a></li>
            <li><a href="SGGW_FORUM/wykladowcy.html">Wykładowcy</a></li>
            <li><a href="SGGW_FORUM/korepetytorzy.html">Korepetycje</a></li>
            <li><a href="#">Wyloguj</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <div id="strona">
            <div class="container mt-5" id="center">
                <div class="row">
                <div class="col-md-4 col-lg-3 mx-3 mx-md-0 my-4 p-4 p-md-2" id="lewy">
                    <div class="naglowek">FILTRY</div>

                    <div class="filtry">
                        <form>
                            <hr>   
                            <h2>KIERUNEK</h2>
                            <div class="container-fluid">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-1">
                                        <input type="checkbox" class="checkmarks" id="11" name="kierunek" value="Informatyka">
                                    </div>
                                    <div class="col-10">
                                        <label for="11" class="lbl">Informatyka</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container-fluid">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-1">
                                        <input type="checkbox" class="checkmarks" id="12" name="kierunek" value="Informatyka i ekonometria">
                                    </div>
                                    <div class="col-10">
                                        <label for="12" class="lbl"> Informatyka i ekonometria</label><br>
                                    </div>
                                </div>
                            </div>
                            <hr>   
                            <h2>PRZEDMIOT</h2>
                            <div class="wybor">
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="1" name="przedmiot" value="Algebra Liniowa">
                                        </div>
                                        <div class="col-10">
                                            <label for="1" class="lbl">Algebra liniowa</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="2" name="przedmiot" value="Analiza matematyczna">
                                        </div>
                                        <div class="col-10">
                                            <label for="2" class="lbl"> Analiza matematyczna</label></br>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="3" name="przedmiot" value="Programowanie obiektowe">
                                        </div>
                                        <div class="col-10">
                                            <label for="3" class="lbl">Programowanie obiektowe</label></br>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="4" name="przedmiot" value="Ekonomia">
                                        </div>
                                        <div class="col-10">
                                            <label for="4" class="lbl">Ekonomia</label></br>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>      
                            <hr>

                            <br><br>
                            <button type="submit" class="przycisk_zaloguj">FILTRUJ</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 mt-4" id="prawy">
                    <div class="korepetytor">
                        
                        <div class="kor_opis_materialy">
                            <div class="kor_imie">Analiza matematyczna</div>
                            <div class="specjalnosc"><div class="icon"></div><div class="spec_content">Informatyka</div></div>
                            <hr>
                            <div class="Kor_o_sobie">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                            </div>
                            <button class="kor_opinie_btn" onClick="window.open('http://www.wp.pl');">Link</button>
                        </div>
                    </div>
                    <div class="korepetytor">
                        
                        <div class="kor_opis_materialy">
                            <div class="kor_imie">Obliczenia w chmurze</div>
                            <div class="specjalnosc"><div class="icon"></div><div class="spec_content">Informatyka</div></div>
                            <hr>
                            <div class="Kor_o_sobie">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                            </div>
                            <button class="kor_opinie_btn" onClick="window.open('http://www.wp.pl');">Link</button>
                        </div>
                    </div>
                    <div class="korepetytor">
                        
                        <div class="kor_opis_materialy">
                            <div class="kor_imie">Paradygmaty Programowania</div>
                            <div class="specjalnosc"><div class="icon"></div><div class="spec_content">Informatyka</div></div>
                            <hr>
                            <div class="Kor_o_sobie">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                            </div>
                            <button class="kor_opinie_btn" onClick="window.open('http://www.wp.pl');">Link</button>
                        </div>
                    </div>
                    <div class="korepetytor">
                        
                        <div class="kor_opis_materialy">
                            <div class="kor_imie">Programowanie wielowątkowe</div>
                            <div class="specjalnosc"><div class="icon"></div><div class="spec_content">Informatyka i ekonometria</div></div>
                            <hr>
                            <div class="Kor_o_sobie">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                            </div>
                            <button class="kor_opinie_btn" onClick="window.open('http://www.wp.pl');">Link</button>
                        </div>
                    </div>
                    <div class="korepetytor">
                        
                        <div class="kor_opis_materialy">
                            <div class="kor_imie">Programowanie wielowątkowe</div>
                            <div class="specjalnosc"><div class="icon"></div><div class="spec_content">Informatyka</div></div>
                            <hr>
                            <div class="Kor_o_sobie">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat in mauris sed pharetra. Curabitur semper eleifend sollicitudin. Suspendisse ac ex ipsum. 
                            </div>
                            <button class="kor_opinie_btn" onClick="window.open('http://www.wp.pl');">Link</button>
                        </div>
                    </div>
                    
                </div>
                </div>
            

        </div>

        <footer id="main-footer" class="py-1 text-white">
            <div class="container">
              <div class="row text-center">
                <div class="col-md-6 m-auto">
                  <p class=" no-margins">Copyright &copy; 2021 SGGW</p>
                </div>
              </div>
            </div>
          </footer>
    </div>

    

    <script>
        function navSlide() {
        const burger = document.querySelector(".burger");
        const nav = document.querySelector(".nav-links");
        const navLinks = document.querySelectorAll(".nav-links li");
    
        burger.addEventListener("click", () => {
        //Toggle Nav
        nav.classList.toggle("nav-active");
        
        //Animate Links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = ""
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }
        });
        //Burger Animation
        burger.classList.toggle("toggle");
    });
    
    }

    navSlide();


    </script>
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
</body>
</html>