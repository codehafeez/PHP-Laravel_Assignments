<div class="col-md-6">
    <div class="input-group mb-3">
        <img src="{{$contact->image}}" alt="" width="200" height="200">
    </div>
</div>

<div class="col-md-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
        </div>
        <input type="text" class="form-control" value="{{$contact->name}}" name="name" disabled>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
        </div>
        <input type="text" class="form-control" value="{{$contact->phone}}" name="phone" disabled>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
        </div>
        <input type="text" class="form-control" value="{{$contact->email}}" name="email" disabled>
    </div>    
</div>    