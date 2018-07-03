    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="<?php echo base_url();?>">campu<span>search</span></a>            
        
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url('Cursos');?>">Cursos</a></li>
                <li><a href="<?php echo base_url('Instituicoes');?>">Instituições</a></li>
                <li><a href="<?php echo base_url('Campus');?>">Campus</a></li>
                <?php 
                if ($this->session->userdata('usuario_logado') == FALSE){
                  echo '<li class="dropdown">';
                  echo  '<a href="#" class="dropdown-toggle" data-toggle="dropdown role="button";aria-expanded="false">Login<span class="caret"></span></a>';
                  echo  '<ul class="dropdown-menu" role="menu">';
                  echo    '<li><a href="'.base_url("Usuario/login").'">Entrar</a></li>';
                  echo    '<li><a href="'.base_url("Usuario/cadastrar").'">Cadastrar</a></li>';       
                  echo  '</ul>';
                  echo '</li>';
                }else{
                  echo '<li><a href="'.base_url("Usuario/logout").'">Sair</a></li>';
                }

                ?>
              </ul>           
            </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->    
    </header>
    <!--=========== END HEADER SECTION ================--> 