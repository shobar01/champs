<!-- Modalmastermenu -->
<div class="modal" id="menuterjual"  >
    <div class="w3-animate-bottom fixed-bottom m-0" role="document" style="margin-top: 100px !important;">
        <div class="modal-content color-card">
            <div class="modal-header pb-1">
                <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Daftar Menu/Modifier<br> Terjual Tgl.
                        {{$tanggal}}</b></a>
                <button type="button" class="close" onclick="
                document.getElementById('menuterjual').style.display='none';">
                    <span aria-hidden="true"> &times;</span>
                </button>
            </div>
            <div class="modal-body pt-0" style="height: 550px;">
                <div class="col pr-1 pl-1 mt-2">

                    <div class="card" style="border-radius:12px; ">
                        <div class="ftsize12"
                            style="border-radius:14px; font-size: 16px !important; color:white; background:#cc1a0b; height: 30px;">
                            <b>Menu
                                Terjual</b>
                        </div>
                        <ul id="tablemmenu"
                            style="overflow-x: hidden; height: 200px; list-style-type: none; padding: 5px;">
                        </ul>
                    </div>
                </div>


                <div class="col pr-1 pl-1 mt-2">

                    <div class="card" style="border-radius:12px; ">
                        <div class="ftsize12"
                            style="border-radius:12px;font-size: 16px !important;color:white; background:#FEBD01; height: 30px;">
                            <b>Modifier
                                Terjual</b>
                        </div>
                        <ul id="tablemmod"
                            style="overflow-x: hidden; height: 200px; list-style-type: none; padding: 5px;">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>