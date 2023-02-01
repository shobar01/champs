
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('public/resource/css/style_viewcogs.css')); ?>" rel="stylesheet" type="text/css">

<div class="container" style="padding-top: 70px;">
    <div class="card-deck">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal" style="font-size: 14px;"><b>Cost of Goods Sold (COGS) </b></h4>
            </div>
            <div class="card-body" style="padding: 0 10px 10px 10px !important;">
                <div class="col-md-4" style="padding : 0;">
                    <form action="<?php echo e(route('viewcogs')); ?>" method="GET" id="formwaktu">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; color:black;">Bln/Thn : </span>
                            </div>
                            <input type="month" name="waktu" id="waktu" value="<?php echo e($waktu); ?>" class="form-control"
                                onchange="pilihwaktu()">
                            <input type="hidden" name="nip" id="nip" value="<?php echo e($nip); ?>">
                            <input type="hidden" name="idakses1" id="idakses1" value="<?php echo e($idakses); ?>">
                        </div>
                    </form>
                </div>
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <div class="input-group mb-3">
                                <input id="search_cogs" type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search" aria-describedby="basic-addon2">
                            </div>

                            <div class="table-responsive" style="overflow-x: hidden; height: 430px; ">

                                <div class=" table-responsive" style="overflow-y: hidden;">
                                    <table id="tblcogs" class="table table-striped table-bordered"
                                        style="min-width: 1200px !important; ">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="text-center thkuning">
                                                    Outlet</th>
                                                <th colspan="3" class="text-center thkuning">Sales <span
                                                        style="font-size:8px">(x1000)</span></th>
                                                <th colspan="4" class="text-center thkuning">
                                                    COGS Menu <span style="font-size:8px">(x1000)</span></th>
                                                <th colspan="5" class="text-center thkuning">
                                                    COGS Material <span style="font-size:8px">(x1000)</span></th>
                                                <th colspan="6" class="text-center thkuning">Lain - Lain <span
                                                        style="font-size:8px">(x1000)</span></th>
                                            </tr>
                                            <tr>
                                                <th class="ftsize12l xxx">Nama
                                                </th>
                                                
                                                <th class="ftsize12">Target</th>
                                                <th class="ftsize12">Sales</th>
                                                <th class="red">%</th>
                                                <th class="ftsize12">Dine</th>
                                                <th class="ftsize12">Away</th>
                                                <th class="red ">Total</th>
                                                <th class="red ">%</th>
                                                <th class="ftsize12">Raw</th>
                                                <th class="ftsize12">Sust.</th>
                                                <th class="ftsize12">Pack.</th>
                                                <th class="red">Total</th>
                                                <th class="red">%</th>
                                                <th class="orange">Diff.</th>
                                                <th class="blue">PTS</th>
                                                <th class="blue">Retur</th>
                                                <th class="blue">Var.</th>
                                                <th class="blue">Awal</th>
                                                <th class="blue">Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbcogs">
                                            <?php if(isset($reportcogs)): ?>
                                            <?php $__currentLoopData = $reportcogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="ftsize12l aaa"><?php echo e($cog['nmoutlet']); ?>


                                                    
                                                    
                                                <td class="ftsize12r" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['targetotl'], 0, '', '.')); ?>

                                                </td>
                                                <td class="ftsize12r" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['sales'], 0, '', '.')); ?></td>
                                                <td class="ftsize12r red"><?php echo e($cog['ptarget']); ?> %</td>

                                                <td class="ftsize12r" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['cogsMenuDineIn'], 0, '', '.')); ?></td>
                                                <td class="ftsize12r" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['cogsMenuAwayDelivery'], 0, '', '.')); ?>

                                                </td>
                                                <td class="ftsize12r red" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['totalCogs'], 0, '', '.')); ?></td>
                                                <td class="text-center red" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e($cog['persenCogs']); ?> %</td>
                                                <td class="ftsize12r" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['cogsMaterialRaw'], 0, '', '.')); ?>

                                                </td>
                                                <td class="ftsize12r" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['cogsMaterialSustain'], 0, '', '.')); ?>

                                                </td>
                                                <td class="ftsize12r" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['cogsMaterialPackaging'], 0, '', '.')); ?>

                                                </td>
                                                <td class="ftsize12r red" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format( $cog['totalcogsMaterial'], 0, '', '.')); ?>

                                                </td>
                                                <td class="ftsize12r red" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e($cog['persencogsMaterial']); ?> %</td>
                                                <td class="fsize text-right cs" <?php if($cog['materialkrgmenu'] < 0 ||
                                                    $cog['materialkrgmenu']> 10): ?> style="background-color:rgba(253,
                                                    136, 136,
                                                    0.808;max-width: 50px;min-width: 50px"
                                                    <?php else: ?>
                                                    style="background-color:#eca02e57;max-width: 50px;min-width:
                                                    50px"
                                                    <?php endif; ?>
                                                    ><?php echo e($cog['materialkrgmenu']); ?> %</td>
                                                <td class="ftsize12r blue" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format($cog['cogsPTS'], 0, '', '.')); ?></td>
                                                <td class="ftsize12r blue" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format($cog['cogsRetur'], 0, '', '.')); ?></td>
                                                <td class="ftsize12r blue" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format($cog['cogsVariance'], 0, '', '.')); ?></td>
                                                <td class="ftsize12r blue" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format($cog['SaldoMaterialAwal'], 0, '', '.')); ?></td>
                                                <td class="ftsize12r blue" style="max-width: 50px;min-width: 50px">
                                                    <?php echo e(number_format($cog['SaldoMaterialAkhir'], 0, '', '.')); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function pilihwaktu(){
            // var nip = $('#amnip').val();
            // $('#nip').val(nip);
            $('#formwaktu').submit();
        }
        function piliham(){
            var tgl = $('#waktu').val();
            $('#tgl').val(tgl);
            $('#formam').submit();
        }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//cogs/viewcogs.blade.php ENDPATH**/ ?>