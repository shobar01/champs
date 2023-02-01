<div class="modal fade" id="tglhist" tabindex="-1" aria-labelledby="tglhistLabel" aria-hidden="true"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-3 text-center">
                <input type="hidden" id="tgghist" value="<?php echo e(date('Y-m-d')); ?>">
                <i class="fa fa-times-circle fa-2x closemod modtglhist" onclick="closetgl()"></i>
                <div id="bulanutama">
                    <div class="calendarYearMonth center" style="display:flex;justify-content:space-around;">
                        <p class="left calBtn" onclick="prevMonth()"> Prev </p>
                        <p id="yearMonth" class="mb-0" style="font-weight:bold;padding-top: 20px;"> Jan 2021 </p>
                        <p class="right calBtn" onclick="nextMonth()"> Next </p>
                    </div>
                    <div>
                        <ol class="calendarList1" style="font-weight: bold;color:black">
                            <li class="day-name">Sat</li>
                            <li class="day-name">Sun</li>
                            <li class="day-name">Mon</li>
                            <li class="day-name">Tue</li>
                            <li class="day-name">Wed</li>
                            <li class="day-name">Thu</li>
                            <li class="day-name">Fri</li>
                        </ol>
                        <ol class="calendarList2" id="calendarList">

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/backend/modal/tglhist.blade.php ENDPATH**/ ?>