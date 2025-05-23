<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>
  <script>
    //         const myModal = document.getElementById('myModal')
    // const myInput = document.getElementById('myInput')

    // myModal.addEventListener('shown.bs.modal', () => {
    //   myInput.focus()
    // })

  </script>

</head>

<body>

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            onclick="window.location.href='<?= site_url('GstValidation') ?>'" aria-label="Close"></button>
        </div>
        <!-- <p>Modal body text goes here.</p> -->
        <!-- ********************************************************************** -->

        <h1 class="modal-title fs-5" id="staticBackdropLabel">Valid GSTIN</h1>
        <table border="1">
          <thead>
            <tr>
              <th>SL_NO</th>
              <th>GSTIN</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($validGSTIN)): ?>
              <?php foreach ($validGSTIN as $row): ?>
                <tr>
                  <td><?php echo $row['SL_ID']; ?></td>
                  <td><?= $row['GSTIN']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
        <!-- ********************************************************************** -->

        <!-- </div> -->
        <!-- <div class="modal-footer"> -->

        <!-- <button type="button" class="btn btn-secondary"
          onclick="window.location.href='<?= site_url('GstValidation') ?>'" data-bs-dismiss="modal"
          style="width: 4em; display: block; margin: 0 auto; background-color: #3498db; height: 1.5em; padding: 1.5em">Close</button> -->

        <!-- <button type="button" class="btn btn-secondary"
          onclick="window.location.href='<?= site_url('GstValidation') ?>'" data-bs-dismiss="modal"
          style="background-color: #3498db; width: 4em; margin: 0 auto; height: 2em;">Close</button> -->

<!-- ***************************************************** -->
<!-- ***************************************************** -->
<!-- ***************************************************** -->


        <!-- <button type="button" class="btn btn-secondary"
          onclick="window.location.href='<?= site_url('GstValidation') ?>'" data-bs-dismiss="modal" style="
    background-color: #3498db;
    width: 4em;
    margin: 0.5em auto 0.5 auto;
    height: 2em;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
">Close</button> -->

<button type="button" class="btn btn-secondary"
          onclick="window.location.href='http://192.168.50.242:5173/'" data-bs-dismiss="modal" style="
    background-color: #3498db;
    width: 4em;
    margin: 0.5em auto 0.5 auto;
    height: 2em;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
">Close</button>
<!-- ***************************************************** -->
<!-- ***************************************************** -->
<!-- ***************************************************** -->


        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
  </div>

  <script>
    const myModal = new bootstrap.Modal(document.querySelector('.modal'));
    myModal.show();
  </script>

</body>

</html>