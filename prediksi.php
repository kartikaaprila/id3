<?php
//session_start();
if (!isset($_SESSION['id3_id'])) {
    header("location:index.php?menu=forbidden");
}

if (($_SESSION['id3_id'])==2) {
    header("location:index.php?menu=forbidden");
}


include_once "database.php";
include_once "fungsi.php";
include_once "proses_mining.php";
//include_once "fungsi_proses.php";
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
                        <h1>Prediksi </h1>
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

            //if (!isset($_POST['submit'])) {
            ?>

            <form method="post" action="" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Name
                    </label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="form-field-1" class="form-control" 
                               value="<?php echo isset($_POST['name'])?$_POST['name']:"" ?>" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Status Of Marriage
                    </label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" class="square-black" value="married" name="status_of_marriage" 
                                   <?php echo isset($_POST['status_of_marriage'])?($_POST['status_of_marriage']=='married'?"checked":""):""; ?> required="">
                           Married
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="square-black" value="widow"  name="status_of_marriage" 
                                   <?php echo isset($_POST['status_of_marriage'])?($_POST['status_of_marriage']=='widow'?"checked":""):""; ?> required="">
                            Widow
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="square-black" value="single"  name="status_of_marriage" 
                                   <?php echo isset($_POST['status_of_marriage'])?($_POST['status_of_marriage']=='single'?"checked":""):""; ?> required="">
                            Single
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Status Of House
                    </label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" class="square-black" value="private" name="status_of_house" 
                                   <?php echo isset($_POST['status_of_house'])?($_POST['status_of_house']=='private'?"checked":""):""; ?> required="">
                            Private
                        </label>
                        <label class="radio-inline">
                            <input type="radio" class="square-black" value="rented"  name="status_of_house"  
                                   <?php echo isset($_POST['status_of_house'])?($_POST['status_of_house']=='rented'?"checked":""):""; ?> required="">
                            Rented
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Income
                    </label>
                    <div class="col-sm-9">
                        <input type="text" name="income" id="form-field-1" class="form-control" 
                               value="<?php echo isset($_POST['income'])?$_POST['income']:"" ?>" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Age
                    </label>
                    <div class="col-sm-9">
                        <input type="text" name="age" id="form-field-1" class="form-control" 
                               value="<?php echo isset($_POST['age'])?$_POST['age']:"" ?>" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Dependents
                    </label>
                    <div class="col-sm-9">
                        <input type="text" name="dependents" id="form-field-1" class="form-control" 
                               value="<?php echo isset($_POST['dependents'])?$_POST['dependents']:"" ?>" required="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 pull-right">
                        <input name="submit" type="submit" value="Submit" class="control-label btn btn-success">
                    </div>
                </div>
            </form>
            <?php
            //}
            if (isset($_POST['submit'])) {
                $success = true;
                $input_error = false;
                $pesan_gagal = $pesan_sukses = "";

                if (empty($_POST['name']) | empty($_POST['status_of_marriage']) | empty($_POST['status_of_house']) | empty($_POST['income']) | empty($_POST['age'])) {
                    $input_error = true;
                    display_error("lengkapi datanya");
                }
                
                if(!is_numeric($_POST['dependents'])){
                    $input_error = true;
                    display_error("dependents harus diisi angka");
                }
              
                if (!$input_error) {
                    $n_name = $_POST['name'];
                    $n_status_of_marriage = $_POST['status_of_marriage'];
                    $n_status_of_house = $_POST['status_of_house'];
                    $n_income = $_POST['income'];
                    $n_age = $_POST['age'];
                    $n_dependents = $_POST['dependents'];

                    $hasil = klasifikasi($db_object, $n_status_of_marriage, $n_status_of_house, $n_income, $n_age, $n_dependents);

                    //simpan ke table hasil
                    $sql_in_hasil = "INSERT INTO hasil_prediksi
                                (name, status_of_marriage, status_of_house, income, age, dependents,
                                result, id_rule)
                                VALUES
                                ('$n_name', '" . $n_status_of_marriage . "', '" . $n_status_of_house . "', '" . $n_income . "', "
                            . "'" . $n_age . "', " . "'". $n_dependents . "', " . "'" . $hasil['keputusan'] . "', '" . $hasil['id_rule'] . "')";
                    $success = $db_object->db_query($sql_in_hasil);

                    //simpan ke data uji
//                        $sql_data_uji = "INSERT INTO data_uji "
//                                . "(nama, jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli) "
//                                . " VALUES "
//                                . "('" . $siswa['nama_siswa'] . "', '" . $siswa['jenis_kelamin'] . "', '" . $siswa['usia'] . "'"
//                                . ", '" . $siswa['sekolah'] . "', '" . $jawaban_a . "', '" . $jawaban_b . "'"
//                                . ", '" . $jawaban_c . "', '" . $jawaban_d . "', '" . $hasil['keputusan'] . "')";
//                        $db_object->db_query($sql_data_uji);

                    if ($success) {
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<center>"
                        . "<h3 class='typoh2'>"
                        . "Hasil Prediksi: "
                        . "</h3>"
                        . "<h2 class='typoh2'>"
                        . $hasil['keputusan']
                        . "</h2>"
                        . "</center>";
                    } else {
                        display_error("failed");
                    }
                }
            }
            ?>
        </div>
    </div>
</div>


