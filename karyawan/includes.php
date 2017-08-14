<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(function() {               
    $("#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '2017:3000',
        minDate: 0,
        maxDate: new Date('<?php
echo $tanggalpensiun_normal;
?>'),});});
</script>
<!-- Custom Theme files -->
<link href="css/dashboard.css" rel="stylesheet">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="https://code.jquery.com/ui/jquery-ui-git.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<!-- start menu -->
<style>
#parent {display: table;width: 100%;}
#form_status {display: table-cell;text-align: center;vertical-align: middle;}

@media print {.sidebar {display: none;}.ps {display: none;}.form-group {display: none;}.hd {display: none;}
    .btn {display: none;}}</style>php