<?php
include("config.php")
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>tugas prak mg 6</title>
</head>

<body>

  <div id="filter">
    <select name="fetchval" id="fetchval">
      <option value="" disabled="" selected="">Select Filter</option>
      <option>Teknik Informatika</option>
      <option>Matematika</option>
      <option>Fisika</option>
    </select>
  </div>

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Prodi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $query = "SELECT * FROM data_tabel";
        $r = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($r)) {
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
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#fetchval").on('change', function() {
        var value = $(this).val();
        //alert(value);

        $.ajax({
          url: "fetch.php",
          type: "POST",
          data: 'request=' + value,
          beforeSend: function() {
            $(".container").html("<span>Working...</span>");
          },
          success: function(data) {
            $(".container").html(data);
          }
        });
      });
    })
  </script>

</body>

</html>