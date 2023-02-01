
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>






<div class="container" style="padding: 100px 0 0 0;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal" style="font-size: 14px;"><b>View SOP PDF</b></h4>
                
            </div>
            <div class="card-body" style="padding: 0px 5px 0px 5px;">
                
                    <div class="fw-container" style="margin-top: 1%;">
                        <div class="fw-body">
                            <div class="content">
                                <iframe
                                    src="https://docs.google.com/gview?url=http://api.champ-group.com/champs-mobile/storage/app/public/soppdf/OTHER/HOLDING%20TIME%20GOKANA%20UPDATE%202019.pdf&embedded=true"
                                    width="1000px" height="600px" frameborder="0"></iframe>
                                <div class="input-group mb-3">
                                    <input id="search_vsop" onkeyup="SrchVsop()" type="text" class="form-control"
                                        placeholder="Searching" aria-label="Search" aria-describedby="basic-addon2">
                                    
                                </div>

                                <ul id="table-vsop"
                                    style="overflow-x: hidden; height: 450px; list-style-type: none; padding: 5px;">
                                    <?php $__currentLoopData = $datta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(str_replace('storage','public/storage',asset('storage'))); ?><?php echo e($df); ?>"
                                        target="_blank">
                                        <li class="shadow p-2 mb-3 bg-white rounded"
                                            style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;">
                                            <div class="input-group" id="aa'+i+'">
                                                <div class="input-group-prepend">
                                                    <i class="fa fa-file-pdf-o" title="Download PDF"
                                                        style="color: red; padding-right: 5px"> </i>
                                                    <span style="color: black;">
                                                        <?php echo e(str_replace('/soppdf/','',str_replace('.pdf','',$df))); ?></span>


                                                    
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script>
        $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
    </script>
    <script>
        function SrchVsop() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("search_vsop");
        filter = input.value.toUpperCase();
        ul = document.getElementById("table-vsop");
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
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//vsop/vsop.blade.php ENDPATH**/ ?>