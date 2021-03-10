<!DOCTYPE html>

<?php
    include('DB/session.php'); 
    // AGREGAR LA CONSULTA CON EL SESSION 

    $query = "SELECT subject_ID, subject_Name, subject_Teacher, subject_Year
                FROM subjects WHERE user_ID = ".$user_ID;

    $data = mysqli_query($db, $query);
?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name=”robots” content=”noindex, nofollow”>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo($login_session.' Profile');?></title>
        <!--agregamos una fuente de google-->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <!--vinculamos el estilo de la clase style.css a nuestro index-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
        <link rel="stylesheet" href="css/styleWelcome.css">
        
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-between">
            <a class="navbar-brand">Welcome <?php echo($login_session); ?></a>
            <button class="btn btn-dark btn-toggle-darkMode">
                <i class="fas fa-moon"></i>
                <span class="inner-switch">OFF</span>
            </button>
            <form class="form-inline" method="post" action="DB/logout.php">
                <button class="btn btn-primary" type="submit">Logout</button>
            </form>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success"  id="btnNewSubject" data-toggle="modal" data-target="#modalNewSubject" data-whatever="@getbootstrap">New Subject</button>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tableSubjects" class="table table-striped table-bordered table-condensed" style="width: 100%">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Year</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data as $dat) {
                                ?>
                                <tr>
                                    <td><?php echo $dat['subject_ID'] ?></td>
                                    <td><?php echo $dat['subject_Name'] ?></td>
                                    <td><?php echo $dat['subject_Teacher'] ?></td>
                                    <td><?php echo $dat['subject_Year'] ?></td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-primary btnEdit"><i class="fas fa-pen" style="margin-right: 10px;"></i>Edit</button>
                                                <button class="btn btn-danger btnDelete"><i class="fas fa-trash" style="margin-right: 10px;"></i>Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- MODAL FOR NEW SUBJECTS -->
        <div class="modal fade" id="modalNewSubject" tabindex="-1" role="dialog" aria-labelledby="modalNewSubjectLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNewSubjectLabel">New Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formSubjectForm" method="post" action="DB/insertData.php">
                        <div class="form-group">
                            <label for="IDForm" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" name="IDForm" disabled id="IDForm">
                        </div>
                        <div class="form-group">
                            <label for="subjectForm" class="col-form-label">Subject:</label>
                            <input type="text" class="form-control" name="subjectForm" id="subjectForm">
                        </div>
                        <div class="form-group">
                            <label for="teacherForm" class="col-form-label">Teacher:</label>
                            <input type="text" class="form-control" name ="teacherForm" id="teacherForm"></input>
                        </div>
                        <div class="form-group">
                            <label for="yearForm" class="col-form-label">Year:</label>
                            <input type="date" class="form-control" name ="yearForm" id="yearForm"></input>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="btnSaveSubject" class="btn btn-primary">Apply</button>
                        </div>
                    </form>
            </div>
        </div>

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <!-- Popper.js -->
        <script type="text/javascript" src="https://unpkg.com/@popperjs/core@2"></script>
        
        <!-- Datatable JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

        <script type="text/javascript" src="js/welcomeLogic.js"></script>
        <script type= "text/javascript" src="js/dark_mode.js"></script>
    </body>

    <!-- <div class="container">

        <body>
            <?php require 'partials/header.php' ?>

            <h1>Bienvenido <?php echo($login_session);?></h1>

            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="alta.php">Alta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="baja.php">Baja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="consulta.php">Consulta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="modificacion.php">Modificacion</a>
                </li>
            </ul>

            
            
            
        </body>
    </div> -->

</html>