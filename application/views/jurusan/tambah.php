<div class="container">
    <form action ="" method="post">
        <legend>Tambah Jurusan</legend>
        <div class="mb-3">
            <label for="jurusan" class="form-label"> Nama Jurusan</label>
            <input type="text" class="form-control" Id="jurusan" name="jurusan" style="width : 300px;">
            <div class="form-text text-danger"><? form_error('jurusan'); ?></div>
        </div>
        <input type="Submit" value="Submit" class="btn btn-primary"></input>
    </form>
</div>