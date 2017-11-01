
<div class="container">
    <div class="container">
        <div class="row profiloo">
            <div class="col-10" id="profilo">

                <div class="form-group row">
                    <label for="nome-text" class="col-2 col-form-label">Nome: </label>
                    <input type="text" class="form-control col-sm-3" id="nome-text" name="nome-text" value="<?php profilo('nome',$link); ?>">
                </div>

                <div class="form-group row">
                    <label for="cognome-text" class="col-2 col-form-label">Cognome: </label>
                    <input type="text" class="form-control col-sm-3" id="cognome-text" name="cognome-text" value="<?php profilo('cognome',$link); ?>">
                </div>

                <div class="form-group row">
                    <label for="tel-text" class="col-2 col-form-label">telefono: </label>
                    <input type="text" class="form-control col-sm-3" id="tel-text" name="tel-text" value="<?php profilo('telefono',$link); ?>">
                </div>

                <div class="form-group row">
                    <label for="email-text" class="col-2 col-form-label">telefono: </label>
                    <input type="text" class="form-control col-sm-3" id="email-text" name="email-text" value="<?php profilo('email',$link); ?>">
                </div>

            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary" id="botRegSig">Modifica</button>

            </div>
        </div>
    </div>
</div>