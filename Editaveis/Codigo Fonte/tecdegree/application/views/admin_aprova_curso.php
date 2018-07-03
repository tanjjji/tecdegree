
      <!--main content start-->
      <section id="main-content">
        <?php 
            if($this->session->flashdata('sucesso') == TRUE){
                echo '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sucesso!</strong> Curso cadastrado com sucesso!</div>'; 
            }
        ?>
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Detalhes Curso</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Instituição a qual o curso pertence</h4>
                      <form class="form-horizontal style-form" method="post" action="<?php echo base_url('Admin/atualiza_curso');?>" enctype="multipart/form-data">

                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Instituição</label>
                            <div class="col-sm-10">

                            <?php 
                              echo '<a href="'.base_url('admin/detalhes_instituicao/'.$instituicao['id'].'').'" class="button">'.$instituicao['sigla'].'-'.$instituicao['nome'].  '</a></br>';
                              echo '</br></br>'
                            ?>

                            </div>
                        </div>

                        <h4 class="mb"><i class="fa fa-angle-right"></i> Campus que o curso pertence</h4>

                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Campus</label>
                            <div class="col-sm-10">

                            <?php 
                              echo '<a href="'.base_url('admin/detalhes_campus/'.$campus['id'].'').'" class="button">'.$instituicao['sigla'].'-'.$campus['cidade'].  '</a></br>';
                              echo '</br></br>'
                            ?>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Curso</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tipo" name="tipo" required="">
                                    <option><?php echo $curso['tipo']?></option>
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
                                    <option><?php echo $curso['periodo']?></option>
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
                                  <input type="text" id="duracao" name="duracao" class="form-control" required=""  <?php echo 'value="'.$curso['duracao'].'"' ?> >
                                  <span class="help-block">Duração do curso em anos </span>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Admissão</label>
                              <div class="col-sm-10">
                                  <input type="text" id="admissao" name="admissao" class="form-control" required="" <?php echo 'value="'.$curso['admissao'].'"' ?>>
                                  <span class="help-block">Ex. Vestibular Proprio, Enem, Entrevista, Analise de curriculo escolar</span>
                              </div>
                          </div> 

             
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Indicador ENADE</label>
                              <div class="col-sm-10">
                                  <input type="text" id="avaliacao_enade" name="avaliacao_enade" class="form-control" <?php echo 'value="'.$curso['duracao'].'"' ?>>
                                  <span class="help-block">Avaliação do curso no enade</span>
                              </div>
                          </div>   

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Descrição</label>
                              <div class="col-sm-10">
                                  <textarea type="text" id="descricao"  name="descricao" class="form-control" required="" style="min-height: 300px;" ><?php echo $curso['descricao'] ?></textarea>
                                  <span class="help-block">Breve descrição do curso com informações que não constam no formulario.</span>
                              </div>
                          </div>   

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mensalidade</label>
                              <div class="col-sm-10">
                                  <input type="text" id="mensalidade" name="mensalidade" class="form-control" required="" <?php echo 'value="'.$curso['duracao'].'"' ?>>
                                  <span class="help-block">Custo mensal do curso</span>
                              </div>
                          </div>  

                          <input type="hidden" name="id" <?php echo 'value="'.$curso['id']?>">

                          <button type="submit" class="btn btn-theme">Ativar</button>
                          <button type="submit" class="btn btn-danger" formaction="<?php echo base_url('Admin/remover_curso');?>">Recusar</button>

                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
            

    <script type="text/javascript">
        
        $("#mensalidade").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false})
      
    </script>
