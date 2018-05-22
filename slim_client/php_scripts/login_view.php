<!DOCTYPE>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css"></link>
</head>
<img src="../css/logo.png" width="100px" height="100px">
<h1>TO DO LIST(REST IMPLEMENTATION CLIENT)</h1>

<body>
    <form method="post" action="../php_scripts/login.php">
        <table>
            <tr>
                <th>
                    <label>Username</label>
                </th>
                <td>
                    <input type="email" name="username" placeholder="username@example.com" autocomplete="off" required>
                </td>
            </tr>
            <tr>
                <th>
                    <label>Password</label>
                </th>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <th>                  
                </th>
                <td>
                    <?php
                    if(isset($_GET['x']) && $_GET['x']==1)
                    {
                    ?>
                    Invalid credentials
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" name="login" value="Login">
                </td>
            </tr>
        </table>

    </form>

</body>
</html>