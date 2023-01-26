<div class="container">
    <form action ="" method="post">
        <legend>Ubah Jurusan</legend>
        <div class="mb-3">
            <input type="hidden" name="Id" value="<?= $jurusan['Id']; ?>">
            <label for="jurusan" class="form-label"> Nama Jurusan</label>
            <input type="text" class="form-control" Id="jurusan" name="jurusan" value="<?= $jurusan['Jurusan']; ?>" style="width : 300px;">
            <div class="form-text text-danger"><?= form_error('jurusan'); ?></div>
        </div>
        <input type="Submit" value="Submit" class="btn btn-primary"></input>
    </form>
</div>