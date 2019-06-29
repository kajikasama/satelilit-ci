<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon">
			<i class="fas fa-hand-middle-finger"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Sate Lilit</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Query Menu -->
	<?php
		$roleid = $this->session->userdata('role_id');
		$queryMenu = "SELECT usermenu.KodeMenu,NameMenu 
		FROM usermenu 
		JOIN useraccessmenu ON usermenu.KodeMenu = useraccessmenu.KodeMenu 
		WHERE useraccessmenu.RoleId = '$roleid'";
		$menu = $this->db->query($queryMenu)->result_array();

	?>

	<!-- LOOPING MENUNYA -->
	<?php foreach($menu as $m) : ?>
	<div class="sidebar-heading">
		<?= $m['NameMenu'] ?>
	</div>

	<!-- SUB MENU SESUAI MENU	 -->
	<?php
	$menuId = $m['KodeMenu'];
	$querySubMenu = "SELECT *
							FROM usersubmenu JOIN usermenu
							ON usersubmenu.KodeMenu = usermenu.KodeMenu
							WHERE usersubmenu.KodeMenu = $menuId
							AND usersubmenu.IsActive = 1;
							";
	$subMenu = $this->db->query($querySubMenu)->result_array();						
	?>	

		<?php foreach($subMenu as $sm) :?>
		
		<?php if($title== $sm['Title']) :?>
			<li class="nav-item active">
		<?php else :  ?>
			<li class="nav-item">	
		<?php endif;  ?>

			<a class="nav-link" href="<?= base_url($sm['Url']); ?>">
				<i class="<?= $sm['Icon']; ?>"></i>
				<span><?= $sm['Title']; ?></span></a>
		</li>
		<?php endforeach; ?>

		<hr class="sidebar-divider">
	<?php endforeach; ?>

	<!-- Nav Item - Dashboard -->
	

	<!-- Divider -->

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout') ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Log out</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->