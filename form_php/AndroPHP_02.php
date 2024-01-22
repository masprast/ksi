<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }

        .teks {
            margin-right: 8
        }

        .box {
            border: 4px solid black;
            width: 70%;
        }

        .submit {
            font-weight: bold;
            text-decoration: none;
            color: black;
            display: block;
            background-color: #FFFFFF;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    $username = $password = $password_rev = "";
    $username_err = $password_err = $info = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $username_err = "Wajib diisi";
        } else {
            $username = test_input($_POST["username"]);
        }

        if (empty($_POST["password"])) {
            $password_err = "Wajib diisi";
        } else {
            $password = test_input($_POST["password"]);
            $password_rev = reverse($username);
        }

        if ($password == $password_rev) {
            $info = "Berhasil";
        } else {
            $info = "Gagal";
        }
    }

    function reverse($str)
    {
        for ($i = strlen($str) - 1, $j = 0; $j < $i; $i--, $j++) {
            $temp = $str[$i];
            $str[$i] = $str[$j];
            $str[$j] = $temp;
        }
        return $str;
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form name:"php2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Username</td>
                <td><input class="box" type="text" name="username"></td>
                <td><span class="error"> <?php echo $username_err ?></span></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input class="box" type="text" name="password"></td>
                <td><span class="error"> <?php echo $password_err ?></span></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="submit box" type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
    <br />

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ?>
        <p><?php echo $info ?></p>
    <?php
    }
    ?>

</body>

</html>