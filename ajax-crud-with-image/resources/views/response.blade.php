<table class="table table-dark" id="table">
    <thead>
        <tr>
            <th>SN</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    @php
    $i=1;
    @endphp
    <tbody id="success">
      @foreach ($contacts as $contact)
          
      <tr>
        <td>{{$i++}}</td>
        <td><img src="{{$contact->image}}" alt="" height="50" width="50"></td>
        <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->phone}}</td>
        <td>
                <button onclick="singleview(this.value)" value="{{$contact->id}}" id="v{{$contact->id}}" class="btn btn-dark" data-toggle="modal" data-target="#viewModal"><i class="fa fa-vcard"></i></button>
                <button onclick="edit(this.value)" value="{{$contact->id}}" id="e.{{$contact->id}}" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-edit"></i></button>
                <button onclick="return confirm('are you sure?')"  value="{{$contact->id}}" id="delete" class="btn btn-dark" ><i class="fa fa-trash"></i></button>
        </td>
        @endforeach
        </tr>
    </tbody>
</table>
{!! $contacts->render() !!}