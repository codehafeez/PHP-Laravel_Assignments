        <div class="input-group mb-3">
            <img src="{{$contact->image}}" alt="" width="50" height="50">
        </div>
        @method('PUT')
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="{{$contact->name}}" name="name">
            <input type="hidden" id="update" class="form-control" value="{{$contact->id}}" name="id">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
            </div>
            <input type="text" class="form-control" value="{{$contact->phone}}" name="phone">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="text" class="form-control" value="{{$contact->email}}" name="email">
        </div>    
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-image"></i></span>
            </div>
            <input type="file" class="form-control"  name="image">
        </div>
        <input class="btn btn-success" type="submit" value="Update">
