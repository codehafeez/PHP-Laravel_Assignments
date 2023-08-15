@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Clients</button>
                    <div class="pull-right">
                      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-play"></i></button>
                    </div>
                  </div>

                <div class="card-body">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <h3>{{Session::get('msg')}}</h3>
                          

                        {{-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Insert</button> --}}
                        <div id="showAllDataHere">
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
                      </div>
                    
                        {{--insert  modal  --}}
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form id="form-submit" action="" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="title" name="name" placeholder="Enter name" required />
                                  </div>
                        
                                  <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
                                  </div>
                    
                                  <div class="form-group">
                                      <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter phone" required />
                                  </div>
                                
                                <input id="Imag" type="file" accept="image/*" name="image" />
                                <div id="preview"><img src="" /></div><br>
                                <input class="btn btn-success" type="submit" value="Upload">
                                <input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
                              </form>
                          </div>
                          <div class="modal-footer showError">
                              
                          
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    {{--  //viewModal  --}}
                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-vcard"></i> View Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <div class="row" id="view">
                              
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            {{-- <button type="submit" class="btn btn-dark" id="addbutton">Save</button> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!--Edit Modal -->
                    {{-- <input type="hidden" name="_token" id="csrftoken2" value="{{ csrf_token() }}"> --}}
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{url('client/2')}}" method="post" id="edit" enctype="multipart/form-data">
                              
                    
                              
                            </form>
                          </div>
                          <div class="modal-footer showError">
                             
                          
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
