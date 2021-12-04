        window.location.href = "#target";

        var stop = false;

        function checkStatus(){

        var audioTags = document.getElementsByTagName('audio');

        for (var i = audioTags.length - 1; i >= 0; i--) {
            if(!audioTags[i].paused){
                stop = true;
            }else{
                stop = false;
            }
        }

        return stop;

        }

        var id = '';

        var audioCheck;

      $('.audio-play').on('click', function(){
        let classList = $(this).find('i').attr('class');
        id = $(this).attr('id');

        if(classList == "fas fa-play"){

        var audio = `<audio autoplay="" controls="" controlsList="nodownload noplaybackrate"></audio>`;

        $('#audio').html(audio);
        $('#audio audio').attr('src',$(this).attr('data-audio'));
        $('#audio audio').attr('data-id',id);

        $('.audio-play').html(`<i class="fas fa-play"></i>`);


        audioCheck = document.querySelector('#audio audio');

        audioCheck.addEventListener('ended', (event) => {
            setTimeout(delay, 1000);
            function delay(){
            $('.audio-play').html(`<i class="fas fa-play"></i>`);
            $('#audio').html('<audio></audio>');
            }
        });

        if(checkStatus()){
            $(this).html(`<i class="fas fa-play"></i>`);
            // stop = false;
            id = '';
        }else{
            $(this).html(`<i class="fas fa-stop"></i>`);
        }

        }else{
            $('#audio').html('<audio></audio>');
            $(this).html(`<i class="fas fa-play"></i>`);
        }

     })

      function changeIcons(){
        
        if(!checkStatus()){

        $('.audio-play').html(`<i class="fas fa-play"></i>`);
        
        }
        else if(id != '' && checkStatus()){
            $('#'+id).html(`<i class="fas fa-stop"></i>`);
        }

        setTimeout(changeIcons, 100);

      }



        var stopVar = false;
        var tag = '';

     
        function stopLoading(){
        stopVar = false;
        }

        function checkAudio(){

        // tag = $('#audio').html();

        tag = document.querySelector('#audio').innerHTML;

        if(tag.indexOf('audio autoplay="" controls=""') != -1){
            stopVar = true;
        }

        }

        checkAudio();

     function loadData() {

        var audioTags = document.getElementsByTagName('audio');

        for (var i = audioTags.length - 1; i >= 0; i--) {
            if(!audioTags[i].paused){
                stopVar = true;
            }else{
                stopVar = false;
            }
        }

        ////////

        checkAudio();

        // alert(tag.indexOf('audio autoplay="" controls=""'));

        if(!stopVar){

        $(function(){
            $('#messages').load('text.php',function(response, status, xhr){
                    if(status == "error"){
                        console.log(xhr.status + " " + xhr.statusText);
                    }else{
                    console.log('success');
                    id = $('#audio audio').attr('data-id');
                    $('#' + id).html(`<i class="fas fa-stop"></i>`);
                }
                });
        });

        // stopLoading();

        }

        setTimeout(loadData, 2000);

     }
     loadData();
     
     function showVideo(videoTag){
        var video = $(videoTag).attr('data-video');
        var html = `<div class="video-div">
        <button type="submit" class="close" id="close"><span>&times;</span></button>
        <video class="video" controls autoplay></video></div>`;
        $('#audio').html('<audio></audio>');
        $('#video').html(html);
        $('#video div video').attr('src', video);
        $('#close').on('click', function(){
            $('#video').html('');
        });
      }