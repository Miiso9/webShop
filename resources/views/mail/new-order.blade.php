<h1>
    New order has been created
</h1>
<table>
    <tr>
        <th>ID Narudžbe</th>
        <td>
            <a href="{{ $forAdmin ? env('BACKEND_URL').'/app/orders/'.$order->id : route('order.view', $order, true) }}">
                {{$order->id}}
            </a>
        </td>
    </tr>
    <tr>
        <th>Stanje Narudžbe</th>
        <td>{{ $order->status }}</td>
    </tr>
    <tr>
        <th>Cijena Narudžba</th>
        <td>${{$order->total_price}}</td>
    </tr>
    <tr>
        <th>Datum Narudžbe</th>
        <td>${{$order->created_at}}</td>
    </tr>
</table>
<table>
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    @foreach($order->items as $item)
        <tr>
            <td>
                <img src="{{$item->product->image}}" style="width: 100px">
            </td>
            <td>{{$item->product->title}}</td>
            <td>${{$item->unit_price * $item->quantity}}</td>
            <td>{{$item->quantity}}</td>
        </tr>
    @endforeach
</table>
