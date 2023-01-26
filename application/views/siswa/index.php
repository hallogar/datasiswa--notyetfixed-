<div class="container">
    <legend> Data Siswa</legend>
    <a class="btn btn-primary" href="<?= base_url('siswa/tambah'); ?>" role="button">Tambah Siswa</a>
    <?php if( $this->session->flashdata('flash') ) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
            Data Siswa <strong>Berhasil!</strong?> <?= $this->session->flashdata('flash'); ?>
            <button type="button" class="btn-close" dataa-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
        <form action="" method="post" class="d-flex mb-2 mt-2" role="search">
            <input class="form-control me-2" type="text" placeholder="Cari" aria-label="Search" name="keyword" style="width : 500px;">
            <button class="btn btn-outline-success" type="submit">Cari</button>
    </form>
  <table class="table">
  <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Nis</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Angkatan</th>
      <th scope="col">Jurusan</th>
      </tr>
  </thead>
  <tbody>
    <?php if( empty($siswa) ) : ?>
    <tr>
        <td colspan=2>
            <div class="alert alert-danger" role="alert">
                Data Tidak Ditemukan
             </div>
        </td>
    <tr>
      <?php endif; ?>
      <?php $i=1; ?>
      <?php foreach( $siswa as $sis ) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $sis['Nis']; ?></td>
      <td><img src="<? base_url('assets/foto/') . $sis['foto']; ?>" class="img-thumbnail" width="225" height="330"></td>
      <td><? $sis['Nama']; ?></td>
      <td><? $sis['Angkatan']; ?></td>
      <td><? $sis['Jurusan']; ?></td>
      <td>
        <a href="<?= base_url('siswa/detail/'); ?><?= $sis['Id']; ?>" class="badge text-bg-warning">Detail</a>
        <a href="<?= base_url('siswa/ubah/'); ?><?= $sis['Id']; ?>" class="badge text-bg-warning">Ubah</a>
        <a href="<?= base_url('siswa/hapus/'); ?><?= $sis['Id']; ?>" class="badge text-bg-danger" onclick="rerturn confirm('yakin?');">Hapus</a>       
                </td>
             </tr>
           <?php endforeach; ?>
         </tbody>
      </table>
    </div>