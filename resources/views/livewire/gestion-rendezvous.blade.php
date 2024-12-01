@php
use Carbon\Carbon;
@endphp


<div>

    <div class="d-flex justify-content-end mb-3 ">

        {{-- <div class="col-10 d-flex justify-content-start">

            <div class="col-4">
                <x-search-field :search="$search" placeholder="Rechercher un bien " />
            </div> 
 

        </div> --}}


        <div class="text-end">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal" data-bs-target="#newrdv">
                <i class="fa-solid fa-plus"></i> Demander
            </a>
        </div>
    </div>



    <div class="modal fade" id="newrdv" data-bs-keyboard="true" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <form wire:submit="store">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Demande de rendez-vous </h3>
                        <div class="row" style="text-align: center;">
                            <div class=" form-group">
                                <button type="submit" name="submit"
                                    class="btn btn-primary fw-bold">Enregistrer</button>
                                <button type="button" class="btn btn-danger fw-bold " wire:click="close_modal"
                                    data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body px-2">

                        <div class="card my-3">
                            <div class="card-header bg-dark text-center text-white">
                                <h3> Informations </h3>
                            </div>

                            <div class="card-body">
                                <div class="row ">

                                    <div class="col-12 my-2">
                                        <label for="date" class="form-label">Date </label>
                                        <input type="date" class="form-control" id="date" wire:model.blur="date"
                                            required>
                                        @error('date')
                                            <em class="text-danger">{{ $message }}</em>
                                        @enderror
                                    </div>

                                    <div class="my-2 col-12 ">
                                        <label for="specialite" class="form-label text-muted fw-italic mb-0">Spécialité
                                            *</label>
                                        <select wire:model.defer="specialite" class="form-select" id="specialite">
                                            <option value="" selected>Select</option>
                                            <option value="Généraliste">Généraliste </option>
                                            <option value="Cardilogie">Cardilogie </option>
                                            <option value="Endocrinologie">Endocrinologie </option>
                                            <option value=" Gastro-entérologie"> Gastro-entérologie </option>
                                            <option value="Néphrologie">Néphrologie </option>
                                            <option value="Neurologie">Neurologie </option>
                                            <option value="pneumologie">pneumologie </option>
                                        </select>
                                        <span class="text-danger">
                                            @error('specialite')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-12 my-2">
                                        <label for="motif" class="form-label">Motif </label>
                                        <textarea class="form-control" id="motif" wire:model.defer="motif" cols="3" rows="3"></textarea>
                                        @error('motif')
                                            <em class="text-danger">{{ $message }}</em>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>


    <div class="col ">

        <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle " id=""
            {{-- wire:poll --}}>
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                {{-- <th scope="col">Photo</th> --}}
                <th scope="col">Date</th>
                <th scope="col">Spécialité</th>
                <th scope="col">Motif</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </thead>
            <tbody class="text-center">
                @if ($rdvs->isNotEmpty())
                    @php
                        $cnt = 1;
                        $editmodal = 'edit' . $cnt;
                        $delmodal = 'delete' . $cnt;
                    @endphp

                    @foreach ($rdvs as $key => $rdv)
                        @php
                            if ($rdv->status == null) {
                                $status = 'En attente';
                                $color = 'warning';
                            } else {
                                $status = $rdv->status;
                                $color = 'success';
                            }
                        @endphp
                        <tr>
                            <td>{{ $cnt }}</td>
                            {{-- <td><img style="width: 60px; height: 60px; oject-fit: cover;" src="{{ asset($photo) }}"
                            alt="Photo du patient"> </td> --}}
                            <td>{{ Carbon::parse($rdv->date)->format('d/m/Y') }}</td>
                            <td>{{ $rdv->specialite }}</td>
                            <td>{{ $rdv->motif }}</td>
                            <td><span class="badge text-bg-{{ $color }}">{{ $status }}</span></td>
                            <td class="td-actions ">
                                <a class="btn  " title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                        @php
                            $cnt += 1;
                            $editmodal = 'edit' . $cnt;
                            $delmodal = 'delete' . $cnt;
                        @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">There are no data.</td>
                    </tr>
                @endif

                <x-delete-modal delmodal="delete" message="Confirmer la suppression " delf="delete" />

            </tbody>
        </table>
    </div>

</div>
