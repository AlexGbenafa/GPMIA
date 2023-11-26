@extends("layouts.app")

@section("content")
<style>
    /* Style pour le masque noir */
    .auth-mask {
        background-color: rgb(0, 0, 0); /* Fond noir semi-transparent */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999; /* Placez-le au-dessus de tout le reste */
    }
</style>


@if(Session::has('success'))
    <div id="successMessage" class="alert alert-success">
        {{ Session::get("success") }}
    </div>
@endif

<style>
    .fade-out {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }
</style>

<script>
    // Faire disparaître le message de succès après 6 secondes avec animation
    document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.getElementById("successMessage");
        if (successMessage) {
            successMessage.style.display = "block";

            setTimeout(function() {
                successMessage.classList.add("fade-out");
            }, 3000);

            setTimeout(function() {
                successMessage.style.display = "none";
            }, 3500);
        }
    });
</script>

@if(Session('error'))
<div class="alert alert-danger" role="alert">
    {{ Session('error') }}
</div>
@endif

<div class="container" id="pageContent">
    <h1>Liste des demandes de dotations</h1>

    <!-- Boutons de tri -->
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-secondary sort-button" data-status="Tous">Tous</button>
        <button type="button" class="btn btn-secondary sort-button" data-status="En attente">En attente</button>
        <button type="button" class="btn btn-secondary sort-button" data-status="Approuve">Approuvé</button>
        <button type="button" class="btn btn-secondary sort-button" data-status="Refuse">Refusé</button>
    </div>

    <table class="table table-striped table-bordered" id="demandeTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Matricule</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Structure</th>
                <th scope="col">Fonction</th>
                <th scope="col">Désignation de la Demande</th>
                <th scope="col">Status</th>
                <th scope="col">Date soumission</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandeMateriel as $demande)
                <tr data-status="{{ $demande->status }}">
                    <td>{{ $demande->numeromatriculeemployee }}</td>
                    <td>{{ $demande->nomemployee }}</td>
                    <td>{{ $demande->prenomemployee }}</td>
                    <td>{{ $demande->structureemployee }}</td>
                    <td>{{ $demande->fonctionemployee }}</td>
                    <td>{{ $demande->designationdemande }}</td>
                    <td>
                        <a class="statusLink" href="#" data-status="{{ $demande->status }}">
                            @if($demande->status == 'En attente')
                                <span style="color: blue;">{{ $demande->status }}</span>
                            @elseif($demande->status == 'Approuve')
                                <span style="color: green;">{{ $demande->status }}</span>
                            @elseif($demande->status == 'Refuse')
                                <span style="color: darkred;">{{ $demande->status }}</span>
                            @endif
                        </a>
                    </td>
                    
                    <td>{{ $demande->created_at }}</td>
                    <!-- La boîte de dialogue (popup) pour chaque ligne -->
                    <td>
                        <form class="statusForm" method="POST" action="{{ route('demandeDotation.update', $demande->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="statusDialog" style="">
                                <div class="form-group">
                                    <select class="form-control" id="newStatus" name="status">
                                        <option value="En attente">En attente</option>
                                        <option value="Approuve">Approuvé</option>
                                        <option value="Refuse">Refusé</option>
                                    </select>
                                </div>
                                <button class="btn btn-success updateStatus" type="submit">Mettre à jour</button>
                            </div>                            
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Lorsque l'utilisateur clique sur le lien de statut
$('.statusLink').on('click', function(event) {
    event.preventDefault(); // Empêche le lien de se comporter comme un lien

    // Find the closest "statusDialog" within the parent row and show it
    $(this).closest('tr').find('.statusDialog').show();
});

// Lorsque l'utilisateur clique sur le bouton "Mettre à jour" dans la boîte de dialogue
$('.updateStatus').on('click', function() {
    // Find the closest "statusForm" within the parent row and submit it
    $(this).closest('.statusForm').submit();
});

// Fonction de tri
$('.sort-button').on('click', function() {
    var status = $(this).data('status');
    var rows = $('#demandeTable tbody tr');

    if (status === 'Tous') {
        rows.show();
    } else {
        rows.hide();
        rows.filter('[data-status="' + status + '"]').show();
    }
});
</script>
@endsection
