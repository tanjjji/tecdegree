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
                <div class="singlecourse_bottom">
                  <h2><?php echo $instituicao['nome']?></h2>
                  <span class="singlecourse_price"><?php echo $instituicao['sigla']?></span>
                </div>
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

            <div class="single_course_content">
               <h2>Campus que fazem parte da instituição</h2>
               <p><?php echo $instituicao['descricao']?></p>

              <?php 
             foreach ($campus as $item){
                echo '<h3> <a href="'.base_url('campus/detalhes/'.$item['id'].'').'">'.$item['nome'].'</a></h3>'; 
              }

             ?>


             </div>



             <!-- start related course -->
              <!-- End related course -->
            </div>
          </div>
          <!-- End course content -->

          
              <!-- End single sidebar -->
              <!-- start single sidebar -->

          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
