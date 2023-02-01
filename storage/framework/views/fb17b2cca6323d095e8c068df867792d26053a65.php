<!-- Modal List Menu -->
<div class="modal fade" id="modal_inptqty" role="dialog" aria-labelledby="ModalInptQty" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <form id="send_mdllstmenu" action="<?php echo e(route('dashboard_addlstmenu')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="clr()"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="LabelMdlQty"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <input type="text" name="kdbarang" id="kdbarang" >
                                        <input type="text" name="periode1" id="periode1" >
                                        <table class="barinumpad" align="center" border="1" width="50%">
                                            <tr>
                                                <td colspan="3">
                                                    <input type="text" name="qtybarang" id="qtybarang">
                                                </td>
                                            </tr>
                                            <tr style="background: #EEEEEE;">
                                                <td><input class="btn btn-round btn-sm" type="button" value="1"
                                                        onclick="dis('1')" /></td>
                                                <td><input class="btn btn-round btn-sm" type="button" value="2"
                                                        onclick="dis('2')" /></td>
                                                <td><input class="btn btn-round btn-sm" type="button" value="3"
                                                        onclick="dis('3')" /></td>
                                            </tr>
                                            <tr style="background: #EEEEEE;">
                                                <td><input class="btn btn-round btn-sm" type="button" value="4"
                                                        onclick="dis('4')" /></td>
                                                <td><input class="btn btn-round btn-sm" type="button" value="5"
                                                        onclick="dis('5')" /></td>
                                                <td><input class="btn btn-round btn-sm" type="button" value="6"
                                                        onclick="dis('6')" /></td>
                                            </tr>
                                            <tr style="background: #EEEEEE;">
                                                <td><input class="btn btn-round btn-sm" type="button" value="7"
                                                        onclick="dis('7')" /></td>
                                                <td><input class="btn btn-round btn-sm" type="button" value="8"
                                                        onclick="dis('8')" /></td>
                                                <td><input class="btn btn-round btn-sm" type="button" value="9"
                                                        onclick="dis('9')" /></td>
                                            </tr>
                                            <tr style="background: #EEEEEE;">
                                                <td><input class="btn btn-round btn-sm" type="button" value="00"
                                                        onclick="dis('00')" /></td>
                                                <td><input class="btn btn-round btn-sm" type="button" value="0"
                                                        onclick="dis('0')" /></td>
                                                <td><input class="btn btn-round btn-sm ekor" type="button" value="C"
                                                        onclick="clr()" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        
                    <div class="side">
                        <button type="submit" onclick="loadingon();" class="btn btn-block btn-primary">Send <i
                                class="fa fa-paper-plane"></i></button>
                    </div>
                    
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End Modal List menu-->
<!-- Modal Baking -->

<div id="modal-container">
    <div class="modal fade" id="modal_view" role="dialog" aria-labelledby="ModalView" aria-hidden="true">
        <div class="vertical-alignment-helper">
            <!--        <div class="vertical-align-center container">-->
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <button id="btn_doneclose" type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                        <!--                    <div id="result"> </div>-->
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <!--<div class="panel-heading"><h3>Iconic Timeline</h3></div>-->
                                        <div class="">
                                            <div class="col-md-12">
                                                <h1 class="text-center"><b>50 Pcs</b></h1>

                                                <div class="text-left" style="color: #ff0000; font-size: 10px;">
                                                    *Pilih <span class="text-success">Done</span> apabila sesuai dengan
                                                    jumlah
                                                    yang
                                                    di buat
                                                </div>
                                                <div class="text-left" style="color: #ff0000; font-size: 10px;">
                                                    *Pilih <span class="text-warning">Problem</span> apabila tidak
                                                    sesuai dengan
                                                    jumlah yang di buat
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn_problem" type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal_ketproblem" data-dismiss="modal">Problem
                        </button>
                        <button type="button" class="btn btn-success">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="modal_ketproblem" role="dialog" aria-labelledby="ModalView" aria-hidden="true">
        <div class="vertical-alignment-helper">
            <!--        <div class="vertical-align-center container">-->
            <div class="modal-dialog vertical-align-top">
                <div class="modal-content">

                    <div class="modal-header">
                        <button id="btn_problem_close" type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Keterangan tidak sesuai.?</h4>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" id="textarea_problem" rows="3" virtual-keyboard></textarea>

                        <div class="virtual-keyboard-hook" data-target-id="textarea_problem"
                            data-keyboard-mapping="qwerty" data-kiosboard-type="all">
                            <i class="fa fa-keyboard-o" aria-hidden="true"></i></div>

                        <!--                    <input type="text" class="modal-content-right-text-mail"/>-->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- End Modal -->


<script type="text/javascript">
    /*NumPad*/
      function dis(val) {
        document.getElementById("qtybarang").value += val
    }
    function solve() {
        let x = document.getElementById("qtybarang").value
        let y = eval(x)
        document.getElementById("qtybarang").value = y
    }
    function clr() {
        document.getElementById("qtybarang").value = ""
    }
</script><?php /**PATH C:\xampp\htdocs\wolaravel\resources\views/modal/m_dashboard.blade.php ENDPATH**/ ?>