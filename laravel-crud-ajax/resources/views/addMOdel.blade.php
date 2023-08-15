<!-- Modal -->
<div class="modal fade" id="addCountryModal" tabindex="-1" role="dialog" aria-labelledby="addCountryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCountryModalLabel">Add New Country</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route("add.country") }}" method="POST" id="add-country-form">
                @csrf
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" placeholder="Enter country" name="country_name">
                    <span class="text-danger error-text country_name_error"></span>
                </div>
                <div class="form-group">
                    <label for="countryCapital">Capital</label>
                    <input type="text" class="form-control" id="countryCapital" placeholder="Enter country capital" name="capital_city">
                    <span class="text-danger error-text capital_city_error"></span>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>