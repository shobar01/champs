<style>
    #myInput {
        background-image: url('<?php echo e(asset('public/resource/img/searching.png')); ?>');

        background-size: 20px 20px;
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 14px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }
</style>
<div class="modal fade " id="detailcard" tabindex="-1" role="dialog" aria-labelledby="detailcardLabel"
    aria-hidden="true" style="margin-top: 70px;">
    <div class="modal-dialog w3-animate-bottom fixed-bottom m-0" role="document">
        <div class="modal-content color-card">
            <div class="modal-header pb-1">
                <h5 style="font-weight:bold; padding:0;">Detail Non Tunai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times;</span>
                </button>
            </div>

            <div class="modal-body pt-0">
                <div class="mb-2 mt-2 navbar" style="padding: 0px;">
                    <input id="myInput" onkeyup="myFunction()" type="text" class="form-control" placeholder="Searching"
                        aria-label="Search" aria-describedby="basic-addon2">

                </div>

                <ul id="table-card" style="overflow-x: hidden; height: 450px; list-style-type: none; padding: 5px;">

                </ul>
                
            </div> 
        </div>
    </div>
</div>
<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("table-card");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("div")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/dfr_mobile/modal/detaildfr/card.blade.php ENDPATH**/ ?>