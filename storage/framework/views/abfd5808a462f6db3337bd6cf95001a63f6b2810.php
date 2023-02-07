<style>
    .mbmb {
        height: 480px;
    }

    .btn-eskalasi {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: linear-gradient(168deg, #41ff00, #1b3b0d);
        color: white;
        font-weight: bold;
        border: 0;
        border-radius: 12px;
    }

    .searchtb {
        border: 1px solid red;
        margin-bottom: 12px;
        border-radius: 12px;
    }

    .sb {
        border-radius: 12px;
        width: 100%;
        margin-bottom: 12px;
    }

    .sbd {
        background: linear-gradient(140deg, #d50000, #530101);
        border-radius: 12px;
        color: white;
        text-align: center;
        font-weight: bold;
    }

    .clscek {
        position: absolute;
        top: 12px;
        right: 20px;
    }

    .clscek>i {
        color: red !important;
    }

    .txteks {
        font-size: 20px;
        font-weight: bold;
    }

    .none {
        display: none;
    }

    body {
        background: #cc1a0b;
    }

    .bold {
        font-weight: bold;
    }

    .nav-item {
        width: 50%;
        text-align: center;
    }

    .nav-item>a {
        color: #cc1a0b;
    }

    .nav-link {
        width: 100%;
        text-align: center;
    }

    .nav-link.active {
        background: transparent !important;
        color: red !important;
        border-bottom: 4px solid #cc1a0b;
        font-weight: bold;
    }

    .spanmn {
        position: absolute;
        right: 6px;
        background: #ff4600;
        width: 20px;
        height: 20px;
        top: 4px;
        border-radius: 50%;
        padding: 2px;
    }

    .btn-collp {
        position: relative;
        border-radius: 12px;
        font-weight: bold;
        background-color: #261B14;
        color: white;
        font-size: 11px;
    }

    .btn-collp:hover {
        color: #fff;
    }

    .tbhead {
        font-size: 11px;
        padding: 0;
    }

    .tbres {
        height: 250px;
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .rd {
        color: #cc1a0b;
    }

    .grn {
        color: green;
    }

    .tbr {
        height: 535px;
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .table td,
    .table th {
        padding: 0 2px;
        font-size: 11px;
        vertical-align: top;
    }

    /* calendar */
    .calendarList1 {
        list-style: none;
        width: 100%;
        margin: 0;
        padding: 0;
        text-align: center;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-template-rows: repeat(1, 40px);
        align-items: center;
        justify-items: center;
        grid-gap: 8px;
        font-size: 14px;
        color: #707070;
    }

    .calendarList2 {
        list-style: none;
        margin: 0;
        padding: 0;
        text-align: center;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-template-rows: repeat(6, 40px);
        align-items: center;
        justify-items: center;
        grid-gap: 8px;
        font-size: 14px;
        color: #707070;
    }

    .calendarYearMonth {
        color: #271a12;
    }

    .calendarYearMonth p {
        display: inline-block;
        vertical-align: middle;

    }

    .calBtn {
        user-select: none;
        cursor: pointer;
        background: #271a12;
        margin: 8px 0;
        padding: 8px 12px;
        border-radius: 12px;
        font-size: 14px;
        line-height: 22px;
        color: #fff;
        border: 1px solid #271a12;
    }

    .lingkar {
        border: 3px solid #cc1a0b;
        border-radius: 30%;
        padding: 3px;
        font-weight: bold;
        position: relative;
        width: 35px;
        height: 35px;
    }

    .lx {
        position: absolute;
        top: -15px;
        right: -12px;
        background: #62ff00;
        color: black;
        padding: 1px;
        border-radius: 8px;
        border: 1px solid #cc1a0b;
        width: 25px;
        height: 25px;
        vertical-align: middle;
    }

    .date-hist {
        position: fixed;
        right: 15px;
        bottom: 75px;
        background: linear-gradient(3.2941rad, rgb(17, 255, 0), #054c00);
        color: white !important;
        font-weight: bold;
        border-radius: 16px;
        padding: 0;
        border: 0;
        padding: 0 15px;
        height: 35px;
    }

    .img-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .opacity-img {
        position: absolute;
        width: 250px;
        top: 50%;
        opacity: .2;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .btn-hist {
        position: absolute;
        right: 10px;
        bottom: 17%;
        background: linear-gradient(3.2941rad, rgb(0, 85, 255), #05004c);
        color: white !important;
        font-weight: bold;
        border-radius: 16px;
        padding: 0;
        border: 0;
        width: 80px;
        height: 35px;
    }

    .btn-update {
        left: 50%;
        position: absolute;
        bottom: 17%;
        background: linear-gradient(3.2941rad, #cc1a0b, #6b0505);
        transform: translate(-50%, 0);
        color: white !important;
        font-weight: bold;
        border-radius: 16px;
        padding: 0;
        border: 0;
        width: 120px;
        height: 35px;
    }

    @keyframes  btncs {
        0% {
            width: 120px;
            bottom: 17%;
        }

        50% {
            width: 35px;
            bottom: 17%;
        }

        100% {
            bottom: 100%;
            opacity: 0;
        }
    }

    @keyframes  btncx {
        0% {
            width: 35px;
            bottom: 100%;
            opacity: 0;
        }

        50% {
            width: 35px;
            bottom: 17%;
            opacity: .5;
        }

        100% {
            width: 120px;
            opacity: 1;
        }
    }

    .btncs {
        animation-duration: 1s;
        animation-name: btncs;
        width: 35px;
        bottom: 100%;
    }

    .btncx {
        animation-duration: 1s;
        animation-name: btncx;
        width: 120px;
        bottom: 17%;
    }

    #cbd {
        overflow-x: hidden;
        overflow-y: scroll;
        /* padding-bottom: 100px; */
        height: 150px;
    }

    .bold {
        font-weight: bold;
    }

    .panel {
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .time {
        font-size: 10px;
        font-weight: 500;
    }

    .info {
        position: relative;
    }

    .clip {
        font-size: 10px;
        font-weight: 500;
        position: absolute;
        left: 1px;
        top: 20px;
        width: 200px;
    }

    .btn-note {
        position: absolute;
        bottom: 20px;
        right: 20px;
        border-radius: 12px;
    }

    .txa {
        border: 1px solid #cc1a0b;
        border-radius: 12px;
    }

    hr {
        margin: 5px 5px 0 0;
        border: 1px solid #000000;
    }

    .img-foto {
        width: 50px;
        border-radius: 12px;
    }

    .fw {
        font-weight: bold;
        position: absolute;
        top: 2px;
        padding-left: 18px;
        font-size: 14px;
    }

    .crd {
        border-radius: 20px;
        border: 0;
    }

    .nw {
        display: flex;
        justify-content: space-evenly;
        padding-top: 3px;
    }

    .spn-bell {
        position: relative;
    }

    .btn-rad {
        position: absolute;
        right: -5px;
        border-radius: 50%;
        background: #cc1a0b;
        padding: 1px;
        width: 15px;
        height: 15px;
        font-size: 9px;
        top: -5px;
        color: white;
        font-weight: bold;
    }

    .search,
    .tanggal {
        background: white;
        border: 2px solid #cc1a0b;
        font-weight: bold;
        border-radius: 12px;
        font-size: 11px;
    }

    .main-card {
        position: fixed;
        height: 100%;
        width: 100%;
        top: 9px;
        border-radius: 20px 20px 0 0;
        /* background: #f0f3f4; */
    }

    .head {
        position: fixed;
        top: 12px;
        left: 50%;
        transform: translate(-50%, 0);
    }

    .head-img {
        width: 60px;
    }

    .foot {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, 0);
    }

    .foot-img {
        width: 500px;
    }

    .ccb {
        padding-bottom: 1rem !important;
        flex: inherit;
    }

    .closemod {
        color: #cc1a0b;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 999;
    }

    .modtglhist {
        right: -7px;
        top: -9px;
    }

    .modtglhist2 {
        right: 6px;
        top: 5px;
    }


    .bfoto {
        position: relative;
    }

    .lbl-foto {
        position: absolute;
        bottom: 0;
        left: 10px;
        color: white;
        font-weight: bold;
        background: #0000007a;
        padding: 0 6px;
        border-radius: 12px;
    }

    .btn-head {
        background: #cc1a0b;
        color: white !important;
        font-weight: bold;
        border-radius: 20px;
    }

    .btn-head2 {
        background: transparent;
        color: #cc1a0b !important;
        font-weight: bold;
        border-radius: 20px;
        border: 2px solid #cc1a0b;
    }

    .lbl-number {
        font-size: 12px;
        margin-top: 4px;
        font-weight: bold;
        white-space: nowrap;
        position: absolute;
        left: -6px;
    }

    .input-number {
        padding: 0;
        font-size: 12px;
        height: 24px;
        border-radius: 12px;
        margin-top: 4px;
        font-weight: bold;
    }

    .fotodet {
        border-radius: 12px;
    }

    .modal-content {
        border-radius: 12px;
    }

    #hargaedit {
        border-radius: 12px;
        font-weight: bold;
        font-size: 20px;
    }

    .span-act {
        position: absolute;
        right: -27px;
        padding-top: 5px;
        width: 67px;
    }

    .btn-act {
        position: absolute;
        border-radius: 50%;
        color: white;
        font-size: 10px;
        padding: 0;
        width: 25px;
        height: 25px;
    }

    .bbb {
        border-radius: 12px;
        font-weight: bold;
    }

    .btn-reject.active {
        background: linear-gradient(3.2941rad, #cc1a0b, #6b0505);
        color: white;
    }

    .btn-approve.active {
        background: linear-gradient(3.2941rad, green, #073504);
        color: white;
    }

    .btn-reject {
        background: white;
        color: #cc1a0b;
        border: 1px solid #cc1a0b;
        right: 80px;
    }

    .btn-approve {
        background: white;
        color: green;
        border: 1px solid green;
    }

    .mxz {
        content: '';
        border-right: 2px solid #000;
        position: absolute;
        left: 64%;
        top: 0;
        height: 100%;
    }

    /* font awesome */
    .fa-times-circle {
        color: rgb(255, 0, 0);
    }

    .fa-times-circle.tms {
        color: white;
    }

    .fa-sync {
        color: black;
        font-size: 20px;
    }

    .fa-bell {
        color: rgb(255 160 0);
        font-size: 20px;
    }

    .fa-bookmark {
        position: absolute;
        top: 0;
        color: #cc1a0b;
        font-size: 20px;
    }

    .fa-clock {
        color: #ff00007a;
    }

    @media  only screen and (max-width: 600px) {
        .foot-img {
            width: 400px;
        }
    }

    /* 
    @media  only screen and (max-width: 768px) {
        .calendarList2 {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: center;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            grid-template-rows: repeat(6, 40px);
            align-items: center;
            justify-items: center;
            grid-gap: 8px;
            font-size: 14px;
            color: #707070;
        }

        .calendarYearMonth {
            color: #271a12;
        }

        .calendarYearMonth p {
            display: inline-block;
            vertical-align: middle;

        }
    } */

    /* loading  */
    /* Absolute Center Spinner */
    .loading {
        position: fixed;
        z-index: 999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    /* Transparent Overlay */
    .loading:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
        background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
    }

    /* :not(:requi#cc1a0b) hides these rules from IE9 and below */
    .loading:not(:required#cc1a0b) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading:not(:required#cc1a0b):after {
        content: '';
        display: block;
        font-size: 10px;
        width: 1em;
        height: 1em;
        margin-top: -0.5em;
        -webkit-animation: spinner 150ms infinite linear;
        -moz-animation: spinner 150ms infinite linear;
        -ms-animation: spinner 150ms infinite linear;
        -o-animation: spinner 150ms infinite linear;
        animation: spinner 150ms infinite linear;
        border-radius: 0.5em;
        -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-moz-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-o-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes  spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    /* loading2 */
    .loading2 {
        position: fixed;
        z-index: 999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    /* Transparent Overlay */
    .loading2:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: transparent;
    }

    /* :not(:requi#cc1a0b) hides these rules from IE9 and below */
    .loading2:not(:require#cc1a0b) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading2:not(:require#cc1a0b):after {
        content: '';
        display: block;
        font-size: 10px;
        width: 1em;
        height: 1em;
        margin-top: -0.5em;
        -webkit-animation: spinner 150ms infinite linear;
        -moz-animation: spinner 150ms infinite linear;
        -ms-animation: spinner 150ms infinite linear;
        -o-animation: spinner 150ms infinite linear;
        animation: spinner 150ms infinite linear;
        border-radius: 0.5em;
        -webkit-box-shadow: rgba(254, 0, 0, 0.75) 1.5em 0 0 0, rgba(254, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(254, 0, 0, 0.75) 0 1.5em 0 0, rgba(254, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(254, 0, 0, 0.75) -1.5em 0 0 0, rgba(254, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(254, 0, 0, 0.75) 0 -1.5em 0 0, rgba(254, 0, 0, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(254, 0, 0, 0.75) 1.5em 0 0 0, rgba(254, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(254, 0, 0, 0.75) 0 1.5em 0 0, rgba(254, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(254, 0, 0, 0.75) -1.5em 0 0 0, rgba(254, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(254, 0, 0, 0.75) 0 -1.5em 0 0, rgba(254, 0, 0, 0.75) 1.1em -1.1em 0 0;
    }

    .mx {
        background: red;
        color: white;
    }

    .mz {
        background: red;
        color: white;
    }

    .mk {
        background: #0dbb35;
        color: white;
    }

    .mm {
        background: #034b14;
        color: white;
    }

    .mn {
        background: black;
        color: white;
    }

    .mj {
        background: #5271ff;
        color: white;
    }

    .md {
        background: #004aad;
        color: white;
    }

    .tick_bat {
        background: black;
        color: white;
    }

    .mg {
        background: rgba(230, 230, 15, 0.877);
        color: black;
    }

    .mo {
        background: gray;
        color: white;
    }

    .mter {
        background: linear-gradient(rgba(224, 74, 15, 0.918), rgb(119, 69, 3));
        color: white;
    }


    /* ---------- */
    .mx2.active {
        color: #cc1a0b !important;
        border-bottom: 4px solid #cc1a0b !important;
    }

    .mz2.active {
        color: #cc1a0b !important;
        border-bottom: 4px solid #cc1a0b !important;
    }

    .mk2.active {
        color: #0dbb35 !important;
        border-bottom: 4px solid #0dbb35 !important;
    }

    .mm2.active {
        color: #034b14 !important;
        border-bottom: 4px solid #034b14 !important;
    }

    .mn2.active {
        color: black !important;
        border-bottom: 4px solid black !important;
    }

    .mj2.active {
        color: #5271ff !important;
        border-bottom: 4px solid #5271ff !important;
    }

    .md2.active {
        color: #004aad !important;
        border-bottom: 4px solid #004aad !important;
    }

    .tick_bat2.active {
        color: black !important;
        border-bottom: 4px solid black !important;
    }

    .mg2.active {
        color: rgba(230, 230, 15, 0.877) !important;
        border-bottom: 4px solid rgba(230, 230, 15, 0.877) !important;
    }

    .mo2.active {
        color: gray !important;
        border-bottom: 4px solid gray !important;
    }

    /* --------- */
    .box-kat {
        border: 0;
        border-radius: 12px;
        width: 60px;
        height: 60px;
    }

    .f-label {
        font-size: 10px;
        font-weight: bold;
    }

    .jml-alert {
        background: linear-gradient(red, black);
        padding: 5px 0;
        color: white;
        border-radius: 12px;
        position: absolute;
        margin-top: -25px;
        font-size: 12px;
        width: 23px;
        height: 23px;
        font-weight: bold;
    }

    .btn-tanggal {
        background: white;
        border: 2px solid #cc1a0b;
        font-weight: bold;
        border-radius: 12px;
        font-size: 11px;
    }

    .card-rad {
        border-radius: 12px;
    }

    .btn-status {
        border-radius: 12px 0;
    }

    .btn-status2 {
        border-radius: 12px;
        width: 50px;
        height: 50px;
        z-index: 99999;
        position: absolute;
        top: 24px;
        left: -5px;
    }

    .f-9 {
        font-size: 9px;
    }

    .f-10 {
        font-size: 10px;
    }

    .f-11 {
        font-size: 11px;
    }

    .f-12 {
        font-size: 12px;
    }

    .bold {
        font-weight: bold;
    }

    .txtnama {
        font-size: 12px;
    }

    .modal-bottom {
        position: fixed;
        top: auto;
        right: auto;
        left: auto;
        bottom: 0;
        margin: 0;
        width: 100%;
    }


    .content-bottom {
        border-radius: 12px 12px 0 0;
    }

    .body-bottom {
        height: 425px;
        overflow-y: scroll;
    }

    .slidein {
        animation: fadeIn 1s, slideIn .8s linear;
    }

    @keyframes  slideIn {
        0% {
            transform: translateY(400px);
            animation-timing-function: ease-out;
        }

        60% {
            transform: translateY(-30px);
            animation-timing-function: ease-in;
        }

        80% {
            transform: translateY(10px);
            animation-timing-function: ease-out;
        }

        100% {
            transform: translateY(0px);
            animation-timing-function: ease-in;
        }
    }

    @keyframes  fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .slideout {
        animation: fadeOut 1s, slideOut .8s linear;
    }

    @keyframes  slideOut {
        0% {
            transform: translateY(0px);
            animation-timing-function: ease-out;
        }

        30% {
            transform: translateY(-30px);
            animation-timing-function: ease-in;
        }

        80% {
            transform: translateY(80px);
            animation-timing-function: ease-out;
        }

        100% {
            transform: translateY(400px);
            animation-timing-function: ease-in;
        }
    }

    @keyframes  fadeOut {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 1;
        }

        80% {
            opacity: .5;
        }

        100% {
            opacity: 0;
        }
    }

    .btn-topright {
        position: absolute;
        top: 20px;
        right: 10px;
        border: 0;
    }

    .btn-info {
        background: linear-gradient(20deg, #1b04af, #0095ff);
        width: 30px;
        height: 30px;
        padding: 2px;
        border-radius: 50%;
    }

    .titlereq {
        font-size: 15px;
        color: #ffffffd1;
        margin: 0 !important;
        background: transparent;
        border: 0;
        display: block;
    }

    .titlereq:hover {
        outline: none;
    }


    .kateg {
        /* border-left: ridge; */
        position: absolute;
        top: 38px;
        left: 132px;
        font-size: 15px;
        color: #ffffffd1;
        margin: 0 !important;
    }

    .modal-title {
        line-height: 1.1;
    }

    .judul-tiket {
        font-size: 15px;
        font-weight: bold;
    }

    .subjudul {
        font-size: 12px;
    }

    .pilih {
        display: flex;
        justify-content: space-around;
    }

    .pilih>.btn-pilih {
        background: transparent;
        color: #cc1a0b;
        border: 1px solid #cc1a0b;
        border-radius: 8px;
        padding: 0;
        width: 30px;
        height: 30px;
    }

    .pilih>.btn-pilih.pilih-ff {
        color: #626060 !important;
        border: 1px solid #626060 !important;
    }

    .hr-pilih {
        width: 80%;
        left: 14px;
        position: absolute;
        margin: 12px 5px 0 0;
        border: 1px solid #00000029;
    }

    .media>img {
        width: 50px;
        height: 50px;
        border-radius: 26px;
    }

    .media-body {
        line-height: 1;
    }

    .media-body>p {
        font-size: 12px;
    }

    #reads {
        max-height: 200px;
        overflow-y: scroll;
    }

    .btnx {
        position: absolute;
        bottom: 128px;
        right: 38px;
    }

    .btnx .title {
        position: absolute;
        top: -70px;
        left: 50%;
        transform: translate(-50%, 15%);
        width: auto;
        background: #fff;
        padding: 5px 10px;
        border-radius: 7px;
        transition: 0.5s;
        opacity: 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        visibility: hidden;
    }

    .btnx:hover .title {
        opacity: 1;
        visibility: visible;
        transform: translate(-50%, 50%);
    }

    .btnx .title::before {
        content: "";
        position: absolute;
        width: 12px;
        height: 12px;
        background-color: #fff;
        bottom: -8px;
        left: 48%;
        transform: rotate(45deg) translateX(-50%);
        border-radius: 2px;
    }

    .btdwn {
        position: absolute;
        bottom: 145px;
        left: 4%;
    }

    .btdwn .title {
        position: absolute;
        top: -70px;
        left: 50%;
        transform: translate(-50%, 15%);
        width: auto;
        background: #fff;
        padding: 5px 10px;
        border-radius: 7px;
        transition: 0.5s;
        opacity: 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        visibility: hidden;
    }

    .btdwn:hover .title {
        opacity: 1;
        visibility: visible;
        transform: translate(-50%, 50%);
    }

    .btdwn .title::before {
        content: "";
        position: absolute;
        width: 12px;
        height: 12px;
        background-color: #fff;
        bottom: -8px;
        left: 48%;
        transform: rotate(45deg) translateX(-50%);
        border-radius: 2px;
    }

    .btkat {
        position: absolute;
        bottom: 145px;
        right: 21px;
    }

    .btkat .title {
        position: absolute;
        top: -70px;
        left: 50%;
        transform: translate(-50%, 15%);
        width: auto;
        background: #fff;
        padding: 5px 10px;
        border-radius: 7px;
        transition: 0.5s;
        opacity: 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        visibility: hidden;
    }

    .btkat:hover .title {
        opacity: 1;
        visibility: visible;
        transform: translate(-50%, 50%);
    }

    .btkat .title::before {
        content: "";
        position: absolute;
        width: 12px;
        height: 12px;
        background-color: #fff;
        bottom: -8px;
        left: 48%;
        transform: rotate(45deg) translateX(-50%);
        border-radius: 2px;
    }

    .btn-add {
        background: linear-gradient(324deg, #dd0000, #d12323);
        color: white;
        border-radius: 12px;
        border: 0;
    }

    .btn-dwn {
        background: linear-gradient(324deg, #5500dd, #0867da);
        color: white;
        border-radius: 12px;
        border: 0;
    }

    .ref {
        background: #cc1a0b;
        color: white;
        border-radius: 12px;
        left: 277%;
        position: relative;
    }

    .btnp {
        position: absolute;
        bottom: 79px;
        right: 14px;
    }

    .btsts {
        position: absolute;
        bottom: 43px;
        right: 14px;

    }

    .sts {
        background: linear-gradient(324deg, #dd0000, #f7d7d7);
        color: white;
        border-radius: 50%;
        border: 0;
    }

    .btn-cepmek {
        position: absolute;
        bottom: 20px;
        color: white;
        border-radius: 12px;
    }

    .cepmek1 {
        right: 16px;
    }

    .cepmek2 {
        right: 120px;
        background: #495057;
    }

    .ubsts {
        white-space: nowrap;
        font-size: 12px;
    }

    .imgc {
        width: 40px;
        height: 40px;
        position: absolute;
        left: 12px;
        bottom: 40px;

    }

    .err {
        color: red;
        font-weight: bold;
        font-size: 10px;
        white-space: nowrap;

    }

    .br50 {
        border-radius: 50%;
    }

    .swal-confirm {
        width: 50%;
    }

    .swal2-popup {
        width: 32em !important;
    }

    .swal2-styled.swal2-confirm {
        background-color: green !important;
    }

    .swal2-styled.swal2-deny {
        background-color: red !important;
    }

    .swal2-html-container {
        text-align: center !important;
    }

    .swal2-styled.swal2-cancel {
        border: 0;
        border-radius: 0.25em;
        background: initial;
        background-color: #202122;
        color: #fff;
        font-size: 1em;
    }

    .cps {
        position: absolute;
        left: 65%;
        font-size: 15px;
        top: 45px;
        z-index: 9999;
    }

    @media  only screen and (max-width: 768px) {
        .cps {
            left: 38%;
            font-size: 15px;
            top: 39px;
        }

        .spket {
            position: absolute;
            left: -26px;
            top: 47px;
        }
    }

    .pkat {
        margin: 0;
        font-size: 15px;
    }

    .prs {
        position: absolute;
        bottom: 58px;
        font-weight: bold;
        right: 10px;
        color: white;
        border-radius: 12px;
    }

    .f-17 {
        font-size: 17px;
    }

    .spket {
        position: absolute;
        left: -26px;
        top: 47px;
    }

    #keterangan {
        overflow-wrap: break-word;
        height: auto;
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .btkateg,
    .btnkat {
        background: white;
        font-weight: bold;
        font-size: 15px;
        border-radius: 8px;
        color: red;
        border: 1px solid red;
    }

    .btkateg.btkategcek,
    .btkategcek {
        color: green;
        border: 1px solid green;
    }

    .btkateg2 {
        position: absolute;
        background: red;
        right: 6px;
        top: 72px;
        border-radius: 20%;
        font-size: 15px;
        color: white;
    }

    .btkateg3 {
        position: absolute;
        background: red;
        right: 6px;
        top: 126px;
        border-radius: 20%;
        font-size: 15px;
        color: white;
    }

    .btkateg4 {
        position: absolute;
        background: green;
        right: 4px;
        top: 179px;
        border-radius: 20%;
        font-size: 15px;
        color: white;
    }

    .kategoriadd {
        position: absolute;
        background: green;
        right: 10px;
        bottom: 10px;
        border-radius: 12px;
        font-size: 15px;
        color: white;
    }

    .kategoriadd:hover {
        color: white
    }

    .srlkat {
        overflow-x: hidden;
        overflow-y: scroll;
        height: 300px;
    }

    .test {
        position: absolute;
        right: 3px;
        top: 64px;
        background: red;
        border-radius: 12px;
    }

    .mdlh {
        border: 0;
        padding-bottom: 0;
    }

    .brigez {
        height: 300px;
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .mbod {
        height: 400px;
    }

    .fon {
        font-size: 14px;
        font-weight: bold;
    }



    /* backend */
    .seltuj {
        border: 1px solid red;
        border-radius: 12px;
    }

    .ftt {
        border-radius: 10px;
        border: 1px solid red;
        width: 35px;
        height: 35px;
    }

    .ftpl {
        position: absolute;
        background: red;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        font-weight: bold;
        color: white;
        border-radius: 12px;
        white-space: nowrap;
    }

    .select2 {
        width: 100% !important;
    }
</style><?php /**PATH G:\ChampApplication\xampp\htdocs\champs-mobile\resources\views/backend/css.blade.php ENDPATH**/ ?>