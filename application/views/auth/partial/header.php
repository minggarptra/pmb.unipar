<?php
  $setting = $this->db->get('settings')->row_array();
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Login Form">
	<meta name="author" content="Muhamad Brilliant">
	<title><?= $title ?></title>
	<meta http-equiv="x-pjax-version" content="v123">
	<link href="<?= base_url('assets/loginuser/') ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/loginuser/') ?>common.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/tema/') ?>plugins/notifications/css/lobibox.min.css" />
	<link href="<?= base_url('assets/tema/') ?>css/icons.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/loginuser/') ?>login.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>"
		type="image/x-icon" />
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>

<body>

<div id="pjax-container">
<div id="loader"></div>





