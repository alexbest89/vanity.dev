<div class="container">
    <div class="row">
        <div id="calendar"></div>

    </div>
</div>


<!-- Modal -->
<div id="createEventModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inserisci appuntamento</h4>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label" for="inputPatient">Trattamento:</label>
                    <div class="field desc">
                        <div class="form-group">
                            <label for="title">Scegli il trattamento:</label>
                            <input class="form-control" id="title" name="title" type="hidden">
                            <select id="scelta" class="form-control">
                                <?php

                                    $result = mysqli_real_query($link,"SELECT nome FROM trattamenti");
                                    $i = 0;
                                    if($result = mysqli_use_result($link)) {
                                        while ($row = mysqli_fetch_row($result)){
                                            for ($i=0;$i<sizeof($row);$i++){
                                                echo "<option>";
                                                printf($row[$i]);
                                                echo "</option>";
                                            }
                                        }
                                    }

                                ?>
                            </select>
                        </div>
                    </div>
                    <label class="control-label" for="inputPatient">Note:</label>
                    <div class="field desc">
                        <input class="form-control" id="note" name="note" placeholder="note" type="text" value="">
                    </div>
                </div>

                <input type="hidden" id="startTime"/>
                <input type="hidden" id="endTime"/>



                <div class="control-group">
                    <label class="control-label" for="when">Quando:</label>
                    <div class="controls controls-row" id="when" style="margin-top:5px;">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancella</button>
                <button type="submit" class="btn btn-primary" id="submitButton">Salva</button>
            </div>
        </div>

    </div>
</div>


<div id="calendarModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Dettaglio</h4>
            </div>
            <div id="modalBody" class="modal-body">
                <h4 id="modalTitle" class="modal-title"></h4>
                <h2 id="modalNote" class="modal-title"></h2>
                <div id="modalWhen" style="margin-top:5px;"></div>
            </div>
            <input type="hidden" id="eventID"/>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
            </div>
        </div>
    </div>
</div>