<?php
	    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }
    
 ?>
<?php include 'assets/header.php'; ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Editar Perfil</h4>
					</div>
					
					<!-- inicio contenido-->
					<!-- fin-->
				</div>
			</div>
			
		</div>
		
	</div>
	<?php include 'assets/scripts.php'; ?>
</body>
</html>