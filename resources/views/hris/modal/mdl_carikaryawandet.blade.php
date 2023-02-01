<style>
    /* The Modal (background) */
    .modal-dialog {
        min-height: calc(100vh - 60px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: auto;
    }

    @media(max-width: 768px) {
        .modal-dialog {
            min-height: calc(100vh - 90px);
        }
    }

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
        padding-top: 0 !important;
        overflow: scroll;
    } 
    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        /* margin: 5% auto 15% auto; */
        border: 1px solid #888;
        border-radius: 0.6rem !important;
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

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
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


</style>
<div id="mdl_carikrwn" class="modal">
    <div class="modal-dialog" style="max-width: 100% !important;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" id="tx_nmmap">Ahmad Sobari </b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_wamap()"
                    class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">

                        <input type="hidden" id="tx_long" value="107.5623504">
                        <input type="hidden" id="tx_lat" value="-6.8373736">
                        <input type="hidden" id="tx_wamap" value="-6.8373736">

                        <div class="col-md-12 col-lg-4">
                            <div class="card p-2 mb-2" onclick="btn_wanow()"> 
                                <div class="text-left">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="input-group-prepend">
                                            <div class="icon"> 
                                                <lottie-player
                                                    src="https://assets7.lottiefiles.com/packages/lf20_5gezzxwi.json"
                                                    background="transparent" speed="0.6"
                                                    style="width: 50px; height: 50px;" loop autoplay>
                                                </lottie-player>
                                            </div>
                                        </div>
                                        
                                        <b id="tx_kettolak" style=" color:black; width:100%;"> Hubungi Sekarang </b>
                                    </div>
                                </div> 
                            </div>

                            <div class="card p-2 mb-2"> 
                                <div class="text-left">
                                    <div class="d-flex flex-row align-items-center">
                                       
                                        <div id="map" class="col" style="height: 300px; width:240px"></div>
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
function clos_wamap(){ 
    document.getElementById('mdl_carikrwn').style.display='none';  
}
function btn_wanow(){ 
    var wanow = $('#tx_wamap').val();

  location.href = "https://api.whatsapp.com/send?phone="+wanow+"&text=%20";
    // document.getElementById('mdl_carikrwn').style.display='none';  
}
function myMap() {  
        // var mapOptions1 = {  
        //   center: new google.maps.LatLng(51.508742,-0.120850),  
        //   zoom:9,  
        //   mapTypeId: google.maps.MapTypeId.ROADMAP  
        // };  
        
        var lokasi =  {lat: parseFloat(document.getElementById('tx_lat').value), lng: parseFloat(document.getElementById('tx_long').value)};
        var mapOptions2 = {  
          center: new google.maps.LatLng(lokasi),  
          zoom:18,  
          mapTypeId: google.maps.MapTypeId.SATELLITE  
        };  
        // The marker, positioned at Uluru
        
        // var mapOptions3 = {  
        //   center: new google.maps.LatLng(51.508742,-0.120850),  
        //   zoom:9,  
        //   mapTypeId: google.maps.MapTypeId.HYBRID  
        // };  
        // var mapOptions2 = {  
        //   center: new google.maps.LatLng(51.508742,-0.120850),  
        //   zoom:9,  
        //   mapTypeId: google.maps.MapTypeId.TERRAIN  
        // };  
        // var map1 = new google.maps.Map(document.getElementById("googleMap"),mapOptions1);  
        var map2 = new google.maps.Map(document.getElementById("map"),mapOptions2);  
        const marker = new google.maps.Marker({
            position: lokasi,
            map: map2,
        });
        // var map3 = new google.maps.Map(document.getElementById("googleMap3"),mapOptions3);  
        // var map4 = new google.maps.Map(document.getElementById("googleMap4"),mapOptions4);  
      }  

    //   google.maps.event.addDomListener(window, "load", myMap);
</script>


<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfFB3dsyGmzSihW3x1P1yAEyq3Kdp49NY&callback=myMap&v=weekly"
async></script> 