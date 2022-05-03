@foreach ($quotation->quotationDrugs as $drug )
<h6>{{ $drug->drug->name }}</h6>
@endforeach
