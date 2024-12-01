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
            @if ($step === 1)
                <form wire:submit.prevent="login"> 
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text txt fw-bold bg-primary text-white">
                                <i class="fas fa-user "></i>
                            </span>
                            <input type="text" class="form-control" wire:model="email"
                                placeholder="Tapez votre email ou nom d'utilisateur " required>
                        </div>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text txt fw-bold bg-primary  text-white">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" wire:model="password"
                                placeholder="Tapez votre mot de passe" required>
                        </div>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary fw-bold ">SE CONNECTER </button>
                    </div>
                    <div class="text-center mb-1">
                        <a href="/inscription">S'incrire</a>
                    </div>
                </form>
            @endif
            @if ($step === 2)
    <form wire:submit.prevent="sendNotif">
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text txt fw-bold bg-primary text-white">
                    <i class="fas fa-user "></i>
                </span>
                <input type="text" class="form-control" wire:model="client_id"
                    placeholder="Tapez votre identifiant client " required>
            </div>
            <span class="text-danger">
                @error('client_id')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="d-grid gap-4">
            <button type="submit" class="btn btn-primary fw-bold">SE CONNECTER</button>
        </div>

        @if ($isChecking)
            <div wire:poll.3s="authenticateClientId" class="alert alert-warning mt-3 text-center">
                Vérification en cours... <br>
                <div class="spinner-border" role="status">
                    <span class="sr-only">Chargement...</span>
                </div>
            </div>
        @endif
    </form>
@endif
        </div>
    </div>
</div>
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('startAutoCheck', () => {
                // Démarrer la vérification toutes les 5 secondes
                setInterval(() => {
                    Livewire.emit('authenticateClientId');
                }, 2000);
            });
        });
    </script>

