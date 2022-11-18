<?php

include("config.php");
if (isset($_POST['request'])) {
    $request = $_POST['request'];

    $query = "SELECT * FROM data_tabel WHERE prodi = '$request'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

?>

    <table class="table">
        <?php
        if ($count) {

        ?>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                </tr>

            <?php
        } else {
            echo "data tidak ditemukan";
        }

            ?>
            </thead>

            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['no'] ?></td>
                        <td><?php echo $row['nim'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['prodi'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
    </table>

<?php
}
?>