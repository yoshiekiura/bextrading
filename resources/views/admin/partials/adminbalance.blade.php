<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="100" class="panel widget">
            <div class="panel-body bg-primary">
                <div class="row row-table row-flush">
                    <div class="col-xs-12">
                        <p class="mb0">${{money_format('%i', $balance)}}<em class="fa fa-chart-line">
                        </em>
                    </p>
                    <h4 class="m0">Cash Balance</h4>
                    <span class="m-t-10">
                      <i class="fa fa-money"></i>
                      Cash Balance
                  </span>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="col-lg-3 col-sm-6">
    <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="500" class="panel widget">
        <div class="panel-body bg-warning">
            <div class="row row-table row-flush">
                <div class="col-xs-12">
                    <p class="mb0">{{$equity}}<em class="">USD</em></p>
                    <h4 class="m0">On Market</h4>
                    <span class="f-left m-t-10">
                     <i class="fa fa-bar-chart"> </i>Purchase Volume
                 </span>
             </div>
         </div>
     </div>
 </div>
</div>
<div class="col-lg-3 col-sm-6">
    <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="1000" class="panel widget">
        <div class="panel-body bg-danger">
            <div class="row row-table row-flush">
                <div class="col-xs-12">
                    <p class="mb0">{{$brokergu}}<em class="">USD</em></p>
                    <h4 class="m0">Broker Guaranty</h4>
                    <span class="m-t-10">
                       <i class="text-c-green f-16 fa fa-credit-card-alt"></i> Crédito de Broker
                   </span>
               </div>
           </div>
       </div>
   </div>
</div>
<div class="col-lg-3 col-sm-6">
    <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="1500" class="panel widget">
        <div class="panel-body bg-success">
            <div class="row row-table row-flush">
                <div class="col-xs-12">
                    <p class="mb0">{{$deposits}}<em class="">USD</em></p>
                    <h4 class="m0">Account Funding</h4>
                    <span class="f-left m-t-10">
                     <i class="fa fa-refresh fa-spin fa-fw"></i> Total Deposits
                 </span>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
