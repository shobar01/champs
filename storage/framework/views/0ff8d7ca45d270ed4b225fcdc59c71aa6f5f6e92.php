<div class="modal fade " id="modal_compare" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog modal-lg vertical-align-center">
            <div class="modal-content" style="background-color: #f0f3f4 !important">
                <div class=" " style=" padding: 15px 15px 0px 15px; ">
                    <button id="btn_problem_close" type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="card-deck mb-3 ">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h5 class="my-0 font-weight-bold">Jualdet (<?php echo e(session('kdoutlet')); ?>) yang tidak masuk
                                        server :</h5>
                                </div>

                                <div class="card-body text-left">
                                    <div class="panel top-20">
                                        <div class="responsive-table">
                                            <table id="tabel_mdlhistory" class="table table-striped table-bordered"
                                                width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class=" col-md-1 text-center ">No</th>
                                                        <th class=" col-md-4 text-center ">No Order</th>
                                                        <th class=" col-md-4 text-center ">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    
                                                    <?php $__currentLoopData = session('blmmasuk'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class=" col-md-1 text-center "><?php echo e($loop->iteration); ?></td>
                                                        <td class=" col-md-1 text-left "><?php echo e($arry['noorderms']); ?>

                                                            <input type="hidden" name="noorder[]"
                                                                value="<?php echo e($arry['noorderms']); ?>">
                                                        </td>
                                                        <td class=" col-md-4 text-left "><?php echo e($arry['fstat']); ?>

                                                        </td>
                                                    </tr>
                                                    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group mt-5">
                                            <form id="send_resyncmpare" action="<?php echo e(route('mscompare_resync')); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-success btn-lg col-md-3 mt-1 float-right"
                                                    type="submit">Re-syncron</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/mscompare/m_cekcompare.blade.php ENDPATH**/ ?>