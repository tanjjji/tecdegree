
      <!--main content start-->
      <section id="main-content">
        <?php 
            if($this->session->flashdata('sucesso') == TRUE){
                echo '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sucesso!</strong> Instituição cadastrada com sucesso!</div>'; 
            }
        ?>
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Detalhes Instituição</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Informações sobre a instituição</h4>
                      <form class="form-horizontal style-form" method="post" action="<?php echo base_url('Admin/edita_instituicoes');?>">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nome Completo da instituição</label>
                              <div class="col-sm-10">
                                <input type="text" name="nome" id="nome" class="form-control" required="" <?php echo 'value="'.$instituicao['nome']?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Sigla</label>
                              <div class="col-sm-10">
                                  <input type="text" id="sigla" name="sigla" class="form-control" required="" <?php echo 'value="'.$instituicao['sigla']?>" >
                                  <span class="help-block">Sigla utilizada para reconhecer a instituição</span>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Descrição</label>
                              <div class="col-sm-10">
                                  <textarea type="text" id="descricao"  name="descricao" class="form-control" required="" style="min-height: 300px;" ><?php echo $instituicao['descricao'] ?></textarea>
                                  <span class="help-block">Breve descrição do instituição com informações que não constam no formulario.</span>
                              </div>
                          </div>   

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Categoria Administrativa</label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="categoria_adm" name="categoria_adm" required="" >
                                    <option><?php echo $instituicao['categoria_adm']?></option>
                                    <option>Publica - Estadual</option>
                                    <option>Publica - Municipal</option>
                                    <option>Publica - Federal</option>
                                    <option>Privada - Sem fins lucrativos</option>
                                    <option>Privada - Com fins lucrativos</option>
                                    <option>Cooperativa publico-privada</option>
                                    <option>Outro</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Site</label>
                              <div class="col-sm-10">
                                <input type="text" id="site" name="site" class="form-control" <?php echo 'value="'.$instituicao['site']?>" >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Registro ativo</label>
                              <div class="col-sm-10">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
                                <label class="form-check-label" for="defaultCheck2">
                                  Não é possivel desativar uma instituicao que tenha campus/cursos cadastrados
                                </label>
                              </div>
                              </div>
                          </div>


                          <h4 class="mb"><i class="fa fa-angle-right"></i> Campus cadastrados nessa universidade</h4>

                          <?php
                            foreach ($campus as $item){
                            echo '<a href="'.base_url('admin/detalhes_campus/'.$item['id'].'').'" class="button">'.$item['cidade'].'-'.$item['estado'].' - '.$item['endereco'].  '</a></br>';
                            echo '</br></br>';
                            }
                          ?>

                          <div class="form-group">
                              <input type="hidden" name="id" <?php echo 'value="'.$instituicao['id']?>">
                          </div>

                          
                          
                          <button type="submit" class="btn btn-theme">Confirmar</button>

                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	