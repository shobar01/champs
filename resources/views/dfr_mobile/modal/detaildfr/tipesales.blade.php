<div class="modal fade" id="modaltipe">
        <div class="  color-card" style="border-radius:12px;">
            <div class="modal-header p-1" style="background-color:#261B14;color:#ffff;border-radius:12px;">
                <h5>Detail Tipe Jual</h5>
               
                <button type="button" class="close"  onclick="document.getElementById('modaltipe').style.display='none';"> 
                    <span aria-hidden="true"> &times;</span>
                </button>
            </div>
            <div class="modal-body pt-0 scroll color-card text-center" style="background-color: {{$color4}}">
                <div class="row">
                    @foreach ($hitung as $hitut)
                    <div class="col">
                        <button type="button" class="btn btn-round text-center"
                            style="width:100px;height:100px;background-color:#261B14;color:#ffff;border-radius: 50%;font-size:13px;font-weight:bold">
                            {{$hitut['fmja']}}<br>{{number_format($hitut['fjual'], 0, '', '.')}}<br>
                            <span style="font-size:9px;">{{$hitut['fbanyak']}} Transaksi</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>