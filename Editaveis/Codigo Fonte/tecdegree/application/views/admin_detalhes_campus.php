
      <!--main content start-->
      <section id="main-content">
        <?php 
            if($this->session->flashdata('sucesso') == TRUE){
                echo '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sucesso!</strong> Campus cadastrada com sucesso!</div>'; 
            }
        ?>
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Detalhes Campus</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Instituição a que esse campus pertence</h4>
                      <form class="form-horizontal style-form" method="post" action="<?php echo base_url('admin/edita_campus');?>">

                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Instituição</label>
                          <div class="col-sm-10">
                            <?php 
                              echo '<a href="'.base_url('admin/detalhes_instituicao/'.$instituicao['id'].'').'" class="button">'.$instituicao['sigla'].'-'.$instituicao['nome'].  '</a></br>';
                              echo '</br></br>'
                            ?>
                          </div>
                        </div>

                        <h4 class="mb"><i class="fa fa-angle-right"></i> Informações sobre o campus</h4>

                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Descrição</label>
                              <div class="col-sm-10">
                                  <textarea type="text" id="descricao"  name="descricao" class="form-control" required="" style="min-height: 300px;" ><?php echo $campus['descricao'] ?></textarea>
                                  <span class="help-block">Breve descrição do campus</span>
                              </div>
                        </div>   

                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Telefone</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefone" name="telefone" <?php echo 'value="'.$campus['telefone']?>">
                              </div>
                          </div>

                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Cidade</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="cidade" name="cidade" required="" <?php echo 'value="'.$campus['cidade']?>">
                              </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="estado" name="estado" required="">
                                    <option><?php echo $campus['estado']?></option>
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
                                <input type="text" class="form-control" id="endereco" name="endereco" required="" <?php echo 'value="'.$campus['endereco']?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Registro ativo</label>
                              <div class="col-sm-10">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
                                <label class="form-check-label" for="defaultCheck2">
                                  Não é possivel desativar um campus que tenha cursos cadastrados
                                </label>
                              </div>
                              </div>
                          </div>

                          
                              <input type="hidden" name="id" <?php echo 'value="'.$campus['id']?>">



                              <input type="hidden" name="instituicao" <?php echo 'value="'.$instituicao['id']?>">



                          <h4 class="mb"><i class="fa fa-angle-right"></i> Cursos que pertencem a esse campus</h4>

                          <?php 
                            foreach($curso as $item){
                            echo '<a href="'.base_url('admin/detalhes_curso/'.$item['id'].'').'" class="button">'.$item['tipo'].'-'.$item['periodo'].  '</a></br>';
                            echo '</br></br>';
                          }

                          ?>

                          <button type="submit" class="btn btn-theme">Confirmar</button>

                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
            


            