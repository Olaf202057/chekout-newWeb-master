<div class="modal fade" id="help-modal" tabindex="-1" role="dialog" aria-labelledby="help-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width:1000px">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="help-modal-label">Concierge</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="help-attachment-body-content" style="padding:0px!important;">
          <form id="help-form" class="form-horizontal" method="POST" action="">
            <div class="card text-white bg-dark mb-0" style="border:none!important; background-color:white!important;">
                <div class="help_top" style="background-image:url('{{ asset('img/help.jfif') }}');background-size:cover;
                background-repeat:   no-repeat;
                background-position: center center;">
                    <h1>Having trouble?</h1>
                    <h2>We are here to help</h2>
                    <div class="help_search">
                        <input type="text" placeholder="Describe your issue" value="" />
                        <Button type="button">SEARCH</Button>
                    </div>
                </div>
                <div class="help_body">
                    <h1>All Topics</h1>
                    <div class="help_topic_item">
                        <div class="help_item_first">
                            <i class="fas fa-question"></i>
                            <span>Help with an order</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="help_topic_item">
                        <div class="help_item_first">
                            <i class="fas fa-credit-card"></i>
                            <span>Account and payment options</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="help_topic_item">
                        <div class="help_item_first">
                            <i class="fas fa-info-circle"></i>
                            <span>Guide to Chekout</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="help_topic_item">
                        <div class="help_item_first">
                            <i class="fas fa-coins"></i>
                            <span>Chekout rewards</span>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </div>

                </div>

            </div>
          </form>
        </div>
      </div>
    </div>
</div>
