  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>campusearch</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url('Admin/logout')?>">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                <h5 class="centered">Felipe</h5>
                    
                  <li class="mt">
                      <a class="active" href="<?php echo base_url('admin')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Principal</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-graduation-cap"></i>
                          <span>Cursos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('admin/cadastro_curso');?>">Adicionar</a></li>
                          <li><a  href="<?php echo base_url('admin/visualiza_cursos') ?>">Gerenciar</a></li>
                          <li><a  href="<?php echo base_url('admin/pendente_cursos') ?>">Pendentes</a></li>
                      </ul>
                  </li>

                    <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-university"></i>
                          <span>Instituições</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('admin/cadastro_instituicao');?>">Adicionar</a></li>
                          <li><a  href="<?php echo base_url('admin/visualiza_instituicoes') ?>">Gerenciar</a></li>
                          <li><a  href="<?php echo base_url('admin/pendente_instituicoes') ?>">Pendentes</a></li>
                      </ul>
                    </li>

                    <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-map-marker"></i>
                          <span>Campus</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('admin/cadastro_campus');?>">Adicionar</a></li>
                          <li><a  href="<?php echo base_url('admin/visualiza_campus');?>">Gerenciar</a></li>
                          <li><a  href="<?php echo base_url('admin/pendente_campus');?>">Pendentes</a></li>
                      </ul>
                    </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      