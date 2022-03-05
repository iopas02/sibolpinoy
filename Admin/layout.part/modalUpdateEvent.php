<div class="modal" id="modalUpdateEvento"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update my Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form name="formEventUpdate" id="formEventUpdate" action="UpdateEvent.php" class="form-horizontal" method="POST">
        <input type="hidden" class="form-control" name="idEvento" id="idEvento">
        <div class="form-group">
            <label for="event" class="col-sm-12 control-label">Name of the event</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="event" id="event" placeholder="Name of the event" required/>
            </div>
        </div>
        <div class="form-group">
            <label for="start_date" class="col-sm-12 control-label">Start date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Start date">
            </div>
        </div>
        <div class="form-group">
            <label for="final_date" class="col-sm-12 control-label">Final date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="final_date" id="final_date" placeholder="Final date">
            </div>
        </div>

        <div class="col-md-12 active">
    
            <input type="radio" name="color_event" id="orangeUpd" value="#FF5722" checked>
            <label for="orangeUpd" class="circle" style="background-color: #FF5722;"> </label>

            <input type="radio" name="color_event" id="amberUpd" value="#FFC107">  
            <label for="amberUpd" class="circle" style="background-color: #FFC107;"> </label>

            <input type="radio" name="color_event" id="limeUpd" value="#8BC34A">  
            <label for="limeUpd" class="circle" style="background-color: #8BC34A;"> </label>

            <input type="radio" name="color_event" id="tealUpd" value="#009688">  
            <label for="tealUpd" class="circle" style="background-color: #009688;"> </label>

            <input type="radio" name="color_event" id="blueUpd" value="#2196F3">  
            <label for="blueUpd" class="circle" style="background-color: #2196F3;"> </label>

            <input type="radio" name="color_event" id="indigoUpd" value="#9c27b0">  
            <label for="indigoUpd" class="circle" style="background-color: #9c27b0;"> </label>

        </div>

        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save Changes to my Event</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Leave</button>
        </div>
    </form>
      
    </div>
  </div>
</div>