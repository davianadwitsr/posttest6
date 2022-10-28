<link rel="stylesheet" href="styles.css">

<?php 
    require 'connection.php';

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM mango WHERE id = $id");

    if($result){
        echo "
        <script>
            alert('Data telah berhasil dihapus');
            document.location.href = 'read.php';
        </script>";
    } else{
        echo "
        <script>
            alert('Data gagal dihapus');
            document.locatin.href = 'read.php';
        </script>";
    }
?>
