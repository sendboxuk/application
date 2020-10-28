<div>
    <form wire:submit.prevent="createProduct" role="form">

        <div class="form-group">
            <label class="control-label" for="name">Name: </label>
            <input type="text" wire:model="name" class="form-control col-8">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="sku">SKU: </label>
            <input type="text" wire:model="sku" class="form-control col-3">
            @error('sku') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="template">Template: </label>
            <select class="form-control" wire:model="template_id">
                <option> - - -</option>

                @foreach ($templates as $template)
                <option value="{{ $template->id }}">
                    {{ $template->name }}
                </option>
                @endforeach
            </select>
            @error('template_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm mb-4 float-right">Save Product</button>
    </form>
</div>