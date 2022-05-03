
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h6>Hi {{ $quotation->user->name }}</h6>
        This is the Quotation for your prescription
        <div class="card">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>Drug</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotation->quotationDrugs as $drug )
                    <tr>
                        <td>{{ $drug->drug->name }}</td>
                        <td>{{ $drug->quantity  }} *{{ $drug->drug->price  }} </td>
                        <td>{{ $drug->quantity * $drug->drug->price  }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h6>Total = Rs.{{ $quotation->total }}</h6>
        </div>
    </div>
</body>
</html>

