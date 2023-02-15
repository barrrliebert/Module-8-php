<?php 
    include("config.php");
    session_start();
    

    if (empty($_SESSION['sadmin_username'])) {
        header('Location: login.php');
    }
    if (isset($_POST['btnUpdate'])) {

        $id = trim($_POST['id']);
        $nama = trim($_POST['tnama']);
        $email = trim($_POST['temail']);
        $komentar = trim($_POST['tkomentar']);

        $query = "UPDATE pengunjung SET nama='$nama',email='$email',komentar='$komentar' WHERE id='id'";
        mysqli_query($conn, $query) or die('Error, query failed. ' . mysqli_error($conn));
        header("Location: admin.php");
        exit();
    }
?>

<p>
    <?php 

        include 'config.php';

        $id = isset($_GET['id']); //disini
        $query = "SELECT * FROM pengunjung WHERE id = '$id'";
        $result = mysqli_query($conn, $query) or die('Error, query failed. ' . mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        list($id, $nama, $email, $komentar, $date, $ip) = $row;
    ?>

    <form name="updateform" id="updateform" method="post">
        <input type="hidden" id="id" value="<?= $id; ?>" name="id">
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="komentar">
            <tr bgcolor="#FFDFAA">
                <td colspan="3">
                    <div align="center"><strong>Update Guestbook </strong></div>
                </td>
            </tr>
            <tr>
                <td width="27%" align="left" valign="top">Nama</td>
                <td width="2%" align="center" valign="top">:</td>
                <td width="71%" valign="top"><input type="text" name="tnama" id="tnama" size="50" maxlength="100" value="<?= $nama; ?>"></td>
            </tr>
            <tr>
                <td align="left" valign="top">Email</td>
                <td align="center" valign="top">:</td>
                <td valign="top"><input type="text" name="temail" id="temail" size="50" maxlength="50" value="<?= $email; ?>"></td>
            </tr>
            <tr>
                <td align="left" valign="top">Comment</td>
                <td align="center" valign="top">:</td>
                <td valign="top">&nbsp;</td>
            </tr>
            <tr>
                <td valign="top">&nbsp;</td>
                <td valign="top">&nbsp;</td>
                <td align="left" valign="top"><textarea name="tkomentar" id="tkomentar" cols="60" rows="15"><?= $komentar; ?></textarea></td>
            </tr>
            <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td align="center" valign="top">&nbsp;</td>
                <td valign="top"><input type="submit" name="btnUpdate" class="box" id="btnUpdate" value="Update"></td>
            </tr>
        </table>
    </form>
</p>