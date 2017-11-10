
<div class="container">
    <div class="container">
        <form method="post" action="action.php">
            <div class="row profilo">
                <div class="col-10">

                    <div class="form-group row">
                        <label for="nome-text" class="col-2 col-form-label">Nome: </label>
                        <input type="text" class="form-control col-sm-3" id="nome-text" name="nome-text" value="<?php profilo('nome',$link); ?>">
                    </div>

                    <div class="form-group row">
                        <label for="cognome-text" class="col-2 col-form-label">Cognome: </label>
                        <input type="text" class="form-control col-sm-3" id="cognome-text" name="cognome-text" value="<?php profilo('cognome',$link); ?>">
                    </div>

                    <div class="form-group row">
                        <label for="tel-text" class="col-2 col-form-label">Telefono: </label>
                        <input type="text" class="form-control col-sm-3" id="tel-text" name="tel-text" value="<?php profilo('telefono',$link); ?>">
                    </div>

                    <div class="form-group row">
                        <label for="email-text" class="col-2 col-form-label">Email: </label>
                        <input type="text" class="form-control col-sm-3" id="email-text" name="email-text" value="<?php profilo('email',$link); ?>">
                    </div>

                    <div class="form-group row">
                        <label for="pass-text" class="col-2 col-form-label">Password: </label>
                        <input type="password" class="form-control col-sm-3" id="pass-text" name="pass-text" value="<?php profilo('email',$link); ?>">
                    </div>

                </div>

                <div class="col-2">
                    <button type="submit" class="btn btn-primary" id="mod_ute">Registrati</button>

                </div>
            </div>
        </form>
    </div>
</div>