<?php


function showPrompt() {
    echo "<div class='alert alert-success'>".$_SESSION['prompt']."</div>";
}

function showError() {
    echo "<div class='alert alert-danger'>".$_SESSION['errprompt']."</div>";
}








































?>