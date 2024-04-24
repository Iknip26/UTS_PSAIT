<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .wrapper {
        width: 600px;
        margin: 0 auto;
    }

    table tr td:last-child {
        width: 120px;
    }
    </style>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <style>
    div.scroll {

        width: 600px;
        height: 400px;
        overflow: scroll;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">DATA NILAI MAHASISWA</h2>
                        <a href="insertMahasiswaView.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>
                            Add New</a>
                    </div>
                    <div class="scroll">
                        <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_URL, 'http://localhost/UTS_PSAIT/uts_sait_restAPI2.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>nama</th>";
                                        echo "<th>nim</th>";
                                        echo "<th>kode_mk</th>";
                                        echo "<th>nilai</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["data"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["data"][$i]["nama"]} </td>";
                                        echo "<td> {$json["data"][$i]["nim"]} </td>";
                                        echo "<td> {$json["data"][$i]["kode_mk"]} </td>";
                                        echo "<td> {$json["data"][$i]["nilai"]} </td>";
                                        echo "<td>";
                                        echo '<form action="updateMahasiswaView.php" method="post">';
                                            echo '<input type="hidden" name="nim" value="'.$json["data"][$i]["nim"].'">';
                                            echo '<input type="hidden" name="kode_mk" value="'.$json["data"][$i]["kode_mk"].'">';
                                            echo '<input type="hidden" name="nama" value="'.$json["data"][$i]["nama"].'">';
                                            echo '<input type="hidden" name="nilai" value="'.$json["data"][$i]["nilai"].'">';
                                            echo '<button type="submit" class="btn btn-link" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></button>';
                                        echo '</form>';
                                        echo '<form action="deleteMahasiswaDo.php" method="post">';
                                            echo '<input type="hidden" name="nim" value="'.$json["data"][$i]["nim"].'">';
                                            echo '<input type="hidden" name="kode_mk" value="'.$json["data"][$i]["kode_mk"].'">';
                                            echo '<input type="hidden" name="nama" value="'.$json["data"][$i]["nama"].'">';
                                            echo '<input type="hidden" name="nilai" value="'.$json["data"][$i]["nilai"].'">';
                                            echo '<button type="submit" class="btn btn-link" " title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo '</form>';
                                        // echo '<a href="deleteMahasiswaDo.php?id_mhs='. $json["data"][$i]["id_mhs"] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo '<a href="updateMahasiswaView.php?nim='.urlencode(json_encode($json["data"][$i]['nim'])).  ' class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p>
    <p>
    <p>


</body>

</html>