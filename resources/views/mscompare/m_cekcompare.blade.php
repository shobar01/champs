<div class="modal fade " id="modal_compare" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog modal-lg vertical-align-center">
            <div class="modal-content" style="background-color: #f0f3f4 !important">
                <div class=" " style=" padding: 15px 15px 0px 15px; ">
                    <button id="btn_problem_close" type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{-- <h4 class="modal-title">Keterangan tidak sesuai.?</h4> --}}
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="card-deck mb-3 ">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h5 class="my-0 font-weight-bold">Jualdet ({{session('kdoutlet')}}) yang tidak masuk
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

                                                    {{-- @php $no = 1; @endphp --}}
                                                    @foreach (session('blmmasuk') as $arry)
                                                    <tr>
                                                        <td class=" col-md-1 text-center ">{{$loop->iteration}}</td>
                                                        <td class=" col-md-1 text-left ">{{$arry['noorderms']}}
                                                            <input type="hidden" name="noorder[]"
                                                                value="{{$arry['noorderms']}}">
                                                        </td>
                                                        <td class=" col-md-4 text-left ">{{$arry['fstat']}}
                                                        </td>
                                                    </tr>
                                                    {{-- @php $no++; @endphp --}}
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group mt-5">
                                            <form id="send_resyncmpare" action="{{route('mscompare_resync')}}"
                                                method="POST">
                                                @csrf
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
</div>