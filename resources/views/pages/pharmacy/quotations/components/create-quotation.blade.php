<div>
    <form wire:submit.prevent="submit" autocomplete="off">
        <div class="row my-4">
            <div class="col-lg-5">
                <div class="card" style="position:sticky;height:50vh    ;overflow:scroll">
                    <div class="card-body">
                        <h5 class="card-title">Images</h5>
                        <div style="height:50vh;overflow:scroll">
                            @foreach ($prescription->prescriptionImages as $image)
                            <li>
                               <img class="my-2" src="{{ asset('storage/media/'.$image->image->name) }}" alt="" style="max-width:200px;">
                            </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                @if ($prescription->quotation)
                <livewire:quotation-drug-data-table :prescription="$prescription" />
                @else
                <div class="form-group" wire:ignore>
                    <label for="drugs">Select Drug</label>
                    <select id="drugs" class="form-control" name="">
                        <option value=""></option>
                        @foreach ($drugs as $drug )
                        <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="quantity">Quantity</label>
                    <input id="quantity" class="form-control" type="number" wire:model="quantity">
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @endif

            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary" id="sendQuotation">Send Quotation</button>
        </div>
    </div>
</div>
@push('scripts')
<script>
$("#drugs").select2({
     placeholder: "Select Drug",
});
 $('#drugs').on('change', function (e) {
        var drug_id = $('#drugs').select2("val");
        @this.set('selected_drug', drug_id);
});
$("#sendQuotation").click(function(){
  @this.emit('sendQuotation');
});
</script>
@endpush
@push('styles')
<style>
    .select2-selection__rendered {
        line-height: 100%;
        height: 30px;
    }

    .select2-selection--single {
        height: 40px !important;
    }

</style>

@endpush
