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

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0 1em;
        }
    </style>
</head>

<body>

    <?php
    $nama = $alamat = $telp = $kelamin = "";
    $nama_err = $alamat_err = $telp_err = $kelamin_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $nama_err = "Wajib diisi";
        } else {
            $nama = test_input($_POST["nama"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
                $nama_err = "Hanya menerima huruf";
            }
        }

        if (empty($_POST["alamat"])) {
            $alamat_err = "Wajib diisi";
        } else {
            $alamat = test_input($_POST["alamat"]);
        }

        if (empty($_POST["telp"])) {
            $telp_err = "Wajib diisi";
        } else {
            $telp = test_input($_POST["telp"]);
            if (!preg_match("/[0-9]/", $telp)) {
                $telp_err = "Hanya menerima angka";
            }
        }

        if (empty($_POST["kelamin"])) {
            $kelamin_err = "Pilih salah satu";
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form name:"php1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td><input class="box" type="text" name="nama"></td>
                <td><span class="error"> <?php echo $nama_err ?></span></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input class="box" type="text" name="alamat"></td>
                <td><span class="error"> <?php echo $alamat_err ?></span></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input class="box" type="number" name="telp"></td>
                <td><span class="error"> <?php echo $telp_err ?></span></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select class="box" name="kelamin">
                        <option value=""> - </option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
                <td><span class=" error"> <?php echo $kelamin_err ?></span>
                </td>
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
    $kelamin = htmlspecialchars($_POST['kelamin'])
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ?>
        <p><?php echo $nama ?></p>
        <p><?php echo $alamat ?></p>
        <p><?php echo $telp ?></p>
        <p><?php
            if ($kelamin) :
                echo $kelamin;
            endif
            ?></p>
    <?php
    }
    ?>

</body>

</html>