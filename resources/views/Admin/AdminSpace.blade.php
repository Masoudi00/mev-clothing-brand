@extends('Master_page')
@section('title','espace admin')
@section('content')
<style>
  button{
  margin-right:5px ;
  margin-left:5px ;

  }
</style>


<h1 class="text-center text-white">Products:</h1>


<section class="intro">
    <div class="bg-image h-100" >
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card bg-dark shadow-2-strong">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-dark table-borderless mb-0">
              <thead>      
        <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>
        <th scope="col">ImageFront</th>
        <th scope="col">ImageBack</th>

        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

@foreach ($products as $item)
<tr>
    <td>{{$item['name']  }}</td>
    <td>{{$item['price']  }}DH</td>
    <td><img src="{{ asset('imgs/'.$item['image']) }}" alt="Image " class="img-fluid" width="100"></td>
    <td><img src="{{ asset('imgs/'.$item['image2']) }}" alt="Image " class="img-fluid" width="100"></td>

    <td>
        <div style="display: flex; flex-direction: column;">
            <a class="btn btn-warning" href="product/edit/{{ $item->id }}">Modifier</a>
            <br>
            <form id="delete-form-{{ $item->id }}" action="{{ route('destroy', ['id' => $item->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $item->id }}">
                    Delete
                </button>
            
                <!-- Modal de confirmation -->
                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Confirmation de suppression</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                   <section class="text-dark fw-bold">Are You Sure You Want To Delete This Product ?</section> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            
        </div>  

    </td>
</tr>

@endforeach


    </tbody>
  </table>
  
  </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section> 
<div class="d-flex justify-content-center pt-5">
    <div>
      {{ $products->links('vendor\pagination\custom') }}
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
