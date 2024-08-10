{{-- Mensagem de Sucesso --}}
@if ($mensagem = Session::get('sucesso'))
    <div class="container" id="sucesso-mensagem">
        <div class="card green">
            <div class="card-content white-text">
                <span class="card-title">Sucesso</span>
                <p>{{$mensagem}}</p>
            </div>
        </div>
    </div>
@endif
{{-- Mensagem de Aviso --}}
@if ($mensagem = Session::get('aviso'))
    <div class="container" id="aviso-mensagem">
        <div class="card blue">
            <div class="card-content white-text">
                <span class="card-title">Aviso</span>
                <p>{{$mensagem}}</p>
            </div>
        </div>
    </div>
@endif
{{-- Mensagem de Erro --}}
@if ($mensagem = Session::get('erro'))
    <div class="container" id="erro-mensagem">
        <div class="card red">
            <div class="card-content white-text">
                <span class="card-title">Erro</span>
                <p>{{$mensagem}}</p>
            </div>
        </div>
    </div>
@endif