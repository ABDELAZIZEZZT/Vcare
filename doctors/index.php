
<?php
session_start();
// var_dump($_POST);
$admin=0;
$flag=0;
if(isset($_POST['titel']))$flag=1; 
if($_SESSION['role']=="admi")$admin=1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"
        integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/themes/splide-default.min.css"
        integrity="sha512-KhFXpe+VJEu5HYbJyKQs9VvwGB+jQepqb4ZnlhUF/jQGxYJcjdxOTf6cr445hOc791FFLs18DKVpfrQnONOB1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
        integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.rtl.min.css"
        integrity="sha512-wO8UDakauoJxzvyadv1Fm/9x/9nsaNyoTmtsv7vt3/xGsug25X7fCUWEyBh1kop5fLjlcrK3GMVg8V+unYmrVA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="../assets/styles/pages/main.css">

    <title>Document</title>
</head>

<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="../index.html" index.html">VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button" href="../index.php">Home</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../majors_.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="./index.php">Doctors</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../login.html">login</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">doctors</li>
                </ol>
            </nav>

            <?php 
            require "../validation.php";
            function sanitizeInput($input)
            {
                return trim(htmlspecialchars(htmlentities($input)));
            }
               
                $val=new validation;
              

                $data=$val->getAll("doctors");
                $m=$val->getAll("majors");
                $major=0;
                foreach($data as $key ):
                    foreach($key as $z=>$y){
                        
                        $$z=sanitizeInput($y);
                    }
                  
                    foreach($m as $key ){
                        foreach($key as $z=>$y){
                            
                            
                        if($z=="id" && $y==$major_id)$major=$key["titel"];
                        }

                    }
            //   var_dump($_POST)
           if($flag):
            if($major==$_POST['titel']):
            
            ?>
            <div class="doctors-grid">
                <div class="card p-2" style="width: 18rem;">
                    <form action="doctor.php" method="post">
                    <img src="../assets/images/doctors/<?php echo $name ;?>.png" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"><?php echo $name;?></h4>
                        <h6 class="card-title fw-bold text-center"><?php echo $major;?></h6>
                        <input type="hidden" name="name" value="<?php echo $name ?>" ></input>
                        <input type="hidden" name="major" value="<?php echo $major ?>" ></input>
                        <input type="hidden" name="image" value="../assets/images/doctors/<?php echo $name ;?>.png" ></input>
                        <input type="hidden" name="bio" value="<?php echo $bio ?>" ></input>
                        <input type="hidden" name="id" value="<?php echo $id ?>" ></input>


                        <button type="submit">Book an appointment</button>
                        <!-- <a href="./doctor.php" doctor.html" class="btn btn-outline-primary card-button">Book an
                            appointment</a> -->
                    </div>
                    </form>
                </div>
            <?php endif;?>
            <?php else: ?>
                <div class="doctors-grid">
                <div class="card p-2" style="width: 18rem;">
                    <form action="doctor.php" method="post">
                    <img src="../assets/images/doctors/<?php echo $name ;?>.png" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"><?php echo $name;?></h4>
                        <h6 class="card-title fw-bold text-center"><?php echo $major;?></h6>
                        <input type="hidden" name="name" value="<?php echo $name ?>" ></input>
                        <input type="hidden" name="major" value="<?php echo $major ?>" ></input>
                        <input type="hidden" name="image" value="../assets/images/doctors/<?php echo $name ;?>.png" ></input>
                        <input type="hidden" name="bio" value="<?php echo $bio ?>" ></input>
                        <input type="hidden" name="id" value="<?php echo $id ?>" ></input>


                        <button type="submit">Book an appointment</button>
                        <!-- <a href="./doctor.php" doctor.html" class="btn btn-outline-primary card-button">Book an
                            appointment</a> -->
                    </div>
                    </form>
                </div>
                <?php endif;?>
              
            <?php endforeach;?>

            </div>
            <nav class="mt-5" aria-label="navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link page-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                < </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link page-next" href="#" aria-label="Next">
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <footer class="container-fluid bg-blue text-white py-3">
        <div class="row gap-2">

            <div class="col-sm order-sm-1">
                <h1 class="h1">About Us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                    laborum
                    saepe
                    enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                    cum
                    iure
                    quod facere.</p>
            </div>
            <div class="col-sm order-sm-2">
                <h1 class="h1">Links</h1>
                <div class="links d-flex gap-2 flex-wrap">
                    <a href="../index.php" index.html" class="link text-white">Home</a>
                    <a href="../majors_.php" majors.php" class="link text-white">Majors</a>
                    <a href="./index.php" doctors/index.php" class="link text-white">Doctors</a>
                    <a href="../login.html" login.html" class="link text-white">Login</a>
                    <a href="../register.html" register.html" class="link text-white">Register</a>
                    <a href="../contact.html" contact.html" class="link text-white">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>