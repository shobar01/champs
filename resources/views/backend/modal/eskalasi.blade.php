<div class="modal slidein" id="modeskalasi" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="detailtcLabel" aria-hidden="true">
    <div class="modal-dialog modal-bottom">
        <div class="modal-content content-bottom">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span id="detailtcLabel">Pilih Tujuan Eskalasi</span>
                </h5>
                <button type="button" class="close clscek" aria-label="Close" onclick="batalcek()">
                    <i class="fa fa-times-circle fa-lg tms"></i>
                </button>
            </div>
            <div class="modal-body pt-3 mbmb" id="backendp">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-dept-tab" data-toggle="pill" data-target="#pills-dept"
                            type="button" role="tab" aria-controls="pills-dept" aria-selected="true">Department</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-nipdept-tab" data-toggle="pill" data-target="#pills-nipdept"
                            type="button" role="tab" aria-controls="pills-nipdept" aria-selected="false">Nip</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-dept" role="tabpanel"
                        aria-labelledby="pills-dept-tab">
                        <input type="text" class="form-control searchtb searchx" id="search2"
                            placeholder="Cari Departement ...">
                        <div class="table-responsive brigez">
                            <table id="obay" class="table table-borderless mb-5">
                                <tbody class="tbbd">
                                    @foreach (session('piltujuan') as $kat)
                                    <tr onclick="piltuj('{{$kat['kddept']}}')" id="pilihan{{$kat['kddept']}}"
                                        class="showpil">
                                        <td width="90%">
                                            <div class="form-group">
                                                <span class="btn btn-block btnkat piltuj" id="pil{{$kat['kddept']}}">
                                                    {{$kat['iddept']}}
                                                </span>
                                            </div>
                                        </td>
                                        <td width="10%">
                                            <button id="pil2{{$kat['kddept']}}" type="button" onclick="pilihdepteska()"
                                                class="btn btkateg piltuj"><i class="fa fa-check fa-1x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-nipdept" role="tabpanel" aria-labelledby="pills-nipdept-tab">
                        <select name="" id="mdept" class="form-control searchtb" onchange="pilihdepteska()">
                            @foreach (session('piltujuan') as $item)
                            <option value="{{$item['kddept']}}#{{$item['iddept']}}">{{$item['iddept']}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="kddepp">
                        <input type="text" class="form-control searchtb searchx" id="search3" placeholder="Cari Karyawan ...">
                        <div class="table-responsive brigez">
                            <table id="obay" class="table table-borderless mb-5">
                                <tbody class="tbbd" id="isinip">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-eskalasi shadow" onclick="simpaneska()"><i class="fa fa-paper-plane"></i> Kirim
                    Eskalasi</button>
            </div>


        </div>
    </div>
</div>

<form action="{{route('simpaneskalasi')}}" method="post" id="simpeska">@csrf
    <input type="hidden" name="kdticket" id="kdticketpil" value="F">
    <input type="hidden" name="deptawal" id="deptawal" value="F">
    <input type="hidden" name="dept" id="deptku" value="F">
    <input type="hidden" name="nip" id="nipku" value="F">
    <input type="hidden" name="nipawal" id="nipawal" value="F">
    <input type="hidden" name="ket" id="keteska2" value="-">
</form>