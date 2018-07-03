    <section id="imgBanner">
      <h2>Instituições</h2>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->

    
    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="courseArchive">
      <div class="container">
        <div class="row">
          <!-- start course content -->
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="courseArchive_content">              
             <div class="singlecourse_ferimg_area">  
                
      <!--main content start-->
      <section id="main-content">
        <?php 
            if($this->session->flashdata('sucesso') == TRUE){
                echo '<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sucesso!</strong> Instituição cadastrada com sucesso!</div>'; 
            }
        ?>
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Cadastrar nova instituição</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Preencha o formulario para cadastrar uma nova instituição</h4>
                      <form class="form-horizontal style-form" method="post" action="<?php echo base_url('Admin/salva_instituicao');?>">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nome Completo da instituição</label>
                              <div class="col-sm-10">
                                <input type="text" name="nome" id="nome" class="form-control" required="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Sigla</label>
                              <div class="col-sm-10">
                                  <input type="text" id="sigla" name="sigla" class="form-control" required="">
                                  <span class="help-block">Sigla utilizada para reconhecer a instituição</span>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Descrição da instituicao</label>
                              <div class="col-sm-10">
                                  <textarea type="text" id="descricao_instituicao"  name="descricao_instituicao" class="form-control" required="" style="min-height: 300px;" ></textarea>
                                  <span class="help-block">Breve descrição da instituicao com informações que não constam no formulario.</span>
                              </div>
                          </div>   

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Categoria Administrativa</label>
                              <div class="col-sm-10">
                                  <select class="form-control" id="categoria_adm" name="categoria_adm" required="">
                                    <option></option>
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
                                <input type="text" id="site" name="site" class="form-control">
                              </div>
                          </div>

                          <h4 class="mb"><i class="fa fa-angle-right"></i> Informações sobre o campus</h4>
                        

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Descrição</label>
                              <div class="col-sm-10">
                                  <textarea type="text" id="descricao"  name="descricao" class="form-control" required="" style="min-height: 300px;" ></textarea>
                                  <span class="help-block">Breve descrição do curso com informações que não constam no formulario.</span>
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
            
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="courseArchive_sidebar">
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Events <span class="fa fa-angle-double-right"></span></h2>
                <ul class="news_tab">
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#" class="news_img">
                          <img alt="img" src="img/news.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="#">Dummy text of the printing and typesetting industry</a>
                       <span class="feed_date">27.02.15</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#" class="news_img">
                          <img alt="img" src="img/news.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="#">Dummy text of the printing and typesetting industry</a>
                       <span class="feed_date">28.02.15</span>                
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#" class="news_img">
                          <img alt="img" src="img/news.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="#">Dummy text of the printing and typesetting industry</a>
                       <span class="feed_date">28.02.15</span>                
                      </div>
                    </div>
                  </li>                  
                </ul>
              </div>
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Quick Links <span class="fa fa-angle-double-right"></span></h2>
                <ul>
                  <li><a href="#">Link 1</a></li>
                  <li><a href="#">Link 2</a></li>
                  <li><a href="#">Link 3</a></li>
                  <li><a href="#">Link 4</a></li>
                  <li><a href="#">Link 5</a></li>
                </ul>
              </div>
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Sponsor Add <span class="fa fa-angle-double-right"></span></h2>
                <a class="side_add" href="#"><img src="img/side-add.jpg" alt="img"></a>
              </div>
              <!-- End single sidebar -->
            </div>
          </div>
          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
