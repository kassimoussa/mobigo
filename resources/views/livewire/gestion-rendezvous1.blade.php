<div>
    
    <div class="modal fade" id="edit" data-bs-keyboard="true" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl " role="document">
            <div class="modal-content">
                <form wire:submit="update">
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

                                    <div class="mt-2 col-12 ">
                                        <label for="nom_patient"
                                            class="form-label text-muted fw-italic mb-0">Patient
                                            *</label>
                                            <input type="text" class="form-control" id="nom_patient"  wire:model.blur="nom_patient" readonly>
                                    </div>

                                    <div class="mt-2 col-12 ">
                                        <label for="specialite"
                                            class="form-label text-muted fw-italic mb-0">Spécialité
                                            *</label>
                                            <input type="text" class="form-control" id="specialite"  wire:model.blur="specialite" readonly>
                                    </div>

                                    <div class="col-12 my-2">
                                        <label for="motif" class="form-label">Motif </label>
                                        <textarea class="form-control" id="motif" readonly wire:model.defer="motif" cols="3" rows="3"></textarea>
                                    </div>
                                    

                                    <div class="col-12 my-2">
                                        <label for="date" class="form-label">Date </label>
                                        <input type="date" class="form-control" id="date" wire:model.blur="date"
                                            required>
                                        @error('date')
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

        <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle "
            id="" {{-- wire:poll --}}>
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                {{-- <th scope="col">Photo</th> --}}
                <th scope="col">Patient</th>
                <th scope="col">Spécialité</th>
                <th scope="col">Motif</th>
                <th scope="col">Date</th>
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
                        if ($rdv->status == Null) {
                            $status = 'En attente';
                            $color = "warning";
                        } else {
                            $status = $rdv->status;
                            $color = "success";
                        }
                    @endphp
                        <tr>
                            <td>{{ $cnt }}</td>
                            {{-- <td><img style="width: 60px; height: 60px; oject-fit: cover;" src="{{ asset($photo) }}"
                            alt="Photo du patient"> </td> --}}
                            <td>{{ $rdv->user->nom }}</td>
                            <td>{{ $rdv->specialite }}</td>
                            <td>{{ $rdv->motif }}</td> 
                            <td>{{ $rdv->date }}</td>
                            <td><span class="badge text-bg-{{ $color }}">{{ $status }}</span></td> 
                            <td class="td-actions ">
                                <a class="btn  " data-bs-toggle="modal" data-bs-target="#edit"
                                    wire:click="loadid('{{ $rdv->id }}')" title="Voir la demande">
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
