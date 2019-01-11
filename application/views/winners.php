<div class="container-fluid winners-container">
  <div class="row justify-content-center ">
    <h1 class="col-xs-12 font-weight-light text-light py-4 mt-2">
      NEU Fair 2019 Event Winners
    </h1>

  </div>

  <div class="row wrap justify-content-center">
    <div class="card shadow col-sm-4 px-0">
      <?php foreach($winners as $event_winners): ?>
        <div class="px-3 pt-3">
          <p>
            <?= $event_winners[0]->event_name; ?>
          </p>
        <?php $ctr = 0; foreach($event_winners as $winner):?>
          <p>
            <b><?= $place[$ctr];?> Place - </b> <?= $winner->college_name?>
          </p>
        <?php $ctr++; endforeach; ?>
      </div>
      <div class="line fill bg-dark" style="height:.1vh;"></div>
      <?php endforeach;?>



    </div>

  </div>
</div>
