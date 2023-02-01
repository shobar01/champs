
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>


<div class="container" style="padding-top: 70px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal"><b>Jadwal Kerja Outlet</b></h4>
            </div>
            <div class="card-body">

                <div class="fw-container">

                    <div class="fw-body">
                        <div class="input-group mb-3 ">
                            <div class="input-group-prepend ">
                                <span class="btn btn-success"> Dept&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo e($dept); ?>" disabled>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="btn btn-success"> Periode</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo e($perd); ?>" disabled>
                        </div>
                        <div class="content">
                            <div class="input-group mb-3">
                                <input id="search_jadwal" type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search Anything here" aria-describedby="basic-addon2">

                            </div>
                            <?php
            
                            // $dept = {{$dept}};
                            $deptt = str_replace(' ', '%20', $dept);
                            //                echo $deptt;
                            $sumber = 'http://api.champ-group.com/champ_dev/champ_api/cmjadwal/viewjdwl?dept='.$deptt;
                            $konten = file_get_contents($sumber);
                            $data = json_decode($konten, true);
                            //echo $data[1]["nama_lokasi"];
                            //            echo "<h1 align='center'>Jumlah lomba anak bercerita terbaik jakarta ada ".count($data)." Siswa dan Siswi</h1>";
                            echo "<br/>";
                            ?>

                            <?php echo $konten;?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_presence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//jadwal/jadwal.blade.php ENDPATH**/ ?>