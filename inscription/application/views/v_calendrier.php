<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Olivier">

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
	<link rel=stylesheet href="<?php echo CSSURL.'bootstrap.min.css'?>">
    <script src="<?php echo JSURL."bootstrap.min.js" ?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.12.0.js" integrity="sha256-yFU3rK1y8NfUCd/B4tLapZAy9x0pZCqLZLmFL3AWb7s=" crossorigin="anonymous"></script>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <a class="navbar-brand" href="index.php">
            <img src="http://administration.zaccros.org/resources/images/alarue.png" width="90" height="20" class="d-inline-block align-top" alt="">   
        </a>
    </nav>

    <!-- Page Content -->
    <div class="container">
		<form class="form-horizontal" method="POST" action="index.php?action=calendrier">
		<input type="hidden" name="idUtilisateur" value="<?php echo "".$idUtilisateur."" ?>">
        <div class="row">
            <div class="col-lg-12 text-center">
				<h2><I>Bienvenue <?php echo $info['nom']." ".$info['prenom']; ?></I></h2>
				<h2><I>Le festival commence le <?php echo $laDate['periodeDebut']; ?> au <?php echo $laDate['periodeFin']; ?> </I></h2>
				<h3><I>Merci de rentrer vos disponibilités dans la période donnée, sinon elles ne seront pas prises en compte.</I></h3>
				<h3><I>Télécharger la documentation concernant le calendrier : </I><a href="resources/images/Documentation.pdf" download="documentation.pdf">ici</a></h3>
				<div class="alert alert-success text-left" role="alert">
  					<h4 class="alert-heading">Comment fonctionne le calendrier :</h4>
  					<ul>
						<li>Vous pouvez utiliser les flèches à gauche pour vous déplacer dans le calendrier.</li>
						<li>Vous pouvez utiliser les boutons "Semaine" et "Jour" pour voir le calendrier en mode semaine ou en mode jour.</li>
						<li>Attention, il n'est pas possible de superposer vos disponibilités.</li>
					</ul>
					<hr>
					<p class="mb-0"><ul>
						<li>Vous pouvez modifier vos disponibilités en étirant une case puis en double-cliquant sur celle-ci, enfin cliquez sur le bouton 'Sauvegarder' ou bien en déplaçant votre disponibilité et cliquez sur le bouton 'Sauvegarder'.</li>
						<li>Vous pouvez supprimer vos disponibilités en double-cliquant sur votre disponibilité et en cochant la case 'Supprimer'.</li>
					</ul>
				</div>
                <div id="calendar" class="col-centered">
            </div>
			</div>


        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="index.php?action=add">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ajouter Event</h4>
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
				<button type="submit" class="btn btn-primary">Valider</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="index.php?action=edit">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modifier Event</h4>
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
				<button type="submit" class="btn btn-primary">Sauvegarder</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    <!-- /.container -->
	<div class="pull-right">
		 <form class="form-horizontal" method="POST" action="index.php?action=photo">
		 	<button type="submit" class="btn btn-primary">Tout sauvegarder</button>
		 </form>
	</div>
    <!-- jQuery Version 1.11.1 -->
    <script src="<?php echo JSURL."jquery.js"?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo JSURL."bootstrap.min.js"?>"></script>
	
	<!-- FullCalendar -->
	<script src="<?php echo JSURL."moment.min.js"?>"></script>
	<script src="<?php echo JSURL."fullcalendar.min.js"?>"></script>
	<script src="<?php echo JSURL."fr.js"?>"></script>
	
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next',
				center: 'title',
				right: 'agendaWeek,agendaDay'
			},
			defaultView: 'agendaDay',
			defaultDate: '<?php echo $laDate['periodeDebut']; ?>',
			editable: true,
			scrollTime : "08:00:00",
			selectOverlap: false,
			allDaySlot : false,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			eventRender: function(event, element) {
				element.bind('click', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #start').val(event.start.format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit #end').val(event.end.format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			eventOverlap: function(stillEvent, movingEvent) {
    			return stillEvent.allDay && movingEvent.allDay;
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
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			});
		}
		
	});

</script>

</body>
<div class="pull-right">
		 <form class="form-horizontal" method="POST" action="index.php?action=photo">
		 	<button type="submit" class="btn btn-primary">Sauvegarder</button>
			<input id="prodId" name="id" type="hidden" value="<?php echo $event['id']; ?>">
			<input id="prodId" name="title" type="hidden" value="<?php echo $event['title']; ?>">
			<input id="prodId" name="start" type="hidden" value="<?php echo $start; ?>">
			<input id="prodId" name="end" type="hidden" value="<?php echo $end; ?>">
			<input type="hidden" name="idUtilisateur" value="<?php echo $idUtilisateur ?>">

		 </form>
	</div>
</html>
