<link rel="stylesheet" href="dist/css/app.css">
<script src="dist/js/sweetalert2.all.min.js"></script>
<?php

// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include 'config.php';
session_start();
date_default_timezone_set("Asia/Bangkok");

// if ( $_POST['token'] != $_SESSION['token'] ) {

//  echo "gagl token";

//      exit;
//  }
//   var_dump( $_SESSION ); exit;


// ========================================================================================================================================


// <> proses pendaftaran jalur kerjasama
if ($_GET['PageAction'] == "regist1") {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $token_session = $_SESSION['token'];
    $token_post    = mysqli_real_escape_string($conn, $_POST['token']);
    $nik           = $_SESSION['user_nik'];


    if ($token_session === $token_post) {

        $nim                     = mysqli_real_escape_string($conn, $_POST['nim']);
        $id_company              = mysqli_real_escape_string($conn, $_POST['id_company']);
        $start_date              = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_date                = mysqli_real_escape_string($conn, $_POST['end_date']);
        $internship_period       = mysqli_real_escape_string($conn, $_POST['internship_period']);
        $status_intern           = 'PENDING';
        $file1                   = $_FILES['file1']['name'];
        $file2                   = $_FILES['file2']['name'];
        $file3                   = $_FILES['file3']['name'];
        $suffix                  = rand(0000000, 9999999);

        if ($_SESSION['user_nik'] != null) {


            //mengganti nama pdf
            // $tipe_file     = $_FILES['file1']['type']; //mendapatkan mime type
            $nama_baru = "$nim _" . $suffix . ".pdf"; //hasil contoh: file_1.pdf
            $file_temp = $_FILES['file1']['tmp_name']; //data temp yang di upload
            move_uploaded_file($file_temp, "assetfile/" . $nama_baru); //fungsi upload


            // mengganti nama pdf
            // $nama_baru2 = "$nim _" . $suffix . ".pdf"; //hasil contoh: file_1.pdf
            // $file_temp2 = $_FILES['file2']['tmp_name']; //data temp yang di upload
            // move_uploaded_file($file_temp, "assetfile/" . $nama_baru2); //fungsi upload


            //mengganti nama pdf
            // $nama_baru3 = "$nim _" . $suffix . ".pdf"; //hasil contoh: file_1.pdf
            // $file_temp3 = $_FILES['file3']['tmp_name']; //data temp yang di upload
            // move_uploaded_file($file_temp, "assetfile/" . $nama_baru3); //fungsi upload



            $input = $conn->query("INSERT INTO `tb_internship` (`id_internship`, `nim`, `id_company`, `start_date`, `end_date`, `internship_period`, `status_intern`, `file1` ) VALUES (NULL, '$nim', '$id_company', '$start_date', '$end_date', '$internship_period', 'PENDING', '$nama_baru');") or die(mysqli_error($conn));

            if ($input) {
                echo "
                <script type='text/javascript'>
                setTimeout(function () { 
                swal({
                            title: 'Login Berhasil',
                            text:  'Harap tunggu anda akan diarahkan ke page Dashboard',
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: true
                        });  
                },10); 
                window.setTimeout(function(){ 
                    window.location.replace('index.php?page=registration');
                } ,3000); 
                </script>
                ";
            }
        } else {
            echo '<script language="javascript">alert("User Gagal ditambah"); document.location="index.php?page=registration";</script>';
            //echo("Error description: " . $conn -> error);

        }
        // } else {
        //     //echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_peneliti";</script>';
        //     echo "
        //               <script type='text/javascript'>
        //                setTimeout(function () { 
        //           Swal.fire({
        //             type: 'error',
        //             title: 'Field data cannot be empty',
        //             showConfirmButton: false
        //           });  
        //                },10); 
        //                window.setTimeout(function(){ 
        //                 window.location.replace('index.php?page=registration');
        //                } ,3000); 
        //               </script>
        //           ";
        // }
    }
}
// } else {
//     echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="index.php";</script>';
// }

// </> pendaftaran jalur kerja sama 


// =========================================================================================================================================


// <> proses pendaftaran non kerjasama

if ($_GET['PageAction'] == "regist2") {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $token_session = $_SESSION['token'];
    $token_post    = mysqli_real_escape_string($conn, $_POST['token']);
    $nik           = $_SESSION['user_nik'];


    if ($token_session === $token_post) {

        $nim                     = mysqli_real_escape_string($conn, $_POST['nim']);
        $company_name            = mysqli_real_escape_string($conn, $_POST['company_name']);
        $address                 = mysqli_real_escape_string($conn, $_POST['address']);
        $phone                   = mysqli_real_escape_string($conn, $_POST['phone']);
        $start_date              = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_date                = mysqli_real_escape_string($conn, $_POST['end_date']);
        $description_jobdesc     = mysqli_real_escape_string($conn, $_POST['description_jobdesc']);
        $internship_period       = mysqli_real_escape_string($conn, $_POST['internship_period']);
        $status_intern           = 'PENDING';
        $file1                   = mysqli_real_escape_string($conn, $_POST['file1']);
        $file2                   = mysqli_real_escape_string($conn, $_POST['file2']);
        $file3                   = mysqli_real_escape_string($conn, $_POST['file3']);


        if ($_SESSION) {
            $input_company = $conn->query("INSERT INTO `tb_company` (`id_company`, `company_name`, `address`, `phone`) VALUES (NULL, '$company_name', '$address', '$phone');");
            // $latest = mysqli_insert_id($conn);
            $newcompany = mysqli_query($conn, "SELECT max(id_company) AS id_company_max FROM tb_company");

            $row = mysqli_fetch_array($newcompany);
            $latest = $row['id_company_max'];

            $input = $conn->query("INSERT INTO `tb_internship` (`id_internship`, `nim`, `id_company`, `start_date`, `end_date`, `internship_period`, `description_jobdesc`, `status_intern`) VALUES (NULL, '$nim', '$latest', '$start_date', '$end_date', '$internship_period', '$description_jobdesc', 'PENDING');");

            if ($input) {
                echo "
                    <script type='text/javascript'>
                    setTimeout(function () { 
                    swal({
                                title: 'Login Berhasil',
                                text:  'Harap tunggu anda akan diarahkan ke page Dashboard',
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: true
                            });  
                    },10); 
                    window.setTimeout(function(){ 
                        window.location.replace('index.php?page=logbook');
                    } ,3000); 
                    </script>
                    ";
            }
            if ($input) {
                echo '<script language="javascript">alert("Berhasil"); document.location="index.php?page=logbook";</script>';
            }
        }
    }
}

// </> pendaftaran non kerjasama


//  ========================================================================================================================================


// <> proses pengumpulan logbook

if ($_GET['PageAction'] == "add_log") {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $token_session = $_SESSION['token'];
    $token_post    = mysqli_real_escape_string($conn, $_POST['token']);

    if ($token_session === $token_post) {

        $id_logbook              = mysqli_real_escape_string($conn, $_POST['id_logbook']);
        $id_internship           = mysqli_real_escape_string($conn, $_POST['id_internship']);
        $nim                     = mysqli_real_escape_string($conn, $_POST['nim']);
        $start_date              = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_date                = mysqli_real_escape_string($conn, $_POST['end_date']);
        $week_num                = mysqli_real_escape_string($conn, $_POST['week_num']);
        $description             = mysqli_real_escape_string($conn, $_POST['description']);
        // $filelogbook             = $_FILES['file1']['name'];
        // $suffix                  = rand(0000000, 9999999);

        if ($_SESSION) {
            $input = $conn->query("INSERT INTO `tb_logbook` (`id_logbook`, `id_internship`, `nim`, `startdate`, `enddate`, `week_num`, `description`) VALUES ('', '$id_internship', '$nim', '$start_date', '$end_date', '$week_num', '$description');") or die(mysqli_error($conn));

            if ($input) {
                echo "
                    <script type='text/javascript'>
                    setTimeout(function () { 
                    swal({
                                title: 'Login Berhasil',
                                text:  'Harap tunggu anda akan diarahkan ke page Dashboard',
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: true
                            });  
                    },10); 
                    window.setTimeout(function(){ 
                        window.location.replace('index.php?page=logbook');
                    } ,3000); 
                    </script>
                    ";
            }
            if ($input) {
                echo '<script language="javascript">alert("Berhasil"); document.location="index.php?page=logbook";</script>';
            }
        }
    }
}
// </> pengumpulan logbook


//  ========================================================================================================================================


// <> edit data logbook

if ($_GET['PageAction'] == "update_logbook") {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $token_session = $_SESSION['token'];
    $token_post    = mysqli_real_escape_string($conn, $_POST['token']);
    $nik           = $_SESSION['user_nik'];

    if ($token_session === $token_post) {

        $id_logbook              = mysqli_real_escape_string($conn, $_POST['id_logbook']);
        $id_internship           = mysqli_real_escape_string($conn, $_POST['id_internship']);
        $nim                     = mysqli_real_escape_string($conn, $_POST['nim']);
        $start_date              = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_date                = mysqli_real_escape_string($conn, $_POST['end_date']);
        $week_num                = mysqli_real_escape_string($conn, $_POST['week_num']);
        $description             = mysqli_real_escape_string($conn, $_POST['description']);

        if ($_SESSION) {
            ////proses biodata
            $update = $conn->query("UPDATE `tb_logbook` SET 
               `start_date` = '$start_date',
               `end_date` = '$end_date',
               `week_num` = '$week_num',
               `description` = '$description'
                WHERE `tb_logbook`.`id_logbook` = $id_logbook;");

            if ($update) {
                //echo '<script language="javascript">alert("Identitas Berhasil di perbaharui"); document.location="index.php?page=identitas";</script>';
                echo "
                     <script type='text/javascript'>
                      setTimeout(function () { 
                 Swal.fire({
                   type: 'success',
                   title: 'Data berhasil diperbaharui',
                   showConfirmButton: false
                 });  
                      },10); 
                      window.setTimeout(function(){ 
                        window.history.back();
                      } ,3000); 
                     </script>
                 ";
            } else {
                //echo '<script language="javascript">alert("Identitas Gagal di update"); document.location="index.php?page=identitas";</script>';
                echo "
                     <script type='text/javascript'>
                      setTimeout(function () { 
                 Swal.fire({
                   type: 'error',
                   title: 'Data gagal diperbaharui',
                   showConfirmButton: false
                 });  
                      },10); 
                      window.setTimeout(function(){ 
                        window.history.back();
                      } ,3000); 
                     </script>
                 ";
            }
        } else {
            echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=logbook";</script>';
        }
    } else {
        echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
    }
}


// </> edit data logbook


//  ========================================================================================================================================


// <> hapus data logbook

if ($_GET['PageAction'] == "delete_log") {

    $id_logbook = mysqli_real_escape_string($conn, $_POST['id_logbook']);

    $del = $conn->query("DELETE FROM tb_logbook WHERE id_logbook = '$id_logbook'");
    if ($del) {
        echo '<script language="javascript">alert("Data berhasil dihapus."); window.history.back();</script>';
    } else {
        echo '<script language="javascript">alert("Data Gagal dihapus."); window.history.back();</script>';
    }
}

// </> hapus data logbook


//  ========================================================================================================================================


// <> proses absensi

if ($_GET['PageAction'] == "attendance_checkin") {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $token_session = $_SESSION['token'];
    $token_post    = mysqli_real_escape_string($conn, $_POST['token']);

    if ($token_session === $token_post) {

        $id_attendance           = mysqli_real_escape_string($conn, $_POST['id_attendance']);
        $id_internship           = mysqli_real_escape_string($conn, $_POST['id_internship']);
        $nim                     = mysqli_real_escape_string($conn, $_POST['nim']);
        $type_attendance         = mysqli_real_escape_string($conn, $_POST['type_attendance']);
        $week                    = mysqli_real_escape_string($conn, $_POST['week']);
        $notes                   = mysqli_real_escape_string($conn, $_POST['notes']);
        $check_in                = date("Y-m-d H:i:s");
        $approval_dpm            = 'Pending';
        $approval_spv            = 'Pending';
        // $filelogbook             = $_FILES['file1']['name'];
        // $suffix                  = rand(0000000, 9999999);
        // $status                  = mysqli_real_escape_string($conn, $_POST['status']);

        if ($_SESSION) {
            $input = $conn->query("INSERT INTO `tb_attendance` (`id_attendance`, `id_internship`, `nim`, `type_attendance`, `notes`, `week`, `check_in`, `approval_dpm`, `approval_spv` ) VALUES ('', '$id_internship', '$nim', '$type_attendance', '$notes', '$week', '$check_in', 'Pending', 'Pending');") or die(mysqli_error($conn));

            if ($input) {
                echo "
                    <script type='text/javascript'>
                    setTimeout(function () { 
                    swal({
                                title: 'Saved Data',
                                text:  'Harap tunggu anda akan diarahkan ke page Dashboard',
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: true
                            });  
                    },10); 
                    window.setTimeout(function(){ 
                        window.location.replace('index.php?page=attendance');
                    } ,3000); 
                    </script>
                    ";
            }
            if ($input) {
                echo '<script language="javascript">alert("Berhasil"); document.location="index.php?page=attendance";</script>';
            }
        }
    }
}
// </> proses absensi


// ====================================================================

// <> proses absensi

if ($_GET['PageAction'] == "attendance_checkout") {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $token_session = $_SESSION['token'];
    $token_post    = mysqli_real_escape_string($conn, $_POST['token']);

    if ($token_session === $token_post) {

        $id_attendance           = mysqli_real_escape_string($conn, $_POST['id_attendance']);
        $id_internship           = mysqli_real_escape_string($conn, $_POST['id_internship']);
        $nim                     = mysqli_real_escape_string($conn, $_POST['nim']);
        $type_attendance         = mysqli_real_escape_string($conn, $_POST['type_attendance']);
        $week                    = mysqli_real_escape_string($conn, $_POST['week']);
        $notes                   = mysqli_real_escape_string($conn, $_POST['notes']);
        $check_in                = date("Y-m-d H:i:s");
        $approval_dpm            = 'PENDING';
        $approval_spv            = 'PENDING';
        // $filelogbook             = $_FILES['file1']['name'];
        // $suffix                  = rand(0000000, 9999999);
        // $status                  = mysqli_real_escape_string($conn, $_POST['status']);

        if ($_SESSION) {
            $input = $conn->query("INSERT INTO `tb_attendance` (`id_attendance`, `id_internship`, `nim`, `type_attendance`, `notes`, `week`, `check_in`, `approval_dpm`, `approval_spv` ) VALUES ('', '$id_internship', '$nim', '$type_attendance', '$notes', '$week', '$check_in', 'Pending', 'Pending');") or die(mysqli_error($conn));

            if ($input) {
                echo "
                    <script type='text/javascript'>
                    setTimeout(function () { 
                    swal({
                                title: 'Saved Data',
                                text:  'Harap tunggu anda akan diarahkan ke page Dashboard',
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: true
                            });  
                    },10); 
                    window.setTimeout(function(){ 
                        window.location.replace('index.php?page=attendance');
                    } ,3000); 
                    </script>
                    ";
            }
            if ($input) {
                echo '<script language="javascript">alert("Berhasil"); document.location="index.php?page=attendance";</script>';
            }
        }
    }
}
// </> proses absensi


// ====================================================================


// <> proses final report

if ($_GET['PageAction'] == "finalreport") {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $token_session = $_SESSION['token'];
    $token_post    = mysqli_real_escape_string($conn, $_POST['token']);
    $nik           = $_SESSION['user_nik'];
    $tipe_file     = $_FILES['finalreport']['type']; //mendapatkan mime type
    mime_content_type($_FILES['finalreport']['tmp_name']);

    if ($token_session === $token_post) {

        // $id_intership                  = mysqli_real_escape_string($conn, $_POST['id_internship']);
        // $finalreport_date              = mysqli_real_escape_string($conn, $_POST['finalreport_date']);
        $finalreport                   = $_FILES['finalreport']['name'];
        $suffix                        = rand(0000000, 9999999);


        if ($_SESSION['user_nik'] != null) {

            // var_dump( $_SESSION ); exit;

            $nim = $_SESSION['user_nik'];


            //mengganti nama pdf
            $nama_baru = "$nik _" . $suffix . ".pdf"; //hasil contoh: file_1.pdf
            $file_temp = $_FILES['finalreport']['tmp_name']; //data temp yang di upload

            move_uploaded_file($file_temp, "file_finalreport/" . $nama_baru); //fungsi upload

            $tambah_finalreport = $conn->query("UPDATE `tb_internship` SET 
            `date_finalreport` = CURRENT_TIMESTAMP(), `final_report` =  '$nama_baru' WHERE `nim` = $nim ;");




            if ($tambah_finalreport === true) {
                echo "
                <script type='text/javascript'>
                setTimeout(function () { 
            Swal.fire({
              type: 'success',
              title: 'Penambahan User Berhasil',
              showConfirmButton: false
            });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('index.php?page=finalreport');
                } ,3000); 
                </script>
              ";
            }
        } else {
            echo '<script language="javascript">alert("User Gagal ditambah"); document.location="index.php?page=finalreport";</script>';
            //echo("Error description: " . $conn -> error);

        }
    } else {
        //echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_peneliti";</script>';
        echo "
                  <script type='text/javascript'>
                   setTimeout(function () { 
              Swal.fire({
                type: 'error',
                title: 'Field data cannot be empty',
                showConfirmButton: false
              });  
                   },10); 
                   window.setTimeout(function(){ 
                    window.location.replace('index.php?page=finalreport');
                   } ,3000); 
                  </script>
              ";
    }
}
// } else {
//     echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="index.php";</script>';
// }


// home, data magang

// ====================================================================

//add disscuss
if ($_GET['PageAction'] == "add_discuss") {
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    date_default_timezone_set('Asia/Jakarta');
    $token_session = $_SESSION['token'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $started = $_SESSION['nama'];
    $date = date('Y-m-d H:i:s');
    $nik  = $_SESSION['user_nik'];

    if ($token_session) {
        $query = mysqli_query($conn, "SELECT * FROM (tb_internship LEFT JOIN tb_lecturer ON tb_internship.nik = tb_lecturer.nik) LEFT JOIN tb_student_internship ON tb_student_internship.nim = tb_internship.nim LEFT JOIN tb_user_company ON tb_internship.id_user_company = tb_user_company.id_user_company WHERE tb_internship.nim='$nik'");
        $inc = mysqli_num_rows($query);

        if (!$query) {
            echo $conn->error;
        } else {
            while ($data = mysqli_fetch_assoc($query)) {
                $json[] = $data['id_internship'];
                $json[1] = $data['id_user_company'];
                $json[] = $nik;
            }
        }
        $json = json_encode($json);
        // echo "<p>";
        // echo $title."<br/>";
        // echo $content."<br/>";
        // echo $id_own;
        // echo "</p>";
        // print_r($json);

        $insert = mysqli_query($conn, "INSERT INTO tb_discussion VALUES (NULL,'$started','$date','$json','$title','$content')");

        if ($insert) {
            echo "
        <script type='text/javascript'>
         setTimeout(function () { 
          swal({
            title: 'Success',
            text: 'Added Succcesfully!',
            icon: 'success',
            buttons: false
          }); 
         },10); 
         window.setTimeout(function(){ 
          window.history.back();
         } ,2000); 
        </script>
        ";
        } else {
            echo ("Error description: " . $conn->error);
        }
    }
}

// ====================================================================

if ($_GET['PageAction'] == 'add_comment') {

    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    $id_diskusi = $_POST['id_diskusi'];
    $started_by = $_SESSION['nama'];
    $komen = $_POST['komentar'];
    $date = date('Y-m-d H:i:s');


    $query = mysqli_query($conn, "INSERT INTO tb_comment_discussion VALUES (NULL,'$id_diskusi','$started_by','$komen','$date')");

    if ($query) {
        echo "
      <script type='text/javascript'>
       setTimeout(function () { 
        swal({
          title: 'Success',
          text: 'Added Succcesfully!',
          icon: 'success',
          buttons: false
        }); 
       },10); 
       window.setTimeout(function(){ 
        window.history.back();
       } ,2000); 
      </script>
      ";
    } else {
        echo ("Error description: " . $conn->error);
    }
}


?>