<!-- Modal Structure -->
<div id="delete-{{$produto->id}}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">delete</i> Confirmação?</h4>
            <div class="row">
                <p>Tem certeza que deseja excluir {{$produto->nome}}? </p>
            </div> 
        
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
        <form action="{{route('admin.produto.delete', $produto->id)}}" method="POST">
            @method('DELETE');
            @csrf
            <button class="waves-effect waves-green btn red right" type="submit">Confirmar</button><br>
        </form>
    </div>
</div>