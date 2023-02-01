<div class="modal fade" id="detailcard2" tabindex="-1" role="dialog" aria-labelledby="detailcard2Label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content color-card">
            <div class="modal-header pb-1" style="background-color: {{$color4}}">
                <h5 style="font-weight:bold; padding:0;">Detail Kartu</h5>
                <button type="button" class="close" onclick="closecardt()" aria-label="Close">
                    <span aria-hidden="true"> &times;</span>
                </button>
            </div>
            <div class="modal-body pt-0 scroll color-card" style="background-color: {{$color4}}">
                <div class="table-responsive" style="height: 150px;">
                    <table class="table" width="100%" id="table-card">
                        <thead>
                            <tr class="text-center">
                                <th class="mn">Nomor Order</th>
                                <th class="mn">Kode Kartu</th>
                                <th class="mn">Nominal</th>
                                <th class="mn">Potongan</th>
                            </tr>
                        </thead>
                        <tbody id="detailkartu2">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>