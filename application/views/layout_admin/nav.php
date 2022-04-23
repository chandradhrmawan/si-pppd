<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="padding-bottom: 50px;">
        <div class="pull-left image">
          <!-- <img src="<?=base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info" style="left: 5px !important;">
          <p><?=$this->session->userdata('nama')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url()?>main">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php 
          $menu = $this->general_model->get_menu(2,$this->session->userdata('id_role'));
          foreach($menu as $key => $value):

          $list_role =explode(",", $value->role);
            
          $detail_menu = $this->general_model->get_detail_menu($value->id,$this->session->userdata('id_role'));
          
          if(!empty($detail_menu)): ?>
            <li class="treeview">
              <a href="<?=base_url().''.$value->slug_url?>">
                <i class="<?=$value->icon?>"></i> <span><?=$value->title?></span>
                
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>

              </a>
              <ul class="treeview-menu" style="display: none;">
                
                <?php foreach ($detail_menu as $keyx => $valuex): ?>
                  <li><a href="<?=base_url().''.$valuex->slug_url?>"><i class="fa fa-circle-o"></i><?=$valuex->title?></a></li>
                <?php endforeach; ?>

              </ul>
            </li>
          <?php else: ?>
            <?php
            $dua = $this->uri->segment(2);
            $url = (empty($dua)) ? $this->uri->segment(1) : $this->uri->segment(1).'/'.$this->uri->segment(2);
            ?>
            <li class="<?=($value->slug_url == $url)?'active':''?>" ><a href="<?=base_url().''.$value->slug_url?>"><i class="<?=$value->icon?>"></i> <?=$value->title?></a></li>
          <?php endif; ?>

        <?php endforeach; ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">