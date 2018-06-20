<!DOCTYPE html>
<html>
<head>
    <title>Form Add</title>
</head>
<body>
    <table>
        <form method="post" action="<?php echo base_url(). "index.php/mahasiswa/insert"; ?>">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input required type="text" name="nama" placeholder="Masukan Nama Anda.."></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea style="resize: none;" name="alamat"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        </form>
    </table>
</body>
</html>