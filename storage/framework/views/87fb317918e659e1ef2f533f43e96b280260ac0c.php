
<div class="modal fade" id="rate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="rateLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailtcLabel" style="font-weight: bold;">Ulasan dan Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" style=" margin-bottom: 64px; ">
                    <div class="rate" style="padding: 0;position: absolute;display:revert; left: 50%;top: 25%;transform: translate(-50%,-50%);>
                        <input type=" radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
            </div>
            <div class="form-group" style="border: hidden;">
                <br>
                <p style="text-align: justify;
                        font-weight: bold;">Berikan Komentar</p>
                <textarea type="text" class="form-control" id="ratingkom" placeholder="Berikan Komentar kamu disini"
                    rows="3"></textarea>
            </div>
            <form action=" <?php echo e(route('ticketing')); ?>" method="GET" id="">
                <button type=" submit" name="simpan" class="btn btn-danger btn-lg btn-block"
                    style="background: #0dbb35;" value="<?php echo e($simpan); ?>">Kirim</button>
            </form>
        </div>
    </div>
</div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/ticketing/modal/rate.blade.php ENDPATH**/ ?>