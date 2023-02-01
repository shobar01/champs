<style>
    body {
        background: red;
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

    .rd {
        color: red;
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
        vertical-align: middle;
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
        border: 5px solid darkred;
        border-radius: 50%;
        padding: 8px;
        font-weight: bold;
        position: relative;
        width: 45px;
        height: 45px;
    }

    .lx {
        position: absolute;
        top: -13px;
        right: -12px;
        background: #0cff00;
        color: black;
        padding: 0px 7px;
        border-radius: 8px;
        border: 1px solid darkred;
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
        background: linear-gradient(3.2941rad, red, #6b0505);
        transform: translate(-50%, 0);
        color: white !important;
        font-weight: bold;
        border-radius: 16px;
        padding: 0;
        border: 0;
        width: 120px;
        height: 35px;
    }

    @keyframes btncs {
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

    @keyframes btncx {
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
        padding-bottom: 200px;
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
        border: 1px solid red;
        border-radius: 12px;
    }

    hr {
        margin: 5px 5px 0 0;
        border: 1px solid #ff00007a;
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
        background: red;
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
        border: 2px solid red;
        font-weight: bold;
        border-radius: 20px;
        font-size: 11px;
    }

    .main-card {
        position: fixed;
        height: 100%;
        width: 100%;
        border-radius: 20px 20px 0 0;
    }

    .head {
        position: fixed;
        top: 0;
        left: 50%;
        transform: translate(-50%, 0);
    }

    .head-img {
        width: 60px;
    }

    .tbres {
        height: 250px;
        overflow-x: hidden;
        overflow-y: scroll;
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
        padding-bottom: 4rem !important;
        flex: inherit;
    }

    .closemod {
        color: red;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 999;
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
        background: red;
        color: white !important;
        font-weight: bold;
        border-radius: 20px;
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
        background: linear-gradient(3.2941rad, red, #6b0505);
        color: white;
    }

    .btn-approve.active {
        background: linear-gradient(3.2941rad, green, #073504);
        color: white;
    }

    .btn-reject {
        background: white;
        color: red;
        border: 1px solid red;
        right: 80px;
    }

    .btn-approve {
        background: white;
        color: green;
        border: 1px solid green;
    }

    /* font awesome */

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
        color: red;
        font-size: 20px;
    }

    .fa-clock {
        color: #ff00007a;
    }

    @media only screen and (max-width: 600px) {
        .foot-img {
            width: 400px;
        }
    }

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

    /* :not(:required) hides these rules from IE9 and below */
    .loading:not(:required) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading:not(:required):after {
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

    @keyframes spinner {
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

    /* :not(:required) hides these rules from IE9 and below */
    .loading2:not(:required) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading2:not(:required):after {
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
</style>