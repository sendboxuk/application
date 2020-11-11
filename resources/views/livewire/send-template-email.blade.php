<div>
    <form wire:submit.prevent="sendEmail" role="form">
        <input type="hidden" wire:model="template_id">
        <div class="form-group">
            <label class="control-label" for="email">Email: </label>
            <input type="text" wire:model="email" class="form-control col-8">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="transaction_id">Transaction Id: </label>
            <input type="text" wire:model="transaction_id" class="form-control col-3">
            @error('transaction_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <label class="control-label" for="transaction_id">Placeholders: </label>
        @foreach ($placeholders as $index => $placeholder)
        <div class="form-group" wire:key="placeholders-field-{{ $index }}">
            <input type="text" wire:model="placeholders.{{ $index }}" class="form-control col-8">
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary btn-sm mb-4 float-right">Send Email</button>
    </form>
</div>