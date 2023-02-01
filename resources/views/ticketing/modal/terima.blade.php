{{-- Modal ticketing --}}
<div class="modal fade" id="prterima" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="rateLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-rate" id="detailtcLabel" style="font-weight: bold;">Bukti Terima</h5>
                <i class="fa fa-times-circle fa-2x closemod modtglhist" data-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <form action="{{route('simpan_ubahstatus')}}" method="POST" id="simpan_terima"> @csrf
                    <input type="hidden" name="tipe" value="T">
                    <input type="hidden" name="kdticket" id="terimakdticket" class="form-control">
                    <input type="hidden" name="kategoribe" id="kategoriter" class="form-control">
                    <input type="hidden" name="ubahstatus" value="T010" class="form-control">
                    <div class="form-group">
                        {{-- <p style="text-align: justify;
                        font-weight: bold;">Keterangan</p> --}}
                        <textarea onkeyup="reg2('ulasanku')" class="form-control" id="ulasanku" name="ket"
                            placeholder="Tulis keterangan kamu disini..." rows="3"></textarea>
                        <span id="errorulasan" style="color:red; font-weight:bold; font-size: 10px;"></span>
                        <div class="modal-footer" style="justify-content: space-between;">
                            <img src="" id="cthfototer" name="cthfototer" style="width: 30px;" onclick="tfototer()">
                            <input type="hidden" name="bayz" id="bayz">
                            <button type="button" class="btn btn-bukti bukti" name="bukti" id="bukti"
                                onclick="bukafoto()"><i class="fa fa-camera"></i>
                                Ambil Foto</button>
                        </div>
                    </div>
                </form>
                <button id="simpanter" type="button" class="btn btn-danger btn-lg btn-block"
                    style="background:#004aad; color:white;font-size:14px; font-weight:bold;border-radius: 12px"
                    onclick="terima()">Kirim
                    Bukti
                    Terima</button>
            </div>
        </div>
    </div>
</div>