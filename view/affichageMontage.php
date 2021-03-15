<?php $title = 'Montage - The fun part!'; ?>
<?php ob_start(); ?>

<table>
                <tr>
                    <td>
<div id='cam-preview'>
  <div>
    <video id="videoElement" autoplay></video>
    <button id='getUserMediaButton'>allumer la caméra</button>
  </div>
  <div>
    <canvas id='grabFrameCanvas'></canvas>
    <button id='grabFrameButton' disabled>Grab Frame</button>
  </div>
  <div>
    <canvas id='takePhotoCanvas'></canvas>
    <button id='takePhotoButton' disabled>Take Photo</button>
    <a href="javascript:canvas.toDataURL('image/jpeg');" download="download" >Download as jpeg</a>
  </div>
</div>
</td>
</tr>
</table>
<script>
<?php include($ROOT . 'modeles/modele.js'); ?>
</script>

<script>
  document.querySelector('#getUserMediaButton').addEventListener('click', onGetUserMediaButtonClick);
  document.querySelector('#grabFrameButton').addEventListener('click', onGrabFrameButtonClick);
  document.querySelector('#takePhotoButton').addEventListener('click', onTakePhotoButtonClick);
</script>



<?php $cam_preview = ob_get_clean(); ?>
