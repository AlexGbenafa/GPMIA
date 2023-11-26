@extends("layouts.app")

@section("content")
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

<div class="container">
    <h1>Plan de dotation</h1>

    <table id="table" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Numéro de Matricule</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Structure</th>
                <th scope="col">Fonction</th>
                <th scope="col">Désignation de la Demande</th>
                <th scope="col">Status</th>
                <th scope="col">Date soumission</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandesAcceptees as $demande)
                <tr>
                    <td>{{ $demande->numeromatriculeemployee }}</td>
                    <td>{{ $demande->nomemployee }}</td>
                    <td>{{ $demande->prenomemployee }}</td>
                    <td>{{ $demande->structureemployee }}</td>
                    <td>{{ $demande->fonctionemployee }}</td>
                    <td>{{ $demande->designationdemande }}</td>
                    <td>
                        <span style="color: green;">{{ $demande->status }}</span>
                    </td>
                    <td>{{ $demande->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
