<div class="modal fade" id="lapex" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 52px;">
            <div class="modal-header">
                <h5 class="modal-title-req" id="exampleModalLabel">Laporan Ticketing</h5>
                <i class="fa fa-times-circle fa-2x closemod modtglhist" data-dismiss="modal"></i>
            </div>
            <div class="modal-body scl">
                <form action="{{route('report')}}" method="POST" id="download">
                    @csrf
                    <div class="form-group">
                        <p for="kdoutlet" class="col-form-label f-14">Pilih Outlet </p>
                        <select name="kdoutlet" id="" class="theSelect form-control">
                            @foreach (session('df_outlet') as $item)
                            <option value="{{$item['KdOutlet']}}">{{$item['NmOutlet']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tglawal" class="col-form-label f-14">Tanggal Awal </label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label for="tglakhir" class="col-form-label f-14">Tanggal Akhir</label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="text-center" style="display: flex">
                        <button type="submit" onclick="donepil()" class="btn btn-block btn-danger m-1" id="lapexcel"
                            style="background:linear-gradient(#0dbb35,#1da73d);font-weight:bold; border-radius: 12px;"><i
                                class="fa fa-paper-plane"></i> Download
                            laporan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>