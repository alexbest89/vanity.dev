<footer class="footer">
    <div class="container">
        <span class="text-muted"><p>&copy; WURZ</p></span>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="action.php?action=loginSignup">
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" id="loginActive" name="loginActive" value="1">
                        <div class="form-group row">
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="tuaemail@esempio.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="toggleLogin">Registrati</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                    <button type="submit" class="btn btn-primary" id="botRegSig">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    /*$("#toggleLogin").click(function () {

        if ($("#loginActive").val() == "1"){

            $("#loginActive").val("0");
            $("#loginModalTitle").html("Registrati");
            $("#botRegSig").html("Registrati");
            $("#toggleLogin").html("Login");

        } else{

            $("#loginActive").val("1");
            $("#loginModalTitle").html("Login");
            $("#botRegSig").html("Login");
            $("#toggleLogin").html("Registrati");

        }

    });
    $("#mod_ute").click(function () {
        $.ajax({
            type: "POST",
            url: "action.php",
            data: "nome-text=" + $("#nome-text").val() + "&cognome-text=" + $("#cognome-text").val() + "&tel-text=" + $("#tel-text").val() + "&email-text=" + $("#email-text").val() + "&pos-text=" + $("#pos-text").val(),
            success: function (result) {
                alert(result);
            }
        })
    })
    */

</script>


</body>
</html>