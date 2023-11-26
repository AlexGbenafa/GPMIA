@extends("miseADispositionForm.app")

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

        .form-check-label{
            color: whitesmoke;
        }
    </style>
    
    <form method="POST" action="{{ route('inventaire.store') }} " id="submissionForm" onsubmit="confirmSubmission()">

        @csrf
    
        <div class="mb-3">
            <input type="text" class="form-control" id="matriculeEmployee" name="matriculeEmployee" placeholder="Numéro de Matricule" required>
        </div>

        <div class="mb-3">
            <select class="form-select" id="site" name="site" required>
                <option value="" disabled selected>Structure</option>
                <option value="DGY">DGY</option>
                <option value="DGV">DGV</option>
                <option value="CEV">CEV</option>
                <option value="KHA">KHA</option>
                <option value="KHA">SAN MARCO</option>
            </select>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" id="nomEmployee" name="nomEmployee" placeholder="Nom" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" id="serviceEmployee" name="serviceEmployee" placeholder="Service" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" id="fonctionEmployee" name="fonctionEmployee" placeholder="Fonction" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" id="modelMateriel" name="modelMateriel" placeholder="Model" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" id="nomMateriel" name="nomMateriel" placeholder="Nom materiel" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="confirmationReception" name="confirmationReception" required>
            <label class="form-check-label" for="confirmationReception">J'ai bien reçu le matériel et je confirme sa réception.</label>
        </div>

        <button type="button" class="btn btn-primary" onclick="confirmSubmission()">Soumettre</button>
</form>

<script>
    function confirmSubmission() {
        if (confirm("Vous confirmez la mise a disposition?")) {
            // If the user confirms, submit the form
            document.getElementById("submissionForm").submit();
        }
    }
</script>

        
        

                
@endsection