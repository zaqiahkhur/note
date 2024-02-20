<?php
$koneksi = mysqli_connect("localhost", "root", "", "notes") or die;
function tampildata()
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, "SELECT note.id,note.note,note.note,note.created_at,user.username from note INNER JOIN user ON note.id_user=user.id_user;");
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) 
    {
        $rows[] = $row;
    }
    return $rows;
    
}
function tampildata_user($id_user)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, "SELECT * FROM note WHERE id_user= '$id_user';");
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) 
    {
        $rows[] = $row;
    }
    return $rows;
    
}


          function editdata($tablename,$id)
          {
            global $koneksi;
            $hasil=mysqli_query($koneksi, "select * from $tablename where id = $id");
            return $hasil;
          }

          function updatedata($table,$data,$id)
          {
            global $koneksi;
            $sql = "UPDATE $table SET note = '$data' WHERE id = '$id'";
            $hasil=mysqli_query($koneksi,$sql);
            return $hasil;
          } 

          function Delete($tablename,$id)
          {
            global $koneksi;
            $hasil=mysqli_query($koneksi,"delete from $tablename where id='$id'");
            return $hasil;
          }

          function cek_login($username,$password)
          {
            global $koneksi;
            $uname = $username;
            $upass = $password;

            $hasil= mysqli_query($koneksi,"select * from user where username='$uname' and password='$upass'");
            $cek=mysqli_num_rows($hasil);
            if($cek > 0){
              $sql= mysqli_fetch_array($hasil);
                $_SESSION ['id_user']=$sql['id_user'];
                $_SESSION ['username']=$sql['username'];
                $_SESSION ['role']=$sql['role'];
              return true;
            }else{
              return false;
            }

          }
          function inputdata($inputdata)
          {
            global $koneksi;
            $sql=mysqli_query($koneksi, $inputdata);
            return $sql;
          }

?>