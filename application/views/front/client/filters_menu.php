<div class="row">
    <div class="col-sm-3">
        <div class="usr-avatar">
            <div class="usr-img"><img src="<?php echo base_url() ?>application/assets/front/images/client-img-rounded.png" alt=""></div>
            <div class="welcome">
                <h3>Welcome <span>Emily Madison</span></h3>
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="col-sm-3 activity-summary">
            <a href="<?php echo base_url() ?>client/total_jobs" class="link-wrap">
                <h4 class="total-activity"><?php echo $total_jobs;?></h4>
                <p class="activity-desc">Total posted jobs</p>
            </a>
        </div>
        <div class="col-sm-3 activity-summary">
            <a href="<?php echo base_url() ?>client/completed_jobs" class="link-wrap">
                <h4 class="total-activity"><?php echo $completed_jobs;?></h4>
                <p class="activity-desc">Completed jobs</p>
            </a>
        </div>
        <div class="col-sm-3 activity-summary">
            <a href="<?php echo base_url() ?>client/inprogress_jobs" class="link-wrap">
                <h4 class="total-activity"><?php echo $inprogress_jobs;?></h4>
                <p class="activity-desc">Inprogress jobs</p>
            </a>
        </div>
        <div class="col-sm-3 activity-summary">
            <a href="<?php echo base_url() ?>client/waiting_jobs" class="link-wrap">
                <h4 class="total-activity"><?php echo $waiting_jobs;?></h4>
                <p class="activity-desc">Waiting jobs</p>
            </a>
        </div>
    </div>
</div>