<html>

<head>
    <title>Buku Tamu</title>
</head>

<body>
    <h2 align="center">Selamat datang di BukuTamu</h2>
    <div align="center">
        <tr>
            <td><a href="login.php">login</a></td>
            <td> | </td>
            <td><a href="input_user.php">Input User</a></td>
        </tr>
    </div>
    <p>
        <?php 
            include "config.php";
            $rowsperPage = 5;
            $pageNum = 1;

            if (isset($_GET['page'])) {
                $pageNum = $_GET['page'];
            }

            $offset = ($pageNum - 1) * $rowsperPage;
            $query = "SELECT * FROM pengunjung ORDER BY 'id' DESC LIMIT $offset, $rowsperPage";
            $result = mysqli_query($conn, $query) or die('Error, query failed 1');

            $query1 = "SELECT COUNT(id) AS numrows FROM pengunjung";
            $result1 = mysqli_query($conn, $query1) or die("Error, query failed 2");
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $numrows = $row1['numrows'];
            echo "Total nomor buktimu : $numrows";
        ?>
    </p>

    <?php 
        $no = 1;
    while ($hasil = mysqli_fetch_array($result)) {
        ?>
    <table width="99%" border="0" align="center" cellpadding="2" cellspacing="0" class="content">
        <tr valign="top">
            <td bgcolor="#FFDFF"><span class="style2">dari
                    <?php echo $hasil['nama']; ?> pada
                    <?php echo $hasil['date']; ?>
                </span></td>
        </tr>
        <tr valign="top">
            <td bgcolor="FFBFAA">
                <?php echo $hasil['komentar']; ?>
            </td>
        </tr>
    </table>

    <?php $no++;
                echo "<br>";
         
    }?>

    <?php 
        $query = "SELECT COUNT(id) AS numrows FROM pengunjung";
        $result = mysqli_query($conn, $query) or die("Error, query failed");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $numrows = $row['numrows'];

        $maxPage = ceil($numrows / $rowsperPage);

        $self = $_SERVER['PHP_SELF'];
        $nav = '';
        for ($page = 1; $page <= $maxPage; $page++) {
            if ($page == $pageNum) {
                $nav .= " $page ";
            } else {
                $nav .= " <a href=\"self?page=$page\">$page</a>";
            }
        }

        if ($pageNum > 1) {
            $page = $pageNum - 1;
            $prev = " <a href=\"$self?page=$page\">[Prev]</a> ";

            $first = " <a href=\"$self?page=1\">[First Page]</a> ";
        } else {
            $prev = '&nbsp;';
            $first = '&nbsp;';
        }

        if ($pageNum < $maxPage) {
            $page = $pageNum + 1;
            $next = " <a href=\"$self?page\">[Next]</a> ";

            $last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
        } else {
            $next = '&nbsp;';
            $last = '&nbsp';
        }

        echo "<center>$first " . " $prev " . " $nav " . " $next " . " $last</center>";
    ?>
    <?php 
        mysqli_close($conn);
    ?>
</body>

</html>