<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title><?= $this->Settings_model->general()["app_name"] ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/fav.png">


	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/404/') ?>css/style.css" />
	<style>
		 body {
     background-image: linear-gradient(to bottom, #030420, #000000 70%);
     display: flex;
     justify-content: center;
     align-items: center;
     width: 100vw;
     height: 100vh;
     overflow: hidden;
   }



   hr {
     width: 50px;
     border-color: transparent;
     border-right-color: rgba(255, 255, 255, 0.7);
     border-right-width: 50px;
     position: absolute;
     bottom: 100%;
     transform-origin: 100% 50%;
     animation-name: rain;
     animation-duration: 1s;
     animation-timing-function: linear;
     animation-iteration-count: infinite;
   }

   @keyframes rain {
     from {
       transform: rotate(105deg) translateX(0);
     } 
     to {
       transform: rotate(105deg) translateX(calc(100vh + 20px));
     }
   }

	</style>

</head>

<body >
	
		<div class="notfound">
			<div class="notfound-404">
				<h1 style="color: lightgoldenrodyellow;">4<span></span>4</h1>
			</div>
			<h2 style="color: lightgoldenrodyellow;">Oops! Halaman tidak ditemukan</h2>
			<p style="color: lightgoldenrodyellow;">Kamu telah mencarinya keujung dunia, tetapi tetap tidak ditemukan, jangan menyerah teman, sekarang
				waktunya kembali ke rumah..</p>
			<p style="color: lightgoldenrodyellow;">- Brilliant </p>
			<a onclick="history.back()">Kembali Ke Rumah yuk</a>
		</div>
	</div>



    <script type="text/javascript">

  let hrElement;
  let counter = 100;
  for (let i = 0; i < counter; i++) {
    hrElement = document.createElement("HR");
    
      hrElement.style.left = Math.floor(Math.random() * window.innerWidth) + "px";
      hrElement.style.animationDuration = 0.2 + Math.random() * 0.3 + "s";
      hrElement.style.animationDelay = Math.random() * 5 + "s";
   
    document.body.appendChild(hrElement);
  }

 

</script>
</body>

</html>
