		var blob;

		var audio = '';

		var recorder;

		var reader;

		var audioReader;

		var denied = false;

		var promise;

		var active = false;

		var chunks = [];

		var bool = false;

		var interval;

		var imgUrl = "";

		var videoUrl = "";

		var audioUrl = "";

		var fileUrl = "";

		var image = "";

		var inputFile = document.getElementById('image');

		var img = document.getElementById('img');

		function attachImage(event){
			image = event.target.files[0];
			if(image){
			if(image.size < 5000000){

			if(image.type.match("image.*")){

			var reader = new FileReader();

			reader.addEventListener("load", function(){
				fileUrl = "";
				videoUrl = "";
				audioUrl = "";
				imgUrl = reader.result;
				img.innerHTML = `<img src="`+imgUrl+`" class="small-img">`;
			}, false);

			if(image){
				reader.readAsDataURL(image);
			}

			}else if(image.type.match("video.*")){

			var reader = new FileReader();

			reader.addEventListener("load", function(){
				imgUrl = "";
				fileUrl = "";
				audioUrl = "";
				videoUrl = reader.result;
				img.innerHTML = `<video src="`+videoUrl+`" class="small-img"></video>`;
			}, false);

			if(image){
				reader.readAsDataURL(image);
			}

			}else if(image.type.match("audio.*")){

			var reader = new FileReader();

			reader.addEventListener("load", function(){
				imgUrl = "";
				videoUrl = "";
				fileUrl = "";
				audioUrl = reader.result;
				img.innerHTML = `<i class="fas fa-volume-up"></i>`;
			}, false);

			if(image){
				reader.readAsDataURL(image);
			}

			}else{

			var reader = new FileReader();

			reader.addEventListener("load", function(){
				imgUrl = "";
				videoUrl = "";
				audioUrl = "";
				fileUrl = reader.result;
				img.innerHTML = `<i class="fas fa-file"></i>`;
			}, false);

			if(image){
				reader.readAsDataURL(image);
			}

			}//end file type if
		}else{
			alert("File too large");
		}
	}else{
		img.innerHTML = `<i class="text-muted fa-2x fas fa-paperclip"></i>`;
		imgUrl = "";
		videoUrl = "";
		audioUrl = "";
		fileUrl = "";
	}
		}//end func

		function start_record(){

		var device = navigator.mediaDevices.getUserMedia({ audio: true }).catch((msg) => {
			console.log(msg);
			denied = true;
		});

		device.then(stream => {

		if(!denied){

		$('#message').slideUp();
		$('#stop').delay(500).fadeIn();
		$('#mic').slideUp();

		active = true;

		recorder = new MediaRecorder(stream);

		totalSeconds = 0;
		interval = setInterval(setTime, 1000);

		recorder.ondataavailable = e => {

			chunks.push(e.data);

			if(recorder.state == "inactive" && bool){
				blob = new Blob(chunks, { type: 'audio/webm' });
				audioReader = new FileReader();
				audioReader.readAsDataURL(blob);

				audioReader.addEventListener("load", function(){

				audio = audioReader.result;

			 	$('#php').load('text4.php', {
		     		msg_type: 'audio',
		     		message: audio,
		     		imgUrl: imgUrl,
		     		videoUrl: videoUrl,
		     		audioUrl: audioUrl,
		     		fileUrl: fileUrl
		     	}, function(response, status, xhr){
		     		if(status == "error"){
		     			console.log(xhr.status + " " + xhr.statusText);
		     			alertErrorMessage(xhr.status + " " + xhr.statusText);
		     		}else{
		     		// alertMessageSent();
		     		console.log('success');
		     	}
		     	});

		    recorder = "";
				audioReader = "";
				blob = "";
				chunks = [];

				});//end addEventListener


				$('#message').delay(500).slideDown();
				$('#stop').fadeOut();
				$('#mic').delay(500).slideDown();
			}

		}//ondataavailbale end

	}

		recorder.start(10);

		})//device.then end

	}


	function stopRecording(){
				
		recorder.stop();

		clearInterval(interval);

		stopTimer();

		recorder = "";
		audioReader = "";
		blob = "";
		chunks = [];

		active = false;

		bool = true;

		$('#message').delay(500).slideDown();
		$('#stop').fadeOut();
		$('#mic').delay(500).slideDown();

		}

     function reload() {
         document.getElementById('iframe').src = "student_txt_.php";
     }
     // reload();
     // reload();

     $('#send').on('click', function(){

     	if(!active){

     	let valueMsg = document.getElementById('message').value;

     	if(valueMsg != ""){
     		
     	$('#php').load('text4.php', {
     		msg_type: 'text',
     		message: valueMsg,
     		imgUrl: imgUrl,
     		videoUrl: videoUrl,
     		audioUrl: audioUrl,
     		fileUrl: fileUrl
     	},function(response, status, xhr){
		     		if(status == "error"){
		     			console.log(xhr.status + " " + xhr.statusText);
		     			alertErrorMessage(xhr.status + " " + xhr.statusText);
		     		}else{
		     		// alertMessageSent()
		     		console.log('success');
		     	}
		     	});
     	
     	document.getElementById('message').value = "";

     	$('#message').removeClass('border-crimson');

     }else{
     	$('#message').addClass('border-crimson');
     }
	 }else{

	 	recorder.stop();
	 	clearInterval(interval);
	 	stopTimer();
		active = false;
		$('#message').delay(500).slideDown();
		$('#stop').fadeOut();
		$('#mic').delay(500).slideDown();

	 	bool = true;

	}

     })


var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
// setInterval(setTime, 1000);

function setTime() {
  ++totalSeconds;
  secondsLabel.innerHTML = pad(totalSeconds % 60) + " ";
  minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60)) + " :";
}

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}

function stopTimer(){
	secondsLabel.innerHTML = "";
	minutesLabel.innerHTML = "";
}
 function alertMessageSent(){
    var alertMessage = `<div class="bg-success text-success text-white" id="alert_msg" style="padding:10px;border-radius: 5px;width:80%;display:none;position:fixed;bottom:20px;right:20px;">
    &ensp;&ensp;<i class="fas fa-check text-success bg-white" style="border-radius: 50%;"></i>
    Message sent successfully
    </div>`;
    $('body').append(alertMessage);
    $('#alert_msg').slideDown(200).delay(2000).slideUp(200);
    setTimeout(function(){
    $('#alert_msg').remove();
    }, 5000);
 }

 function alertErrorMessage(errorType){
    var alertMessage = `<div class="bg-danger text-white" id="alert_msg" style="padding:10px;border-radius: 5px;width:80%;display:none;position:fixed;bottom:20px;right:20px;"> 
    Message not sent <br><span style="width:20px;height:20px;display:inline"></span>`+errorType+`
    </div>`;
    $('body').append(alertMessage);
    $('#alert_msg').slideDown(200).delay(2000).slideUp(200);
    setTimeout(function(){
    $('#alert_msg').remove();
    }, 5000);
 }





