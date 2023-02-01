<div class="modal  " id="detaildiskon"  >
    <div class="w3-animate-bottom fixed-bottom m-0">
        <div class="modal-content color-card">
            <div class="modal-header pb-1">
                <h5 style="font-weight:bold; padding:0;">Detail Diskon</h5>
                <button type="button" class="close"  onclick="document.getElementById('detaildiskon').style.display='none';">
                    <span aria-hidden="true"> &times;</span>
                </button>
            </div>
            <div id="kosongdiskon"></div>
            <div class="modal-body pt-0 scroll color-card">
                <div class="table-responsive" style="overflow-x: hidden; height: 450px; ">
                    <table class="table" width="100%" id="table-diskon" >
                        <thead>
                            {{-- <tr class="text-center">
                                <th>Nomor Order</th>
                                <th>Kode Diskon</th>
                                <th>Nominal</th>
                            </tr> --}}
                        </thead>
                        <tbody id="detailisidiskon">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>