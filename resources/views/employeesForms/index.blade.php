@extends("employeesForms.app")

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
<div id="errorMessage" class="alert alert-danger" role="alert">
    {{ Session('error') }}
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
    var errorMessage = document.getElementById("errorMessage");
    if (errorMessage) {
        errorMessage.style.display = "block";

        setTimeout(function() {
            errorMessage.classList.add("fade-out");
        }, 3000);

        setTimeout(function() {
            errorMessage.style.display = "none";
        }, 3500);
    }
});
</script>

<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <style>
                label{
                    color: aliceblue;
                }
            </style>
            <form method="POST" action="{{ route('demandeDotation.store') }}">

                @csrf
            
                <div class="mb-3">
                    <input type="text" class="form-control" id="numeroMatriculeEmployee" name="numeroMatriculeEmployee" placeholder="Numéro de Matricule" required>
                </div>
                
                <div class="mb-3">
                    <input type="text" class="form-control" id="nomEmployee" name="nomEmployee" placeholder="Nom" required>
                </div>
                
                <div class="mb-3">
                    <input type="text" class="form-control" id="prenomEmployee" name="prenomEmployee" placeholder="Prénom" required>
                </div>
                
                <div class="mb-3">
                    <select class="form-select" id="structureEmployee" name="structureEmployee" required>
                        <option value="" disabled selected>Site</option>
                        <option value="DGDS">DGDS</option>
                        <option value="DMTI">DMTI</option>
                        <option value="DNA">DNA</option>
                        <option value="CNS">CNS</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <input type="text" class="form-control" id="fonctionEmployee" name="fonctionEmployee" placeholder="Fonction" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Désignation de la Demande</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="videoProjecteur" name="designationDemande[]" value="Video projecteur">
                        <label class="form-check-label" for="videoProjecteur">Video projecteur</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tablette" name="designationDemande[]" value="Tablette">
                        <label class="form-check-label" for="tablette">Tablette</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="imprimante" name="designationDemande[]" value="Imprimante">
                        <label class="form-check-label" for="imprimante">Imprimante</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="laptop" name="designationDemande[]" value="Laptop">
                        <label class="form-check-label" for="laptop">Laptop</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="desktop" name="designationDemande[]" value="Desktop">
                        <label class="form-check-label" for="desktop">Desktop</label>
                    </div>
                </div>
                
                
                
                
            
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
            

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua5NoKNLRc+mUpBj3p4zO7x4aGf3t8v1gGmz5+ogB+1jz4/A4Yd6P5Jw5b" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
