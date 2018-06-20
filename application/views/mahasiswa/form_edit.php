<!DOCTYPE html>
<html>
<head>
    <title>Form Update</title>
</head>
<body>
    <table>
        <form method="post" action="<?php echo base_url()."index.php/mahasiswa/update_data"; ?>">
            <tr>
                <td>Nomor Induk</td>
                <td>:</td>
                <td>
                    <input required type="text" placeholder="Masukan Nama Anda.." value="<?php echo $no_induk; ?>" disabled>
                    <input type="hidden" name="ni" value="<?php echo $no_induk?>">
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input required type="text" name="nama" placeholder="Masukan Nama Anda.." value="<?php echo $nama ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea style="resize: none;" name="alamat"><?php echo $alamat; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Update"></td>
            </tr>
        </form>
    </table>
</body>
</html>