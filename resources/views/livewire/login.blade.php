<div>
    <div class="card ">

        @if ($message)
            <div class="{{ $status ? 'alert alert-success' : 'alert alert-danger' }}">
                {{ $message }}
            </div>
        @endif

        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset('images/') }}" alt="Logo" height="150">
            </div>
            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text txt fw-bold bg-primary text-white">
                            <i class="fas fa-user "></i>
                        </span>
                        <input type="text" class="form-control" wire:model="client_id"
                            placeholder="Tapez votre identifiant ilient " required>
                    </div>
                    <span class="text-danger">
                        @error('client_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-primary fw-bold ">SE CONNECTER </button>
                </div>

                 
                    <button type="button" wire:click="checkStatus" class="btn btn-secondary mt-3">
                        Vérifier le statut</button>
                 

                <div class="text-center my-3">
                    <a href="/inscription">S'incrire</a>
                </div>
            </form>
        </div>
    </div>
</div>
