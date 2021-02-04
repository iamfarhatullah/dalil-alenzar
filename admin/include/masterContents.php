<?php  

echo '
<div class="wrapper" style="margin-top: -20px; background-color: #EEE; width: 100%; height: 100%;">
	<nav id="sidebar">
        <div class="main-nav-tab">
      <table class="user-panel" style="border: none !important;">
        <tr style="border: none !important;">
          <td style="border: none !important;">
            <img class="img-circle img-responsive" width="50px" src="../img/user.jpg">
          </td>
          <td style="border: none !important;">
            <h5 class="to-hide">'.$sessionName.' <br><span>Administrator</span></h5>
          </td>
        </tr>
      </table>
      </div>
		<ul class="sidebar-nav">
			<li data-toggle="tooltip" data-placement="right" title="Dashboard">
				<a href="index.php">
					<i class="fa fa-tachometer-alt"></i>
					<span class="to-hide">Dashboard</span>
				</a>
			</li>
		    <li data-toggle="tooltip" data-placement="right" title="Products">
		    	<a href="products.php">
		    		<i class="fas fa-th-list"></i>
		    		<span class="to-hide">Products</span>
		    	</a>
		    </li>
			<li data-toggle="tooltip" data-placement="right" title="Employees">
				<a href="employees.php">
					<i class="fas fa-users-cog"></i>
					<span class="to-hide">Employees</span>
				</a>
			</li>
			<li data-toggle="tooltip" data-placement="right" title="Clients">
				<a href="clients.php">
					<i class="fas fa-users"></i>
					<span class="to-hide">Clients</span>
				</a>
			</li>
			<li data-toggle="tooltip" data-placement="right" title="Invoices">
				<a href="invoices.php">
					<i class="fas fa-file-invoice"></i>
					<span class="to-hide">Invoices</span>
				</a>
			</li>
			<li data-toggle="tooltip" data-placement="right" title="Projects">
				<a href="projects.php">
					<i class="fas fa-tasks"></i>
					<span class="to-hide">Projects</span>
				</a>
			</li>
			<li data-toggle="tooltip" data-placement="right" title="Achievements">
				<a href="achievements.php">
					<i class="fas fa-award"></i>
					<span class="to-hide">Achievements</span>
				</a>
			</li>
			<li data-toggle="tooltip" data-placement="right" title="Log out">
				<a href="logout.php">
					<i class="fa fa-sign-out-alt"></i>
					<span class="to-hide">Log out</span>
				</a>
			</li>
		</ul>
	</nav>
<!-- Page Content Holder -->
<div id="content" style="width: 100%;">
	<nav class="navbar" id="main-nav">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
					<i class="glyphicon glyphicon-align-left"></i>
					<span><!-- Toggle Sidebar --></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php" class="nav-links"><i class="fa fa-sign-out-alt"></i></a></li>
				</ul>
			</div>
		</div>
	</nav>';
?>