
<div class="modal fade" id="uniform" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="rateLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-rate" id="detailtcLabel" style="font-weight: bold;">Pilih Uniform</h5>
                <i class="fa fa-times-circle fa-2x closemod modtglhist" onclick="closeform()"></i>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control caribrg mb-2" id="searchbrg" placeholder="Cari Barang ...">
                <div class="table-responsive scll card-rad style-7">
                    <table class="table table-bordered table-hover table-striped" width="100%">
                        <thead class="thead-dark text-center">
                            <tr class="rap">
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>

                        <tbody class="text-center" id="brguniform">

                        </tbody>
                    </table>
                </div>
                <hr>
                <br>

                <h6 class="text-center bold f-14">Barang Yang Dipilih</h6>
                <div class="table-responsive tbd card-rad style-7">
                    <table class="table table-bordered table-hover table-striped" width="100%">
                        <thead class="thead-dark text-center">
                            <tr class="rap">
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>

                        <tbody class="text-center" id="hasilpilbarang">

                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-danger btn-lg btn-block"
                    style="background: #0dbb35; border-radius: 12px;" onclick="simpanrating()">Simpan Barang</button>
            </div>
        </div>
    </div>
</div><?php /**PATH G:\ChampApplication\xampp\htdocs\champs-mobile\resources\views/ticketing/modal/uniform.blade.php ENDPATH**/ ?>