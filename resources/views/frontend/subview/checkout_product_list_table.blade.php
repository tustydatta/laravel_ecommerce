<h1 class="text-2xl text-center mt-8">Checkout Item List</h1>
<table class="border-collapse w-full text-center"> 
    <thead>
        <tr class="border-b border-white text-xl text-orange-400">
            <th class="py-4 ">Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php($i = 1)
        @php($count = 0)
        @foreach ($items as $checkout_data)
            @php($count= $count + $checkout_data->price)
            <tr class="border-b border-white">
                <td class="py-4">{{ $i++ }}</td>
                <td class="py-4">{{ $checkout_data->name }}</td>
                <td>
                    <img src="{{ asset('images/items/'.$checkout_data->image) }}" alt="" class="h-16 w-20 mx-auto">
                </td>
                <td>{{ $checkout_data->price }} tk/-</td>
                <td>
                    <input type="number" id="quantity" 
                        class="w-20 rounded bg-transparent h-8 border border-white text-white font-semibold text-center" value="1"
                        onchange="QuantityWisePriceChange(this, {{ $checkout_data->price }}, {{ $checkout_data->id }})">
                </td>
                <td id="total_price_{{ $checkout_data->id }}">
                    {{ $checkout_data->price }} tk/-
                </td>
                
            </tr>
        @endforeach
        <tr class="border-b border-white" >
            <td colspan="6" class="pr-14 py-4 text-xl font-bold text-right">
                Grand total: 
                <span id="grandTotal">{{ $count }}</span>
                    tk/-
            </td>
        </tr>
    </tbody>
</table>