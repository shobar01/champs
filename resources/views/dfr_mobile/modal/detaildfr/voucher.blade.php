<div class="modal " id="detaildfr">
    <div class="w3-animate-bottom fixed-bottom m-0">
        <div class="modal-content color-card">
            <div class="modal-header pb-1">
                <h5 style="font-weight:bold; padding:0;">Detail Voucher</h5>
                <button type="button" class="close"  onclick="document.getElementById('detaildfr').style.display='none';">
                    <span aria-hidden="true"> &times;</span>
                </button>
            </div>

            <div id="kosongvoucher"></div>
            <div class="modal-body pt-0 scroll color-card">
                <div class="table-responsive">
                    <table class="table" width="100%">
                        <thead>
                            {{-- <tr class="text-center" id="table-voucher">
                                <th>Kode Voucher</th>
                                <th>Nominal</th>
                            </tr> --}}
                        </thead>
                        <tbody id="detailvoucher">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>