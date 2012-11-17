<h1>Es trat ein Fehler auf!</h1>
<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>Fehler:</strong><br /> {$smarty.session.lasterror->getMessage()}
</div>
<a href="#" id="displayerror" class="btn btn-primary">Details ein-/ausblenden</a>

<script>
$("#displayerror").click(function () {$("#errordetail").toggle();});
</script>
<div id="errordetail" style="display:none;">
    <pre>
        {$smarty.session.lasterror}
    </pre>
</div>