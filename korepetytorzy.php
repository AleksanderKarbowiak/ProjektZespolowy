<?php
session_start();
if (!isset($_SESSION['id_uzytkownika']))
{
    header("Location: index.php");
    die();
}
$_PHP_SELF='korepetytorzy.php';

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
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Forum wiedzy SGGW</title>
        <link  rel="stylesheet" href="css/style_sggw_forum.css">
        <script type="text/javascript">
        function op_otworz(){
            document.getElementById("opinie").style.visibility = "visible";
            document.getElementById("opinie").style.opacity = "1";
        }
        </script>
    </head>
    <body>
        
        <div id="opinie">

            <div id="op_header">
                <div id="op_title">INFORMACJE</div>
                <label id="op_close" onclick="op_zamknij()">X</label>
            </div>
            <div id="op_all">
                <div id="op_content">
                    <div class="korepetytor">
                        
                    <?php
                    
                    function random_pic($gender)
                    {
                        $dir = 'images/profile/'.$gender;
                        $files = glob($dir . '/*.*', GLOB_BRACE);
                        return $files[array_rand($files)];
                    }
                    
                    if($_POST["tutor_id"]) {

                        //TUTOR QUERY
                        //IdUser,Price,AboutMe
                        $tutor_query = "select IdUser,Price,AboutMe from Tutor where Id=?";
                        $stmt = $db->prepare($tutor_query); 
                        $stmt->bind_param("i", $_POST["tutor_id"]);
                        $stmt->execute();
                        $tutor = $stmt->get_result();
                        $tutor = $tutor->fetch_assoc();
                        $userId = $tutor['IdUser'];
                        
                        //USER DATA QUERY
                        //Name, Email,Gender
                        $user_data_query = "select Name,Email,Gender from Users where Id=?";
                        $stmt = $db->prepare($user_data_query); 
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $user_data = $stmt->get_result();
                        $user_data = $user_data->fetch_assoc();
                        
                        $gender = $user_data['Gender'];
                        
                        if($gender == 'K')
                        {
                            $chosen_avatar = random_pic("Female");
                        }
                        else
                        {
                            $chosen_avatar = random_pic("Male");
                        }
                        
                        echo'<h1>DANE</h1>';
                        echo'<hr>';
                        echo'<div class="kor_prof">
                            <img src="'.$chosen_avatar.'">
                        </div>';
                        echo'<div class="kor_opis">';
                        echo'<div class="kor_imie">'.$user_data['Name'].'</div>';
                        echo'<div class="kor_kontakt"><div class="icon"></div><div class="spec_content">'.$user_data['Email'].'</div></div>';
                        echo'<div class="cena">'.$tutor['Price'].' zł/h</div>';
                        echo'<hr>';
                        echo'<div class="Kor_o_sobie">'.$tutor['AboutMe'].'</div>';
                        
                    }
                    ?>
                        </div>
                    </div>
                    <div class="op_dodaj">

                        <h1>DODAJ OPINIĘ</h1>
                        <hr>

                        <form id="opinia" action="dodaj_op_korepetytor.php" method="post">
                            
                            <?php
                            if($_POST["tutor_id"]){
                            echo'<input type="number" name="tutor_id" value="'.$_POST["tutor_id"].'" hidden/>';
                            }
                            ?>

                            <span class="Ocena">
                                <input id="demo-1" type="radio" name="demo" value="1"> 
                                <label for="demo-1">1 star</label>
                                <input id="demo-2" type="radio" name="demo" value="2">
                                <label for="demo-2">2 stars</label>
                                <input id="demo-3" type="radio" name="demo" value="3">
                                <label for="demo-3">3 stars</label>
                                <input id="demo-4" type="radio" name="demo" value="4">
                                <label for="demo-4">4 stars</label>
                                <input id="demo-5" type="radio" name="demo" value="5">
                                <label for="demo-5">5 stars</label>

                                <div class="stars">
                                    <label for="demo-1" aria-label="1 gwiazdka" title="1/5"></label>
                                    <label for="demo-2" aria-label="2 gwiazdki" title="2/5"></label>
                                    <label for="demo-3" aria-label="3 gwiazdki" title="3/5"></label>
                                    <label for="demo-4" aria-label="4 gwiazdki" title="4/5"></label>
                                    <label for="demo-5" aria-label="5 gwiazdek" title="5/5"></label>   
                                </div>
                            </span>
                            <textarea rows="4" name="opinia" placeholder="Twoja opinia..." style="width:100%;"></textarea>
                            <br><br><input type="text" name="imie"  required placeholder="Imię"><br>
                            <button type="submit" class="kor_opinie_btn">WYŚLIJ</button>

                        </form>     
                    </div>
                    <div id="opinie_innych">
                        <h1>OPINIE INNYCH</h1>
                        <hr>
                        
                        <?php 
                    
                        if($_POST["tutor_id"]) {
                        $opinions__query = "select Description,Author,Stars from OpinionTutor where IDTutor=?";
                        $stmt = $db->prepare($opinions__query); 
                        $stmt->bind_param("i",$_POST["tutor_id"]);
                        $stmt->execute();
                        $opinions = $stmt->get_result();
                        
                        $opinions_count=$opinions->num_rows;
                        for($k=0; $k<$opinions_count; $k++) {
                            $opinion =$opinions->fetch_assoc();
                            echo'<div class="op_opinia">';
                            echo'<div class="kor_ocena">'.$opinion['Stars'].'/5</div>';
                            echo $opinion['Description'];
                            echo'<br><div class="op_podpis">'.$opinion['Author'].'</div>';
                            echo'</div>';
                        }
                        echo '<script type="text/javascript">op_otworz();</script>';
                        }
                    ?>
                    </div>

                </div>

            </div>   
        </div>

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
                            <hr>   
                            <h2>KIERUNEK</h2>
                            <div class="container-fluid">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-1">
                                    <input type="checkbox" class="checkmarks" id="11" name="kierunek[]" value="1" <?php if(isset($_POST['zatw']))
                                        {
                                        if (in_array('1', $_POST['kierunek'])) echo 'checked="checked"';} 
                                        ?>
                                        >
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
                                        <?php if(isset($_POST['zatw']))
                                        {
                                        if (in_array('2', $_POST['kierunek'])) echo 'checked="checked"';} 
                                        ?>>
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
                                            <input type="checkbox" class="checkmarks" id="4" name="przedmiot[]" value="5"
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
                            <div class="container-fluid">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-10">
                                        <h2>CENA</h2>
                                    <span class="cena_center">
                                        <input class="in_cena" type="text" id="od" placeholder="od" name="od"> - 
                                        <input class="in_cena" type="text" id="do" placeholder="do" name="do">
                                    </span>
                                    </div>
                                    
                                        <button type="submit" class="przycisk_zaloguj" name="zatw">FILTRUJ</button>
                                    
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 mt-4" id="prawy">
                    
                
                <?php

                    function calculate_avg_opinion($opinion_stars)
                    {
                        $sum=0;
                        
                        $opinion_count = $opinion_stars->num_rows;
                        for($i=0; $i<$opinion_count; $i++)
                        {
                            $row = $opinion_stars->fetch_assoc();
                            $sum+=$row['Stars'];
                        }
                        return round($sum/$opinion_count,1);
                    }

                    //ID, IdUser,Price,AboutMe
                    $query = "select Tutor.ID, Tutor.IdUser, Tutor.Price, Tutor.AboutMe from Tutor";
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
                                $od = $_POST['od'];
                                $do = $_POST['do'];
                                if(!is_numeric($od)){$od=0;}
                                if(!is_numeric($do)){$do=9999;}
                                $przedmiotstring = implode (", ", $przedm);
                                $kierunekstring = implode (", ", $kier);
                                if(empty($kierunekstring) and !empty($przedmiotstring)){
                                    $query = "select DISTINCT Tutor.ID, Tutor.IdUser, Tutor.Price, Tutor.AboutMe from Tutor
                                        left join OfferedSubjectsTutors on Tutor.Id = OfferedSubjectsTutors.IDTutor
                                        left join Users on Tutor.IdUser=Users.Id
                                        where OfferedSubjectsTutors.IDOfferedSub in ($przedmiotstring) and Tutor.Price BETWEEN $od and $do";
                                }
                                else if(empty($przedmiotstring) and !empty($kierunekstring)){
                                    $query = "select DISTINCT Tutor.ID, Tutor.IdUser, Tutor.Price, Tutor.AboutMe from Tutor
                                        left join OfferedSubjectsTutors on Tutor.Id = OfferedSubjectsTutors.IDTutor
                                        left join Users on Tutor.IdUser=Users.Id
                                        where Users.FieldId in ($kierunekstring) and Tutor.Price BETWEEN $od and $do";
                                }
                                else if(empty($kierunekstring) and empty($przedmiotstring)){
                                    $query = "select DISTINCT Tutor.ID, Tutor.IdUser, Tutor.Price, Tutor.AboutMe from Tutor
                                        left join OfferedSubjectsTutors on Tutor.Id = OfferedSubjectsTutors.IDTutor
                                        left join Users on Tutor.IdUser=Users.Id
                                        where Tutor.Price BETWEEN $od and $do";
                                }
                                else{
                                $query = "select DISTINCT Tutor.ID, Tutor.IdUser, Tutor.Price, Tutor.AboutMe from Tutor
                                        left join OfferedSubjectsTutors on Tutor.Id = OfferedSubjectsTutors.IDTutor
                                        left join Users on Tutor.IdUser=Users.Id
                                        where OfferedSubjectsTutors.IDOfferedSub in ($przedmiotstring) and Users.FieldId in ($kierunekstring) and Tutor.Price BETWEEN $od and $do";
                                }
                        }
                    $tutors = $db->query($query);
                    $tutors_count = $tutors->num_rows;

                    for ($i=0; $i <$tutors_count; $i++)
                    {
                        $row = $tutors->fetch_assoc();
                        
                        //USER DATA QUERY
                        //Name, Gender,Email
                        $user_data_query = "select Name,Gender,Email from Users where Id=?";
                        $stmt = $db->prepare($user_data_query); 
                        $stmt->bind_param("i", $row['IdUser']);
                        $stmt->execute();
                        $user_data = $stmt->get_result();
                        $user_data = $user_data->fetch_assoc();

                        $gender = $user_data['Gender'];

                        if($gender == 'K')
                        {
                            $chosen_avatar = random_pic("Female");
                        }
                        else
                        {
                            $chosen_avatar = random_pic("Male");
                        }

                        //STARS QUERY
                        $opinion_stars_query = "select Stars from OpinionTutor where IDTutor=?";
                        $stmt = $db->prepare($opinion_stars_query); 
                        $stmt->bind_param("i", $row['ID']);
                        $stmt->execute();
                        $opinion_stars = $stmt->get_result();
                        $avg_opinion_stars = calculate_avg_opinion($opinion_stars);

                        //SUBJECTS QUERY
                        $subjects_names_query = "SELECT Name
                        FROM OfferedSubjects
                        INNER JOIN OfferedSubjectsTutors ON OfferedSubjects.ID = OfferedSubjectsTutors.IDOfferedSub
                        INNER JOIN Tutor ON OfferedSubjectsTutors.IDTutor = Tutor.ID
                        WHERE OfferedSubjectsTutors.IDTutor=?";
                        $stmt = $db->prepare($subjects_names_query); 
                        $stmt->bind_param("i", $row['ID']);
                        $stmt->execute();
                        $subjects_names = $stmt->get_result();
                        $subjects_count = $subjects_names->num_rows;



                        echo'<div class="korepetytor">';
                        echo'<div class="kor_prof">
                                <img src="'.$chosen_avatar.'">
                            </div>';
                        echo'<div class="kor_opis">';
                        echo'<div class="kor_imie">'.$user_data['Name'];
                            echo'<div class="kor_ocena">'.$avg_opinion_stars.'/5</div>';
                        echo'</div>';
                        echo'<div class="specjalnosc"><div class="icon"></div><div class="spec_content">';
                        for($j=0; $j<$subjects_count; $j++)
                        {
                            $subject = $subjects_names->fetch_assoc();
                            echo $subject['Name'];
                            if($j!=$subjects_count-1)
                            {
                                echo', ';
                            }
                        }
                        echo'</div></div>';
                        echo'<div class="cena">'.$row['Price'].' zł/h</div>';
                        echo'<div class="kor_kontakt"><div class="icon"></div><div class="spec_content">'.$user_data['Email'].'</div></div>';
                        echo'<hr>';
                        echo'<div class="Kor_o_sobie">'.$row['AboutMe'].'</div>';
                        echo'<form action = "'.$_PHP_SELF.'" method = "POST">';
                        echo'<input type="number" name="tutor_id" value="'.$row['ID'].'" hidden/>';
                        echo'<button class="kor_opinie_btn">WIĘCEJ...</button>';
                        echo'</form>';
                        echo'</div>
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

        <script src="script.js"></script>
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
