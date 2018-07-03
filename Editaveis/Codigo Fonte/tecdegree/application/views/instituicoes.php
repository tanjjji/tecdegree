    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="imgBanner">
      <h2>Instituicoes</h2>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->


<!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="courseArchive">
      <div class="container">
        <div class="row">
          <!-- start course content -->
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="courseArchive_content">
              <div class="row">
                <!-- start single course -->
                <?php 
                foreach ($instituicao as $item){

                $resume = substr(strip_tags($item->descricao),0,50);
                echo '<div class="col-lg-6 col-md-6 col-sm-6">';
                echo  '<div class="single_course wow fadeInUp">';
                echo    '<div class="singCourse_content">';
                echo    '<h3 class="singCourse_title"><a href="'.base_url('instituicoes/detalhes/').$item->id.'">'.$item->nome.'</a></h3>';
                echo    '<p class="singCourse_price">'.$item->sigla.'</p>';
                echo    '<p>'.$resume.'</p>';
                echo    '</div>';
                echo  '</div>';
                echo '</div>';
                } 

                ?>
                <!-- End single course -->
                
              </div>
              <!-- start previous & next button -->
              <div class="single_blog_prevnext">
                <a href="#" class="prev_post wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"><i class="fa fa-angle-left"></i>Previous</a>
                <a href="#" class="next_post wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">Next<i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
          
          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->