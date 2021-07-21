@if(Session::has('error'))
    <div id="alert" class="notification is-error cs-alert">
        <button class="delete" onclick="hideAlert()"></button>
        {{ Session('error') }}
    </div>
@endif

<script>
    function hideAlert() {
        document.getElementById("alert").classList.add("d-none");
    }
</script>
