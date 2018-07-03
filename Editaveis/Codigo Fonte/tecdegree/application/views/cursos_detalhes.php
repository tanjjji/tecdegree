    <section id="imgBanner">
      <h2>Cursos</h2>
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
                <div class="singlecourse_bottom">
                  <h2><?php echo $curso['tipo']?></h2>
                  <span class="singlecourse_price"><?php echo $campus['nome']?></span>
                </div>
             </div>

             <div class="single_course_content">
               <h3>duração</h2>
               <p><?php echo $curso['duracao']." anos"?></p>

             </div>


            <div class="single_course_content">
               <h3>Periodo</h2>
               <p><?php echo $curso['periodo']?></p>

             </div>

             <div class="single_course_content">
               <h3>avaliação enade</h2>
               <p><?php echo $curso['avaliacao_enade']?></p>

             </div>

            <div class="single_course_content">
               <h2>Sobre o Campus</h2>
               <p><?php echo $campus['descricao']?></p>

             </div>

             <div class="single_course_content">
               <h3> Cidade </h2>
               <p><?php echo $campus['cidade']." - ".$campus['estado']?></p>

             </div>

            <div class="single_course_content">
               <h3>Endereço</h2>
               <p><?php echo $campus['endereco']?></p>

             </div>


             <div class="single_course_content">
               <h3>telefone</h2>
               <p><?php echo $campus['telefone']?></p>

             </div>

              <div class="single_course_content">
               <h2>Sobre a Instituicao</h2>
               <p><?php echo $instituicao['descricao']?></p>

             </div>

              <div class="single_course_content">
               <h3>Nome</h2>
               <p><?php echo $instituicao['nome']." - ".$instituicao['sigla']?></p>

             </div>

            <div class="single_course_content">
               <h3>Categoria Administrativa</h2>
               <p><?php echo $instituicao['categoria_adm']?></p>

             </div>

              <div class="single_course_content">
               <h3>Site</h3>
               <p><?php echo $instituicao['site']?></p>

             </div>




             <!-- start related course -->
              <!-- End related course -->
            </div>
          </div>
          <!-- End course content -->


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
