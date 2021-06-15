<?php
session_start();
if (!isset($_SESSION['id_uzytkownika']))
{
    header("Location: index.php");
    die();
}
$_PHP_SELF='materialy.php';

    function connect()
    {  
        $db = new mysqli('localhost', 'id16889000_basedeveloper', '123devPatrzy!','id16889000_scw_baza');  
        if (! $db)
            return false;
        $db->autocommit(TRUE);
        return $db;
    }
    $db = connect();
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
    
    <nav>
        <div class="logo">
            <h4>Forum SGGW</h4>
        </div>
        <ul class="nav-links">
            <li><a href="mainstrona.html">Start</a></li>
            <li><a href="SGGW_FORUM/profil.html">Profil</a></li>
            <li><a href="materialy.php">Materiały</a></li>
            <li><a href="wykladowcy.php">Wykładowcy</a></li>
            <li><a href="korepetytorzy.php">Korepetycje</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
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
                        <?php
                        $kier = [];
                        $przedm =[];
                        error_reporting (E_ALL ^ E_NOTICE);
                        error_reporting(E_ERROR | E_PARSE); // coś skrzeczy ale działa
                        ?>
                        <form action="#" method="POST">
                            <!---
                            <hr>   
                            <h2>KIERUNEK</h2>
                            <div class="container-fluid">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-1">
                                    <input type="checkbox" class="checkmarks" id="11" name="kierunek[]" value="1" checked="checked" disabled="disabled">
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
                                        <input type="checkbox" class="checkmarks" id="12" name="kierunek[]" value="2"
                                        checked="checked" disabled="disabled">
                                    </div>
                                    <div class="col-10">
                                        <label for="12" class="lbl"> Informatyka i ekonometria</label><br>
                                    </div>
                                </div>
                            </div>
                            <hr>   --->
                            <h2>PRZEDMIOT</h2>
                            <div class="wybor">
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="1" name="przedmiot[]" value="1"
                                            <?php if(isset($_POST['zatw']))
                                        {
                                        if (in_array('1', $_POST['przedmiot'])) echo 'checked="checked"';} 
                                        ?>>
                                        </div>
                                        <div class="col-10">
                                            <label for="1" class="lbl">Wstęp do programowania</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="2" name="przedmiot[]" value="2"
                                            <?php if(isset($_POST['zatw']))
                                        {
                                        if (in_array('2', $_POST['przedmiot'])) echo 'checked="checked"';} 
                                        ?>>
                                        </div>
                                        <div class="col-10">
                                            <label for="2" class="lbl"> Analiza matematyczna</label></br>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="3" name="przedmiot[]" value="3"
                                            <?php if(isset($_POST['zatw']))
                                        {
                                        if (in_array('3', $_POST['przedmiot'])) echo 'checked="checked"';} 
                                        ?>>
                                        </div>
                                        <div class="col-10">
                                            <label for="3" class="lbl">Algebra liniowa</label></br>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="4" name="przedmiot[]" value="4"
                                            <?php if(isset($_POST['zatw']))
                                        {
                                        if (in_array('4', $_POST['przedmiot'])) echo 'checked="checked"';} 
                                        ?>>
                                        </div>
                                        <div class="col-10">
                                            <label for="4" class="lbl">Filozofia</label></br>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="5" name="przedmiot[]" value="5"
                                            <?php if(isset($_POST['zatw']))
                                        {
                                        if (in_array('5', $_POST['przedmiot'])) echo 'checked="checked"';} 
                                        ?>>
                                        </div>
                                        <div class="col-10">
                                            <label for="5" class="lbl">Inżynieria oprogramowania</label></br>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" class="checkmarks" id="6" name="przedmiot[]" value="6"
                                            <?php if(isset($_POST['zatw']))
                                        {
                                        if (in_array('6', $_POST['przedmiot'])) echo 'checked="checked"';} 
                                        ?>>
                                        </div>
                                        <div class="col-10">
                                            <label for="6" class="lbl">Data mining</label></br>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>      
                            <hr>

                            <br><br>
                            <button type="submit" class="przycisk_zaloguj" name="zatw">FILTRUJ</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 mt-4" id="prawy">
                    <?php
                    //ID, IdUser,Price,AboutMe
                    $query = "select ID,Name,Plik,IDSubject,Description from Materials";
                    if(isset($_POST['zatw'])){
                            if(!empty($_POST['kierunek'])) {  
                                foreach($_POST['kierunek'] as $value){
                                    $kier[] = $value;
                                }
                            }
                            if(!empty($_POST['przedmiot'])) {  
                                foreach($_POST['przedmiot'] as $value){
                                    $przedm[] = $value;
                                }
                            }
                                $przedmiotstring = implode (", ", $przedm);
                                $kierunekstring = implode (", ", $kier);
                                if(empty($przedmiotstring)){
                                    $query = "select ID,Name,Plik,IDSubject,Description from Materials";
                                }
                                else{
                                    $query = "select Materials.ID,Materials.Name,Materials.Plik,Materials.IDSubject,Materials.Description from Materials
                                    left join OfferedSubjects on Materials.IDSubject = OfferedSubjects.ID
                                    where OfferedSubjects.ID in ($przedmiotstring)";
                                } // git
                        }
                    $materials = $db->query($query);
                    $materials_count = $materials->num_rows;

                    for ($i=0; $i < $materials_count; $i++)
                    {
                        $row = $materials->fetch_assoc();
                        
                        //SUBJECTS DATA QUERY
                        //Name, Description
                        $materials_data_query = "select Name,Description from Subjects where Id=?";
                        $stmt = $db->prepare($materials_data_query); 
                        $stmt->bind_param("i", $row['IDSubject']);
                        $stmt->execute();
                        $materials_data = $stmt->get_result();
                        $materials_data = $materials_data->fetch_assoc();

                        //FIELDS QUERY
                        $fields_names_query = "SELECT Name
                        FROM Fields INNER JOIN FieldsSub ON FieldsSub.IDFields=Fields.ID WHERE FieldsSub.IDSubject=?";
                        $stmt = $db->prepare($fields_names_query); 
                        $stmt->bind_param("i", $row['IDSubject']);
                        $stmt->execute();
                        $fields_names = $stmt->get_result();
                        $fields_count = $fields_names->num_rows;
                        
                        echo'<div class="korepetytor">';
                        echo'<div class="kor_opis_materialy">';
                        echo'<div class="kor_imie">'.$materials_data["Name"];
                        echo'</div>';
                        echo'<div class="kor_kontakt"><div class="icon"></div><div class="spec_content">'.$row['Name'].'</div></div>';
                        echo'<div class="specjalnosc"><div class="icon"></div><div class="spec_content">';
                        for($j=0; $j<$fields_count; $j++)
                        {
                            $fields = $fields_names->fetch_assoc();
                            echo $fields['Name'];
                            if($j!=$fields_count-1)
                            {
                                echo', ';
                            }
                        }
                        echo'</div></div><hr>';
                        echo'<div class="Kor_o_sobie">'.$row['Description'];
                        echo'</div>';
                        $xyz="'";
                        echo'<button class="kor_opinie_btn" onClick="window.open('.$xyz.$row['Plik'].$xyz.');">Link</button>';
                        echo '</div>
                        </div>';           
                    }
                ?>
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
