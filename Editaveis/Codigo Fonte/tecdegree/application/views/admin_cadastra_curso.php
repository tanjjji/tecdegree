


      <!--main content start-->
      <section id="main-content">
        <?php 
            if($this->session->flashdata('sucesso') == TRUE){
                echo '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sucesso!</strong> Curso cadastrado com sucesso!</div>'; 
            }
        ?>
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Cadastrar Curso</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Preencha o formulario para cadastrar uma novo curso</h4>
                      <form class="form-horizontal style-form" method="post" action="<?php echo base_url('Admin/salva_curso');?>" enctype="multipart/form-data">

                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Campus</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_campus" name="id_campus" required="">
                                <option></option>>
                                <?php
                                  foreach($campus as $item){
                                    echo '<option value="'.$item->id.'">'.$item->nome.'</option>';
                                  }
                                ?> 
                                </select>
                                <a href="<?php echo base_url('admin/cadastro_campus');?>" class="button">Cadastrar um novo campus</a>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Curso</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tipo" name="tipo" required="">
                                    <option></option>
                                    <option>Ciência da Computação</option>
                                    <option>Sistemas de Informação</option>
                                    <option>Engenharia da Computação</option>
                                    <option>Redes de Computadores</option>
                                    <option>Tecnologia em Banco de Dados</option>
                                    <option>Analise e Desenvolvimento de sistemas</option>
                                    <option>Engenharia de software</option>
                                    <option>Sistemas para internet</option>
                                    <option>Jogos Digitais</option>
                                    <option>Outro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Periodo</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="periodo" name="periodo" required="">
                                    <option></option>
                                    <option>Matutino</option>
                                    <option>Vespertino</option>
                                    <option>Noturno</option>
                                    <option>Integral</option>
                                    <option>Vespertino-Noturno</option>
                                </select>
                            </div>
                        </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Duração</label>
                              <div class="col-sm-10">
                                  <input type="text" id="duracao" name="duracao" class="form-control" required="">
                                  <span class="help-block">Duração do curso em anos </span>
                              </div>
                          </div>
             
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Indicador ENADE</label>
                              <div class="col-sm-10">
                                  <input type="text" id="avaliacao_enade" name="avaliacao_enade" class="form-control">
                                  <span class="help-block">Avaliação do curso no enade</span>
                              </div>
                          </div>   
  



                          <button type="submit" class="btn btn-theme">Confirmar</button>

                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
            

