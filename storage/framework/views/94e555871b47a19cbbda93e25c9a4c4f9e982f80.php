<div class="modal fade" id="fototick" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header color-card" style="padding: 12px 12px 0 12px;border:0;">
                <h4 class="m-0" style="font-weight: bold">Bukti Foto <span id="ftbrg"></span> </h4>

                <button type="button" class="close" onclick="cbukafoto()">&times;</button>
            </div>
            <div class="modal-body p-0 color-card">
                <div class="display-cover">
                    <video autoplay id="video" width="340" height="450" muted></video>
                    <canvas class="d-nones" id="canvas2"></canvas>
                    <div class="video-options d-none" style="left: 5px;top:5px">
                        <select name="" id="" class="custom-select">
                            <option value="">Select camera</option>
                        </select>
                    </div>

                    <img class="screenshot-image" id="ssimage">

                    <div class="controls">
                        <button class="btn btn-danger play d-none" title="Play" onclick="startVideo()"
                            style="padding:10px"><i data-feather="play-circle"></i></button>
                        <button class="btn btn-info pause d-none" title="Pause" onclick="ereun()"
                            style="padding:10px"><i data-feather="pause"></i></button>
                        <button class="btn btn-outline-success screenshot pulsate-fwd" title="ScreenShot"
                            style="padding:10px;position:absolute;right: 10px;bottom: 17%;background: white;"><i
                                data-feather="image"></i> Ambil Gambar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/ticketing/modal/mdfoto.blade.php ENDPATH**/ ?>