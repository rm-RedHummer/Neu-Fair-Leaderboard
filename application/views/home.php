<div class="container-fluid px-5 home-container">
  <div class="row justify-content-center ">
    <img src=""/>
    <h1 class="col-xs-12 font-weight-light text-light py-4 mt-2">
      NEU Fair 2019 Leaderboard
    </h1>
  </div>
  <div class="row px-5">
    <?php $ctr = 1; foreach($colleges as $college): ?>
    <div class="col-md-6 offset-md-3 w-100 py-2 px-2">
      <div class="card shadow w-100">
        <div class="card-body w-100 p-0">
          <div class="d-inline-block p-3 my-auto mx-2">
            <?php echo $ctr?>
          </div>
          <p class="d-inline-block py-3 m-0">
            <?php echo $college->college_name;?>
          </p>
          <div class="w-25 d-inline-block float-right">
            <h4 class="d-block m-0 mt-1 p-2 text-center "><?php echo $college->sum;?></h4>
          </div>

        </div>
      </div>
    </div>
    <?php  $ctr=$ctr+1;endforeach; ?>
  </div>
  <button type="button" class="btn btn-light add-btn d-block shadow" data-toggle="modal" data-target="#add-modal"><i class="fas fa-plus"></i></button>
  <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add-modal-title">Set winner to an event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row">
              <label for="event-select" class="col-sm-3 col-form-label text-center">Event</label>
              <div class="col-sm-9">
                <select class="form-control" id="event-select">
                  <?php foreach($events as $event):?>
                    <option class="<?php echo $event->event_finished; ?>" data-id="<?php echo $event->event_id;?>"><?php echo $event->event_name;?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="first-select" class="col-sm-3 col-form-label text-center">1st Place</label>
              <div class="col-sm-9">
                <select class="form-control" id="first-select">
                  <?php foreach($college_names as $college_name):?>
                    <option data-id="<?php echo $college_name->college_id;?>"><?php echo $college_name->college_name;?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="second-select" class="col-sm-3 col-form-label text-center">2nd Place</label>
              <div class="col-sm-9">
                <select class="form-control" id="second-select">
                  <?php foreach($college_names as $college_name):?>
                    <option data-id="<?php echo $college_name->college_id;?>"><?php echo $college_name->college_name;?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="third-select" class="col-sm-3 col-form-label text-center">3rd Place</label>
              <div class="col-sm-9">
                <select class="form-control" id="third-select">
                  <?php foreach($college_names as $college_name):?>
                    <option data-id="<?php echo $college_name->college_id;?>"><?php echo $college_name->college_name;?></option>
                  <?php endforeach?>
                </select>
              </div>
            </div>
            <div class="px-3 form-group">
              <label class="col-sm-3 col-form-label p-0 pb-2"><Strong>Participants</Strong></label>
              <div class="row ">
                <?php foreach($college_names as $college_name):?>
                <div class="col-sm-6">
                  <input type="checkbox" name="participant-checkbox" aria-label="Checkbox for following text input" data-id="<?php echo $college_name->college_id;?>" checked><?php echo $college_name->college_name;?></input>
                </div>
                <?php endforeach ?>
              </div>


            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary save-btn">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="alert alert-success alert-dismissible fade fixed-bottom mx-3" id="success-alert" role="alert">
    Success adding winners to event!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
