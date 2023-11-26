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
    .text-danger {
        color: red;
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
    <h1>INVENTAIRE</h1>

    <div class="form-group">
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par nom">
    </div>

    <table id="table" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Matricule</th>
                <th scope="col">Site</th>
                <th scope="col">Nom</th>
                <th scope="col">Service</th>
                <th scope="col">Fonction</th>
                <th scope="col">Model</th>
                <th scope="col">Nom materiel</th>
                <th scope="col">Annee aquision</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventaireMateriel as $inventaire)
                @php
                    $anneeAcquisition = $inventaire->anneeaquisition;
                    $anneeActuelle = date("Y");
                    $anneePlus5 = $anneeAcquisition + 5;
                    $isAnneePlus5SupActuelle = $anneePlus5 <= $anneeActuelle;
                @endphp
                <tr @if ($isAnneePlus5SupActuelle) class="text-danger" @endif>
                    <td>{{ $inventaire->matriculeemployee }}</td>
                    <td>{{ $inventaire->site }}</td>
                    <td>{{ $inventaire->nomemployee }}</td>
                    <td>{{ $inventaire->serviceemployee }}</td>
                    <td>{{ $inventaire->fonctionemployee }}</td>
                    <td>{{ $inventaire->modelmateriel }}</td>
                    <td>{{ $inventaire->nommateriel }}</td>
                    <td>{{ $inventaire->anneeaquisition }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var searchInput = document.getElementById("searchInput");
        var table = document.getElementById("table");
        var tbody = table.getElementsByTagName("tbody")[0];
        var rows = tbody.getElementsByTagName("tr");

        searchInput.addEventListener("input", function() {
            var searchValue = searchInput.value.toLowerCase();

            for (var i = 0; i < rows.length; i++) {
                var cell = rows[i].getElementsByTagName("td")[2]; // Index 2 corresponds to the "Nom" column
                if (cell) {
                    var cellValue = cell.textContent.toLowerCase();
                    if (cellValue.includes(searchValue)) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        });
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
