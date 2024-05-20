<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Siswa</title>
</head>
<body style="background-color: Orange;">
    <h1 style="text-align: center; background-color: white;"> MASUKAN DATA SISWA</h1>
    <form method="POST" action="" style="display:flex; justify-content:center;">
        <table border="1"> 
    <tr>
        <td><label for="nama">NAMA :</label></td>
        <td><input type="text" name="nama" id="nama"/></td> 
    </tr>  
    <tr>  
        <td><label for="nis">NIS :</label></td>
        <td><input type="text" name="nis" id="nis"/></td>
    </tr>    
    <tr>
        <td><label for="rayon">RAYON :</label></td>
        <td><input type="text" name="rayon" id="rayon"/></td>
    </tr>    
        <td><button type="submit" name="kirim">Kirim</button></td>
        <td><button type="submit" name="reset">Reset</a></button></td>
        </table>
    </form>
<!--pembuka php-->
    <?php
//memulai sesi
session_start();

//kalo array multidimensi belum ada, maka buat dulu
if(isset($_POST['reset'])){
    session_unset();
}

//proses button hapus pada tabel tampil data
if(isset($_GET['hapus'])){
    $index = $_GET['hapus'];
    unset($_SESSION['datasiswa'][$index]);
}

//untuk membuat sesi data array multidimensi
if(!isset($_SESSION['datasiswa'])){
    $_SESSION['datasiswa'] = array();
}

//kalo array ada, maka buat array dari data yang dimasukkan
if(isset($_POST['kirim'])){
if(@$_POST['nama'] && @$_POST['nis'] && @$_POST['rayon']){
    $data = [
        'nama'=> $_POST['nama'],
        'nis'=> $_POST['nis'],
        'rayon'=> $_POST['rayon'],
    ];
    array_push($_SESSION['datasiswa'], $data);
}else{
    echo "<p>Lengkapi data</p>";
}
}

//var_dump($_SESSION);
if(!empty($_SESSION['datasiswa'])){
echo '<table>';
echo '<tr>';
echo '<td> NAMA :</td>';
echo '<td> NIS :</td>';
echo '<td> RAYON :</td>';
echo '<td> AKSI :</td>';
echo '</tr>';

//nampilin data pake table
foreach($_SESSION['datasiswa'] as $index => $value){
    echo '<tr>';
    echo '<td>'. $value['nama']. '</td>';
    echo '<td>'.$value['nis']. '</td>';
    echo '<td>'.$value['rayon']. '</td>';
    echo '<td><a href="?hapus='.$index .' ">HAPUS</a></td>';
    echo '<tr>';
}
echo '</table>';
} else {
    echo "Data nya masih kosoing nih broo,isi broo!!";
}
?>
</body>
</html>