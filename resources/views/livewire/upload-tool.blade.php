<div>
<form wire:submit.prevent="uploadFile" role="form">

<div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="form-group">
    <label class="control-label" for="name">Your CSV File: </label>
    <input type="file" wire:model="csv_file" class="form-control">

    @error('file') <span class="error">{{ $message }}</span> @enderror
</div>
    <button type="submit"  class="btn btn-primary btn-sm mb-4 float-right">Upload</button>
</form>
</div>
