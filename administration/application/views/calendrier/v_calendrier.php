<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calendrier</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo CSURL."bootstrap.min.css" ?>" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href="<?php echo CSURL."fullcalendar.css" ?>" rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	
	    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <a class="navbar-brand" href="index.php">
            <img src="http://administration.zaccros.org/resources/images/alarue.png" width="90" height="20" class="d-inline-block align-top" alt="">   
        </a>
    </nav>
    

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
				<h2><I>Vous voyez les horaires du bénévole <?php echo $info['nom']." ".$info['prenom']; ?></I></h2>
				<h2><I>Le festival commence le <?php echo $laDate['periodeDebut']; ?> au <?php echo $laDate['periodeFin']; ?> </I></h2>
				<div class="alert alert-success text-left" role="alert">
  					<h4 class="alert-heading">Comment fonctionne le calendrier :</h4>
  					<p>
						<ul>
							<li>Vous pouvez visualiser en rouge les horaires de ce bénévole et en vert les horaires que vous lui avez affectés si c'est le cas.</li>
							<li>Vous pouvez ajouter des disponibilités supplémentaires à ce bénévole en cliquant sur la case ou bien étirer la case en maintenant le clic, n'oublier pas de cliquer sur le bouton 'Valider'.</li>
							<li>Si vous modifiez les disponibilités de ce bénévole, les heures que vous avez affectées ce jour-ci seront toutes supprimées.</li>
							<li>Si vous supprimez une disponibilité de ce bénévole, les heures que vous avez affectées ce jour-ci seront aussi supprimées.</li>
						</ul>
					</p>
				</div>
                <div id="calendar" class="col-centered">
            	</div>
			</div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="index.php?action=add">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ajouter Horaire</h4>
			  </div>
			  <div class="modal-body">

				  <input type="hidden" name="idUtilisateur" value="<?php echo "".$idUtilisateur."" ?>">
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Date début</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Date fin</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				<button type="submit" name="valider" class="btn btn-primary">Valider</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="index.php?action=edit">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modifier Horaire</h4>
			  </div>
			  <div class="modal-body">
				  
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Date début</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Date fin</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Supprimer event</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				<button type="submit" name ="edit" class="btn btn-primary">Sauvegarder</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
	
	<!-- /.container -->
	<div class="pull-right">
		 <form class="form-horizontal" method="POST" action="index.php?action=voirLeBenevole&var=<?php echo $idBenevole; ?>">
		 	<button type="submit" class="btn btn-primary">Retour</button>
		 </form>
	</div>

    <!-- jQuery Version 1.11.1 -->
    <script src="<?php echo JSSURL."jquery.js"?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo JSSURL."bootstrap.min.js"?>"></script>
	
	<!-- FullCalendar -->
	<script src="<?php echo JSSURL."moment.min.js"?>"></script>
	<script src="<?php echo JSSURL."fullcalendar.min.js"?>"></script>
	<script src="<?php echo JSSURL."fr.js"?>"></script>
	
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next',
				center: 'title',
				right: 'agendaWeek,agendaDay'
			},
			defaultView: 'agendaWeek',
			defaultDate: '<?php echo $laDate['periodeDebut']; ?>',
			editable: true,
			scrollTime : "08:00:00",
			allDaySlot : false,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('click', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #start').val(event.start.format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit #end').val(event.end.format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit').modal('show');
				});
			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			<?php foreach($eventsAutres as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
			});
	});

</script>

</body>
<footer>
	<p><B>Si le calendrier ne s'affiche pas, veuillez essayer d'effacer votre historique et de vous reconnecter ou de changer de navigateur internet (Mozilla, Edge, Ecosia, Opera, Brave...).</br>
		  Nous nous excusons pour la gène occasionnée.</B></p>
</footer>

</html>
