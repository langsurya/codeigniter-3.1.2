
    <main role="main">
        <div class="container">
            
            <div class="row">

                <div class="col-sm-2">
                  
                  <a class="btn btn-outline-primary" href="<?php echo base_url()."index.php/mahasiswa/add_data"; ?>"> Insert</a>
                  <br><br>
                </div>
                <div class="col-sm-12">
                    
                    <table class="table table-stripped table-bordered">
                      <thead>
                        <tr>
                            <th>No. Induk</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th colspan="2">Aksi</th>
                        </tr>                    
                      </thead>
                        <?php 
                          $no=1;
                          foreach ($mahasiswa as $data): ?>
                        <tr>
                            <td><?php echo $data->no_induk; ?></td>
                            <td><?php echo $data->nama; ?></td>
                            <td><?php echo $data->alamat; ?></td>
                            <td><a href="<?php echo base_url()."index.php/mahasiswa/edit_data/".$data->no_induk; ?>"><i class="fas fa-edit"></i> </a></td>
                            <td><a href="<?php echo base_url()."index.php/mahasiswa/delete_data/".$data->no_induk; ?>"><i class="fas fa-trash"></i> </a></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                    <nav aria-label="...">
                      <?php 
                        echo $this->pagination->create_links();
                      ?>
                    </nav>

                </div>

              </div>
        </div>
        
    </main>