<!-- start schedule modal -->
<div class="modal fade" id="modDoctorSched" tabindex="-1" aria-labelledby="modDoctorSchedLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modDoctorSchedLabel">Set Doctor's Schedule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <input type="hidden" id="avail_dates" name="avail_dates">

        <pre></pre>


        <!-- input group -->
        <div class="input-group mb-3">
          <!-- sun start time -->
          <span class="input-group-text bg-primary text-white w-25">SUNDAY</span>
          <label class="input-group-text" for="sun_start_time">Start Time</label>
          <select class="form-select" id="sun_start_time">
            <option selected></option>
            <optgroup label="AM">                    
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
          <!-- sun end time -->
          <label class="input-group-text" for="sun_end_time">End Time</label>
          <select class="form-select" id="sun_end_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
        </div>
        <!-- end input group -->



        <!-- input group -->
        <div class="input-group mb-3">
          <!-- mon start time -->
          <span class="input-group-text bg-primary text-white w-25">MONDAY</span>
          <label class="input-group-text" for="mon_start_time">Start Time</label>
          <select class="form-select" id="mon_start_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
          <!-- mon end time -->
          <label class="input-group-text" for="mon_end_time">End Time</label>
          <select class="form-select" id="mon_end_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
        </div>
        <!-- end input group -->



        <!-- input group -->
        <div class="input-group mb-3">
          <!-- tues start time -->
          <span class="input-group-text bg-primary text-white w-25">TUESDAY</span>
          <label class="input-group-text" for="tues_start_time">Start Time</label>
          <select class="form-select" id="tues_start_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
          <!-- tues end time -->
          <label class="input-group-text" for="tues_end_time">End Time</label>
          <select class="form-select" id="tues_end_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
        </div>
        <!-- end input group -->



        <!-- input group -->
        <div class="input-group mb-3">
          <!-- wed start time -->
          <span class="input-group-text bg-primary text-white w-25">WEDNESDAY</span>
          <label class="input-group-text" for="wed_start_time">Start Time</label>
          <select class="form-select" id="wed_start_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
          <!-- wed end time -->
          <label class="input-group-text" for="wed_end_time">End Time</label>
          <select class="form-select" id="wed_end_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
        </div>
        <!-- end input group -->



        <!-- input group -->
        <div class="input-group mb-3">
          <!-- thurs start time -->
          <span class="input-group-text bg-primary text-white w-25">THURSDAY</span>
          <label class="input-group-text" for="thurs_start_time">Start Time</label>
          <select class="form-select" id="thurs_start_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
          <!-- thurs end time -->
          <label class="input-group-text" for="thurs_end_time">End Time</label>
          <select class="form-select" id="thurs_end_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
        </div>
        <!-- end input group -->



        <!-- input group -->
        <div class="input-group mb-3">
          <!-- fri start time -->
          <span class="input-group-text bg-primary text-white w-25">FRIDAY</span>
          <label class="input-group-text" for="fri_start_time">Start Time</label>
          <select class="form-select" id="fri_start_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
          <!-- fri end time -->
          <label class="input-group-text" for="fri_end_time">End Time</label>
          <select class="form-select" id="fri_end_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
        </div>
        <!-- end input group -->



        <!-- input group -->
        <div class="input-group mb-3">
          <!-- sat start time -->
          <span class="input-group-text bg-primary text-white w-25">SATURDAY</span>
          <label class="input-group-text" for="sat_start_time">Start Time</label>
          <select class="form-select" id="sat_start_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
          <!-- sat end time -->
          <label class="input-group-text" for="sat_end_time">End Time</label>
          <select class="form-select" id="sat_end_time">
            <option selected></option>
            <optgroup label="AM">
              <option value="9:00 AM">9:00 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="11:00 AM">11:00 AM</option>
            </optgroup>
            <optgroup label="PM">
              <option value="12:00 PM">12:00 PM</option>
              <option value="1:00 PM">1:00 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="4:00 PM">4:00 PM</option>
              <option value="5:00 PM">5:00 PM</option>
            </optgroup>
          </select>
        </div>
        <!-- end input group -->



      </div>
      <div class="modal-footer">
        <button id="btnGoBack" type="button" class="btn btn-warning" data-bs-dismiss="modal">Go Back</button>
        <button id="btnSaveSched" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end schedule modal -->