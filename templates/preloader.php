<div class="preloader-container">
	<!-- <div class="spinner-border-custom">
		
	</div> -->
	<!-- <div class="spinner-border">
		
	</div> -->
	<div class="animation">
		<img src="templates/img/logo.png">
	</div>
</div>
<style type="text/css">
	.animation{
		position: fixed;
		transform: translate(-50%, -50%);
		top: 50%;
		left: 50%;
	}
	.animation img{
		animation: rotateImage 2s 0.2s linear infinite alternate;
		position: relative;
		transform: rotateY(0deg);
		opacity: 0.2;
	}
	@keyframes rotateImage{
		0%{ transform: rotateY(0deg); }
		50%{ transform: rotateY(90deg);opacity: 0.5; }
		100%{ transform: rotateY(0deg);opacity: 1; }
	}
</style>