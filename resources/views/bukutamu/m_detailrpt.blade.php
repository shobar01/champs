<div class="modal fade" id="modal_detrpt" role="dialog" aria-labelledby="ModalDetRpt" aria-hidden="true">

    <!--        <div class="vertical-align-center container">-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lbl_tgl"></h4>

                <button id="btn_doneclose" type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <!--                    <div id="result"> </div>-->
            </div>
            <div class="modal-body">
                <table id="tb_rptbukutamudetail" class="display nowrap " style="width:100%">
                    <thead>
                        <tr>
                            <th style="border-top: 1px solid #111 !important;">No. Hp</th>
                            <th style="border-top: 1px solid #111 !important;">Nama</th>
                            <th style="border-top: 1px solid #111 !important;">Datang</th>
                            <th style="border-top: 1px solid #111 !important;">Pulang</th>
                            <th style="border-top: 1px solid #111 !important;">JmlOrang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dfrbyOutlet as $arrybyotl)
                        @if ($arrybyotl['Tanggal'] == '28 March 2021'
                        && $arrybyotl['KdOutlet'] == 'RCJ07')
                        @foreach ($arrybyotl['DaftarTamu'] as $detail)
                        <tr>
                            <td>{{$detail['NoHp']}}</td>
                            <td>{{$detail['Nama']}}</td>
                            <td>{{$detail['Datang']}}</td>
                            <td>{{$detail['Pulang']}}</td>
                            <td>{{$detail['JmlOrang']}}</td>
                        </tr>
                        @endforeach
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>