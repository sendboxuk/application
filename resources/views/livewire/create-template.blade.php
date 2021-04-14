<div>
    <form wire:submit.prevent="createTemplate" role="form">

        <div class="form-group">
            <label class="control-label" for="name">Name: </label>
            <input type="text" wire:model="name" class="form-control col-5">
            @error('name') <span class="error">{{ $message }}</span> @enderror
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
        <div class="form-group">
            <label class="control-label" for="sensitive_placeholders">Sensitive Placeholders: </label>

            <textarea wire:model="sensitive_placeholders" class="form-control col-9" rows="3"></textarea>
            @error('sensitive_placeholders') <span class="error">
                {{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm mb-4 float-right">Save Template</button>
    </form>
</div>