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
                  <h2><?php echo $campus['nome']?></h2>
                  <span class="singlecourse_price"><?php echo $campus['estado']?></span>
                </div>
             </div>

            <div class="single_course_content">
               <h2>Sobre o Campus</h2>
               <p><?php echo $campus['descricao']?></p>

             </div>

              <div class="single_course_content">
               <h3>Campus</h2>
               <p><?php echo $campus['nome']?></p>

             </div>

            <div class="single_course_content">
               <h3>Cidade</h2>
               <p><?php echo $campus['cidade']." - ".$campus['estado']?></p>

             </div>

              <div class="single_course_content">
               <h3>Endereço</h3>
               <p><?php echo $campus['endereco']?></p>

             </div>

            <div class="single_course_content">
               <h2>Instituição que o campus faz parte</h2>
               <p><?php echo $instituicao['nome']?></p>

              <?php 
             foreach ($campus as $item){
                //echo '<h3> <a href="'.base_url('campus/detalhes/'.$item['id'].'').'">'.$item['nome'].'</a></h3>'; 
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
