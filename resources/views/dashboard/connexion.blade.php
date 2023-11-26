@extends("employeesForms.app")

@section("content")
<div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
    <form id="loginForm" style="width: 300px;">
        <div class="form-group">
            <label for="exampleInputEmail1">Identifiant</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Votre identifiant">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>

<script>
    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();

        // Récupération des valeurs des champs d'identifiant et de mot de passe
        const username = document.getElementById("exampleInputEmail1").value;
        const password = document.getElementById("exampleInputPassword1").value;

        // Vérification des identifiants
        if (username === "adminDashboard" && password === "P@$a#ecn@2022$") {
            window.location.href = "{{ route('dashboard.index') }}"; // Redirection vers dashboard.index
        } else {
            window.location.href = "{{ route('demandeDotation.index') }}"; // Redirection vers users.index
        }
    });
</script>
@endsection
