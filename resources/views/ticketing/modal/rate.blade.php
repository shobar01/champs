{{-- Modal ticketing --}}
<div class="modal fade" id="rate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="rateLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-rate" id="detailtcLabel" style="font-weight: bold;">Ulasan dan Rating</h5>
                <i class="fa fa-times-circle fa-2x closemod modtglhist" id="keluarrate"></i>
            </div>
            <div class="modal-body">
                <form action="{{route('simpan_rating')}}" method="POST" id="simpan_rate"> @csrf
                    <input type="hidden" name="kdticket" id="ratekdticket" class="form-control">
                    <div class="text-center" style=" margin-bottom: 64px; ">
                        <div class="rate"
                            style="padding: 0;position: absolute;display:revert; left: 50%;top: 25%;transform: translate(-50%,-50%);">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 star</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 stars</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <br>
                        <p style="text-align: justify;
                        font-weight: bold;">Berikan Komentar</p>
                        <textarea onkeyup="reg('ulasan')" class="form-control" id="ulasan" name="ulasan"
                            placeholder="Berikan Komentar kamu disini" rows="3"></textarea>

                    </div>
                </form>
                <button type="button" class="btn btn-danger btn-lg btn-block" style="background: #0dbb35;"
                    onclick="simpanrating()">Kirim</button>
            </div>
        </div>
    </div>
</div>