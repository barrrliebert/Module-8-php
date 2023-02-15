<html>
<head>
    <title>login php</title>
</head>
<body>
    <form action="validasi.php" method="post" name="login">
        <table width="50%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFBF0" class="content">
            <tr>
                <td colspan="3">
                    <div align="center"><strong>Login Admin </strong></div>
                </td>
            </tr>
            <tr>
                <td width="38%"><strong>Username</strong></td>
                <td width="4%">:</td>
                <td width="58%"><input type="text" name="tusername" id="tusername" size="20" maxlength="20"></td>
            </tr>
            <tr>
                <td><strong>Password</strong></td>
                <td>:</td>
                <td><input type="password" name="tpasswd" id="tpasswd" size="20" maxlength="20"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <div align="center"></div>
                </td>
            </tr>
            <tr>
                <td><a href="index.php">Kembali Ke Index</a></td>
            </tr>
        </table>
    </form>
</body>
</html>