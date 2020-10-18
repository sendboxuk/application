<div>
    <form wire:submit.prevent="editTemplate" role="form">
        <input type="hidden" wire:model="template_id">
        <div class="form-group">
            <label class="control-label" for="name">Name: </label>
            <input type="text" wire:model="name" class="form-control col-5">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="filename">File Name: </label>
            <input type="text" wire:model="filename" class="form-control col-3">
            @error('filename') <span class="error">
                {{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="subject">Subject: </label>
            <input type="text" wire:model="subject" class="form-control col-9">
            @error('subject') <span class="error">
                {{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="placeholders">Placeholders: </label>

            <textarea wire:model="placeholders" class="form-control col-9" rows="3"></textarea>
            @error('placeholder') <span class="error">
                {{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm mb-4 float-right">Update Template</button>
    </form>
</div>