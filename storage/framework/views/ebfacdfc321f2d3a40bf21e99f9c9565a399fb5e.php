<div class="modal fade" id="infokat" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="nextLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="infokatLabel" style=" font-weight:bold; color:black;">Info</h6>
                <button type="button" class="close" onclick="cinfo()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-borderless" width="100%">
                    <tr>
                        <th width="30%">
                            <span class="btn" id="ebel1"></span> LOW
                        </th>
                        <th>
                            : Jika request ini boleh dibereskan lebih dari 3 hari kerja.
                        </th>
                    </tr>
                    <tr>
                        <th width="32%">
                            <span class="btn" id="ebel2"></span> MIDDLE
                        </th>
                        <th>
                            : Jika request ini boleh dibereskan besok.
                        </th>
                    </tr>
                    <tr>
                        <th width="30%">
                            <span class="btn" id="ebel3"></span> NOW
                        </th>
                        <th>
                            : Jika request ini harus dibereskan sekarang juga.
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/ticketing/modal/infokat.blade.php ENDPATH**/ ?>