<div class="modal fade" id="addkategori" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 52px;">
            <div class="modal-header mdlh">
                <h5 class="modal-title-req" id="exampleModalLabel">Tambah Kategori</h5>
                <i class="fa fa-times-circle fa-2x closemod modtglhist" data-dismiss="modal"></i>
            </div>
            <div class="modal-body mbod">
                <div class="table-responsive brigez">
                    <table id="obay" class="table table-borderless mb-5">
                        <tbody id="isikatbaru">
                            @foreach ($lskat as $kat)
                            <tr id="xx{{$kat['kdkat']}}">
                                <td width="90%">
                                    <div class="form-group">
                                        <span class="btn btn-block btnkat">
                                            {{$kat['nmkat']}}
                                        </span>
                                    </div>
                                </td>
                                <td width="10%">
                                    <button id="delete" onclick="delkat('{{$kat['kdkat']}}')" type="button"
                                        class="btn btkateg"><i class="fa fa-close fa-1x"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <button onclick="tambahkateg()" type="button" class="btn kategoriadd"><i
                            class="fa fa-plus fa-1x bold">
                            Tambah</i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>