<?php $title = 'Montage - The fun part!'; ?>
<?php ob_start(); ?>

<div id="cam-preview">
	<video autoplay="true" id="videoElement">
	"oui"
	</video>
</div>

<script>
var video = document.querySelector("#videoElement");

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}
</script>

<?php $cam_preview = ob_get_clean(); ?>
