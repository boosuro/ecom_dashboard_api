<div class='btn-group btn-group-sm'>
  @if (request('model_name') == "products")
  <a data-toggle="tooltip" data-placement="bottom" title="View Details" href="#"
    onclick="customCrud({url:'{{ route(request('model_name').'.show', $variantgroup->id) }}',holder:'{{ ucfirst(request('model_name')) }}',action:'Show', this_ : this});"
    class='btn btn-link'>
    <i class="fa fa-eye"></i>
  </a>
  @endif
  <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="#"
    onclick="customCrud({url:'{{ route(request('model_name').'.edit', $variantgroup->id) }}',holder:'{{ ucfirst(request('model_name')) }}',action:'Edit', this_ : this});"
    class='btn btn-link'>
    <i class="fa fa-edit"></i>
  </a>

  <button type="submit" class="btn btn-link text-danger" onclick="comfirmDelete({{ $variantgroup->id }});"
    title="{{trans('lang.delete')}}"><i class="fa fa-trash"></i></button>

  {!! Form::open(['route' => [request('model_name').'.destroy', $variantgroup->id], 'method' => 'delete','id' => $variantgroup->id]) !!}
  {!! Form::close() !!}
</div>