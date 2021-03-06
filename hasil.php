<?php
//session_start();
if (!isset($_SESSION['id3_id'])) {
    header("location:index.php?menu=forbidden");
}

include_once "database.php";
include_once "fungsi.php";
?>
<div class="content"><!-- start: PAGE -->
    <div class="main-content">
        <div class="container">
            <!-- start: PAGE HEADER -->
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    //include "styleSelectorBox.php";
                    ?>
                    <!-- start: PAGE TITLE & BREADCRUMB -->

                    <div class="page-header">
                        <h1>Hasil </h1>
                    </div>
                    <!-- end: PAGE TITLE & BREADCRUMB -->
                </div>
            </div>

            <?php
            //object database class
            $db_object = new database();

            $pesan_error = $pesan_success = "";
            if (isset($_GET['pesan_error'])) {
                $pesan_error = $_GET['pesan_error'];
            }
            if (isset($_GET['pesan_success'])) {
                $pesan_success = $_GET['pesan_success'];
            }

            if (isset($_POST['delete'])) {
                $sql = "TRUNCATE data_hasil_klasifikasi";
                $db_object->db_query($sql);
                ?>
                <script> location.replace("?menu=hasil_klasifikasi&pesan_success=Data hasil berhasil dihapus");</script>
                <?php
            }

            $sql = "SELECT hasil.* 
            FROM hasil_prediksi hasil ";
            $query = $db_object->db_query($sql);
            $jumlah = $db_object->db_num_rows($query);
            ?>

            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (!empty($pesan_error)) {
                        display_error($pesan_error);
                    }
                    if (!empty($pesan_success)) {
                        display_success($pesan_success);
                    }


                    echo "Jumlah data: " . $jumlah . "<br>";
                    if ($jumlah == 0) {
                        echo "Data kosong...";
                    } else {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="sample-table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Status Of Marriage</th>
                                        <th>Status Of House</th>
                                        <th>Income</th>
                                        <th>Age</th>
                                        <th>Dependents</th>
                                        <th>Result</th>
                                        <th>Id rule</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($row = $db_object->db_fetch_array($query)) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['status_of_marriage'] . "</td>";
                                        echo "<td>" . $row['status_of_house'] . "</td>";
                                        echo "<td>" . $row['income'] . "</td>";
                                        echo "<td>" . $row['age'] . "</td>";
                                        echo "<td>" . $row['dependents'] . "</td>";
                                        echo "<td>" . $row['result'] . "</td>";
                                        echo "<td>" . $row['id_rule'] . "</td>";
                                        echo "</tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>