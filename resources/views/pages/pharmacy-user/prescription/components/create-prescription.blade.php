<div>
    <form wire:submit.prevent="submit" autocomplete="off" enctype="multipart/form-data">
        <div class="row my-4">
            <div class="col-lg-12 my-4">
                <div class="form-group">
                    <label for="note">Note<sup class="text-danger">*</sup></label>
                    <input id="note" class="form-control @error('note') is-invalid @enderror" type="text"
                        wire:model="note" placeholder="Enter Prescription Note">
                    @error('note') <div class="invalid-feedback">{{ ($message )}}</div>@enderror
                </div>
            </div>
            <div class="col-lg-12 my-4">
                <div class="form-group">
                    <label for="delivery_address">Delivery Address
                    </label>
                    <textarea id="delivery_address" class="form-control" cols="10" rows="6"
                        wire:model="delivery_address"></textarea>
                    @error('delivery_address')
                    <label class="invalid-feedback">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            @if ($images)
            Image Preview:
            <div class="row" wire:ignore>
                @foreach ($images as $image)
                <div class="col-3 card me-1 mb-1">
                    <img src="{{ $image->temporaryUrl() }}">
                </div>
                @endforeach
            </div>
            @endif
            <div class="col-lg-12 my-4" >
                <div class="form-group">
                    <label for="image">Banner Image<sup class="text-danger">*</sup></label>
                    <input class="form-control"
                        type="file" wire:model="images"  placeholder="Enter Article Name" multiple>
                </div>
            </div>
            <div wire:loading wire:target="images">Uploading...</div>
                @error('images.*') <span class="invalid-feedback">{{ $message }}</span> @enderror
            <div class="col-lg-12 my-4">
                <div class="form-group" wire:ignore>
                    <label for="delivery_time">Delivery Time</label>
                    <select id="delivery_time" class="form-control" wire:model="delivery_time">
                        <option value=""></option>
                        @foreach (config('timeslots.slots') as $key=> $slot)
                        <option value="{{ $slot }}">{{ $slot }}</option>
                        @endforeach
                    </select>
                </div>
                @error('delivery_time')
                    <label class="invalid-feedback">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@push('scripts')

<script>
    $(document).ready(function () {
        $('#delivery_time').select2({
            placeholder: "Time Slot",
        });
    });

    $('#delivery_time').on('change', function (e) {
        var time_id = $('#delivery_time').select2("val");
        @this.set('delivery_time', time_id);
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
