<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<h1>h1</h1>
<?php echo $this->session->userdata('user_login'); 
echo "</br>";
 echo $this->session->userdata('id_user');
 echo "</br>";
 echo $this->session->userdata('level_name');
 echo "</br>";
  echo $this->session->userdata('jml_notif_bell');
 echo "</br>";
  ?>
</body>
</html>