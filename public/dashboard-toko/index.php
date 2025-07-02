<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Toko</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
function get_api_data()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost:8080/api",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Key: random123678abcghi",
        ),
    ));

    $output = curl_exec($curl);

    if (curl_errno($curl)) {
        echo 'Curl error: ' . curl_error($curl);
        return null;
    }

    curl_close($curl);

    $data = json_decode($output);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON decode error: " . json_last_error_msg();
        return null;
    }

    return $data;
}

$send1 = get_api_data();
?>

<div class="p-3 pb-md-4 mx-auto text-center">
  <h1 class="display-4 fw-normal text-body-emphasis">Dashboard - TOKO</h1>
  <p class="fs-5 text-body-secondary"><?= date("l, d-m-Y") ?> <span id="jam"></span>:<span id="menit"></span>:<span id="detik"></span></p>
</div>
<hr>

<div class="table-responsive card m-5 p-5">
  <table class="table text-center table-bordered">
    <thead class="table-light">
      <tr>
        <th style="width: 5%;">No</th>
        <th style="width: 10%;">Username</th>
        <th style="width: 25%;">Alamat</th>
        <th style="width: 10%;">Total Harga</th>
        <th style="width: 10%;">Ongkir</th>
        <th style="width: 10%;">Status</th>
        <th style="width: 10%;">Jumlah Item</th>
        <th style="width: 20%;">Tanggal Transaksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (!empty($send1)) {
        $hasil1 = $send1->results;
        $i = 1;

        if (!empty($hasil1)) {
          foreach ($hasil1 as $item1) {
      ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $item1->username ?></td>
              <td><?= $item1->alamat ?></td>
              <td><?= number_format($item1->total_harga) ?></td>
              <td><?= number_format($item1->ongkir) ?></td>
              <td><?= $item1->status == 1 ? 'Sudah Selesai' : 'Belum Selesai' ?></td>
              <td><?= $item1->jumlah_item ?? 0 ?></td>
              <td><?= $item1->created_at ?></td>
            </tr>
      <?php
          }
        }
      }
      ?>
    </tbody>
  </table>
</div>

<script>
  function waktu() {
    const waktu = new Date();
    document.getElementById("jam").innerHTML = String(waktu.getHours()).padStart(2, '0');
    document.getElementById("menit").innerHTML = String(waktu.getMinutes()).padStart(2, '0');
    document.getElementById("detik").innerHTML = String(waktu.getSeconds()).padStart(2, '0');
    setTimeout(waktu, 1000);
  }
  window.onload = waktu;
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
