@if($message = Session::get('success'))
<div id="success-alert" class="alert alert-success alert-dismissible">
    <strong>{{ $message }}</strong>
</div>
<script>
    setTimeout(function() {
        $("#success-alert").fadeTo(500, 0).slideUp(500);
    }, 3000);
</script>
@endif

@if($message = Session::get('successupdate'))
<div id="success-update-alert" class="alert alert-success alert-dismissible">
    <strong>{{ $message }}</strong>
</div>
<script>
    setTimeout(function() {
        $("#success-update-alert").fadeTo(500, 0).slideUp(500);
    }, 3000);
</script>
@endif

@if($message = Session::get('successdelete'))
<div id="success-delete-alert" class="alert alert-success alert-dismissible">
    <strong>{{ $message }}</strong>
</div>
<script>
    setTimeout(function() {
        $("#success-delete-alert").fadeTo(500, 0).slideUp(500);
    }, 3000);
</script>
@endif
