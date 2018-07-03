
      <!--main content start-->
      <section id="main-content">
        <?php 
            if($this->session->flashdata('sucesso') == TRUE){
                echo '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sucesso!</strong> Campus cadastrada com sucesso!</div>'; 
            }
        ?>
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Cadastrar novo campus</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Preencha o formulario para cadastrar uma novo campus</h4>
                      <form class="form-horizontal style-form" method="post" action="<?php echo base_url('admin/salva_campus');?>">

                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Instituição</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="instituicao" name="instituicao" required="">
                                <option></option>>
                                <?php
                                  foreach($instituicoes as $item){
                                    echo '<option value="'.$item->id.'">'.$item->sigla.'</option>';
                                  }
                                ?> 
                                </select>
                                <a href="<?php echo base_url('admin/cadastro_instituicao');?>" class="button">Cadastrar uma nova instituição</a>

                            </div>
                        </div>

                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Descrição</label>
                              <div class="col-sm-10">
                                  <textarea type="text" id="descricao"  name="descricao" class="form-control" required="" style="min-height: 300px;" ></textarea>
                                  <span class="help-block">Breve descrição do campus</span>
                              </div>
                        </div>   

                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Telefone</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefone" name="telefone">
                              </div>
                          </div>

                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Cidade</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="cidade" name="cidade" required="">
                              </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="estado" name="estado" required="">
                                    <option></option>
                                    <option>AC</option>
                                    <option>AL</option>
                                    <option>AP</option>
                                    <option>AM</option>
                                    <option>BA</option>
                                    <option>CE</option>
                                    <option>DF</option>
                                    <option>ES</option>
                                    <option>GO</option>
                                    <option>MA</option>
                                    <option>MT</option>
                                    <option>MS</option>
                                    <option>MG</option>
                                    <option>PA</option>
                                    <option>PB</option>
                                    <option>PR</option>
                                    <option>PE</option>
                                    <option>PI</option>
                                    <option>RJ</option>
                                    <option>RN</option>
                                    <option>RS</option>
                                    <option>RO</option>
                                    <option>RR</option>
                                    <option>SC</option>
                                    <option>SP</option>
                                    <option>SE</option>
                                    <option>TO</option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Endereço</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="endereco" name="endereco" required="">
                              </div>
                          </div>


                          <button type="submit" class="btn btn-theme">Confirmar</button>

                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
            
            