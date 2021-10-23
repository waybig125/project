$('#toggler').on('click', function(){
	$('#navbarCollapse').slideToggle();
});
$(function() {
   $(".rslides").responsiveSlides();
});
$("#slider1").responsiveSlides({
  auto: true,             // Boolean: Animate automatically, true or false
  speed: 2000,            // Integer: Speed of the transition, in milliseconds
  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
  pager: false,           // Boolean: Show pager, true or false
  nav: true,             // Boolean: Show navigation, true or false
  random: true,          // Boolean: Randomize the order of the slides, true or false
  pause: true,           // Boolean: Pause on hover, true or false
  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
  //prevText: `<i class="fas fa-arrow-left custom-position1"></i>`,   // String: Text for the "previous" button
  //nextText: `<i class="fas fa-arrow-right custom-position2"></i>`,       // String: Text for the "next" button
  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
  // prevText: `<span class="circle"></span>`,
  prevText: '',
  nextText: `<span class="circle"></span>`,
  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
  manualControls: "",     // Selector: Declare custom pager navigation
  namespace: "rslides",   // String: Change the default namespace used
  before: function(){},   // Function: Before callback
  after: function(){}     // Function: After callback
});
$(window).on('load', function(){
  $('.preloader-container').delay(1000).fadeOut();
  // $(function(){
  new TypeIt('#typing',{
    // strings: `<span class="border-bottom-success">Website Title</span> `,
    // strings: ' ',
    // lineBreak: false,
    speed: 150,
    startDelay: 2000,
    breakDelay: 750,
    cursorSpeed: 800,

  }).go();
  // });
  var options = {
    animateThreshold: 100,
    scrollPollInterval: 20
}
$('.aniview').AniView(options);
 var options2 = {
    animateThreshold: 20,
    scrollPollInterval: 20
}
$('.aniview-2').AniView(options2);
// $('.aniview-2').AniView(options2);
// $('.aniview-2').AniView(options2);

// $('.text').delay(3000).addClass("animate__lightSpeedInLeft");

});

$('#dropdownMenuButton').on('click', function(){
  $('#dropdown').toggle();
});



