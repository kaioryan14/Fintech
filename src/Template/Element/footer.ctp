<div id="modalLoading" class="modal fade" role="dialog" style="width: 150px;left:40%">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="text-align: center">
                <h5>Aguarde...</h5>
                <?= $this->Html->image('loading.gif',['style'=>'width:100px']); ?>
            </div>
        </div>
    </div>
</div>

<div id="modalAviso" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Aviso!</h5>
                <p class="text-danger mensagem-aviso" style="border-left: 8px solid red; padding-left: 8px"></p>
            </div>
            <div class="modal-footer">
                <button onclick="$('#modalAviso').modal('hide')" class="btn btn-success text-white"><i class="material-icons left text-white">thumb_up</i>Ok</button>
            </div>
        </div>
    </div>
</div>

<div id="modalAvisoSucesso" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Aviso!</h5>
                <p class="text-success mensagem-aviso-sucesso" style="border-left: 8px solid green; padding-left: 8px"></p>
            </div>
            <div class="modal-footer">
                <button onclick="$('#modalAvisoSucesso').modal('hide')" class="btn btn-success text-white"><i class="material-icons left text-white">thumb_up</i>Ok</button>
            </div>
        </div>
    </div>
</div>

</div>

</body>

</html>