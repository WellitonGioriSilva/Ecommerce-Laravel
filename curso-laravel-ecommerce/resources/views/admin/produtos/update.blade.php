<!-- Modal Structure -->
<div id="update-{{$produto->id}}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
        <form action="{{route('admin.produto.update', $produto->id)}}" method="POST" enctype="multipart/form-data" class="col s12">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Nome" name="nome" id="nome" type="text" class="validate" value="{{$produto->nome}}">
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input id="valor" name="valor" type="number" class="validate" step="0.01" value="{{ number_format($produto->valor, 2, '.', ',') }}">
                    <label for="valor">Valor</label>
                </div>
                <div class="input-field col s12">
                    <input id="descricao" name="descricao" type="text" class="validate" value="{{$produto->descricao}}">
                    <label for="descricao">Descrição</label>
                </div>
                <div class="input-field col s12">
                    <select name="id_categoria">
                        <option value="" disabled selected>Escolha uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}" {{ $produto->id_categoria == $categoria->id ? 'selected' : '' }}>{{$categoria->nome}}</option>    
                        @endforeach
                    </select>
                    <label>Categoria</label>
                </div>          
                
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Imagem</span>
                        <input name="imagem" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" value="{{url("storage/{$produto->imagem}")}}">
                    </div>
                </div>
                <input type="hidden" name="id_user" id="id_user" value="{{auth()->user()->id}}">
            </div> 
        
        <button type="submit" class="waves-effect waves-green btn green right">Salvar</button><br><br>
    </div>
    
        </form>
</div>
