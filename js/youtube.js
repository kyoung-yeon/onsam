var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubePlayerAPIReady() {
  new YT.Player('player', {
    videoId: 'yo9ufl2iI4A', 
    playerVars: {
      autoplay: true, 
      loop: true, 
      playlist: 'yo9ufl2iI4A' 
    },
    events: {
      onReady: function (event) {
        event.target.mute() 
      }
    }
  })
}
