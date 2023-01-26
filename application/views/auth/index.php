<div class="card mt-5'" style="width: 30rem; margin:auto;">
  <div class="card-body"> 
    <h1  class="card-header">LOGIN </h1>
      <?php if( $this->session->flashdata('message') ) : ?>
        <div class="alert alert-success" role="alert">
  <?=  $this->session->flashdata('message'); ?> <a href="#" class="alert-link"></a>
</div>
    <?php endif; ?>
  <form method="post" action="<?= base_url('auth/index');?>">
     <div class="mb-3">
       <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username">
          <?= form_error('username', '<small class"text-danger pl-3">', '</small>');?>
         </div>
     <div class="mb-3">
   <label for="password" class="form-label">Password</label>
 <input type="password" class="form-control" id="passowrd" name="password">
<?= form_error('password', '<small class"text-danger pl-3">', '</small>');?>
</div>
   <input type="submit" value="submit" class="btn btn-primary"></input>
    </form>
     </div>
      </div>