<form class="form-inline" action="{{ route('carts.store') }}" method="post">
@csrf
<input type="hidden" name="product_id" value="{{$product->id}}">
<button type="submit" class="gradent btn btn-outline-secondary">Add to Cart</button>
</form>