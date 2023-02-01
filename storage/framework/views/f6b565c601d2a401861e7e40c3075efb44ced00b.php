<style>
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        /* height: 100%; */
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        /* margin: 5% auto 15% auto; */
        border: 1px solid #888;
        /* width: 95%; */
        /* top: 10%; */
    }

    label {
        display: inline-block;
        margin-bottom: 0.2rem !important;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes  animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media  screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }

    .form-group {
        margin-bottom: 0.1rem !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 0.75rem !important;
    }

    .bootstrap-select .dropdown-toggle .filter-option {
        font-size: 12px !important;
    }

  
</style>
<div id="mdl_updateketqa" class="modal">
    <div class="" style="height: 100%; max-width: 100% !important;  "> 
        <div class="modal-header "
        style="background:white; color: black; margin:5px !important; padding: 5px  !important">
        <span class="center" style="font-weight: 500;  margin-top: 8px;">
            <b style="font-size: 14px;" id="tx_slideqa">Detail PTS  Nama Outlet</b>
        </span>

        <i class="ion-close-circled end-0" style="color: red; font-size: 25px;" onclick="clos_upketqa()"
            class="close"></i> 
    </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm">
                                     
                                    <div class="card-body text-left">    
                                        <div class="w3-content w3-display-container" id="slideimg"> 
                                            <div class="img_ft1"> 
                                                <img id="img_ft1"  style="width:100%"  />  
                                              </div> 
                                              <div class="img_ft1"> 
                                                <img id="img_ft2"  style="width:100%"  />  
                                              </div>  
                                            <button class="w3-button w3-black w3-display-left"
                                                onclick="plusDivs(-1)">&#10094;</button>
                                            <button class="w3-button w3-black w3-display-right"
                                                onclick="plusDivs(1)">&#10095;</button> 
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
<div id="mdl_img1" class="modal">
    <div class="" style=" max-width: 100% !important; margin-top:60px;">
        <div class="modal-content animate" style="height: 90% !important;">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" >Foto 1</b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_img1()"
                    class="close"></i> 
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm"> 
                                    <div class="card-body text-left">  
                                        <div class="row "style="padding:5px;" id="cnt_menunggu">
                                            
                                            <div class="col d-flex justify-content-center"> 
                                                <img id="img_mdlft1"  
                                                        class="center" style=" "  /> 
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
</div>
<div id="mdl_img2" class="modal">
    <div class="" style=" max-width: 100% !important; margin-top:60px;">
        <div class="modal-content animate" style="height: 90% !important;">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" >Foto 2</b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_img2()"
                    class="close"></i> 
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm"> 
                                    <div class="card-body text-left">  
                                        <div class="row "style="padding:5px;" id="cnt_menunggu">
                                            
                                            <div class="col d-flex justify-content-center"> 
                                                <img id="img_mdlft2"  
                                                        class="center" style=" "  /> 
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
</div>

<script>
     var slideIndex = 1;
        showDivs(slideIndex);
        
        function plusDivs(n) {
          showDivs(slideIndex += n);
        }
        
        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("img_ft1");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}

          for (i = 0; i < x.length; i++) {

            x[i].style.display = "none";  
          }
          
          $('#tx_slideqa').html('Bukti PTS '+slideIndex+' / '+x.length);
          x[slideIndex-1].style.display = "block";  
        }

      function clos_upketqa(){ 
            $("#tx_optnqadet").val('-'); 
            $('#tx_ketqa').val('');

            $("#img_mdlft1").attr("src","");
            $("#img_mdlft2").attr("src","");
            slideIndex = 0;
            showDivs(slideIndex += 1);
        document.getElementById('mdl_updateketqa').style.display='none'; 
      }  
   
</script>
<?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/pts/mdl_updateketqa.blade.php ENDPATH**/ ?>