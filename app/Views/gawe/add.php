<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="section-header-button">
        <a href="<?= base_url('/'); ?>">Kembali</a>
    </div>
    <form action="<?= base_url('gawe');?>" method="post">
    <?= csrf_field() ?>
        <div class="form-group">
            <label>Nama gawe</label>
            <input type="text" name="name_gawe" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal gawe</label>
            <input type="date" name="date_gawe" class="form-control">
        </div>
        <div class="form-group">
            <label>Buah</label>
            <select name="buah" class="form-control">
                <?php foreach ($buah as $buahs) : ?>
                <option value="<?= $buahs['id']; ?>"><?= $buahs['option']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Info</label>
            <textarea type="text" name="info_gawe" class="form-control"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>