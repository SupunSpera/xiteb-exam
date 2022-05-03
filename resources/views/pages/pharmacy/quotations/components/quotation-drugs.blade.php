<div>
    <table class="table table-light">
        <thead class="p-2">
            <tr>
                <th>Drug</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotation_drugs as $drug )
            <tr>
                <td>{{ $drug->drug->name }}</td>
                <td>{{ $drug->quantity  }} *{{ $drug->drug->price  }} </td>
                <td>{{ $drug->quantity * $drug->drug->price  }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <h6>Total = {{ $total }}</h6>
</div>
