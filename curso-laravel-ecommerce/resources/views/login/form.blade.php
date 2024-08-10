<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
{{-- Mensagem de Erro --}}
@if ($mensagem = Session::get('erro'))
{{$mensagem}}
@endif
@if ($errors->any())
    @foreach ($errors->all() as $erro)
        {{$erro}}<br>
    @endforeach
@endif

<div class="row container">
    <div class="col s6 m12">
        <div class="card-panel white">
            <div class="row">
                <form class="col s12 center" action="{{route('login.auth')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Email" id="email" name="email" type="text" class="validate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Senha" id="password" name="password" type="password" class="validate">
                        </div>
                    </div>
                    <!-- Switch -->
                    Lembre-me
                    <div class="switch">
                        <label>
                            Não
                            <input type="checkbox" name="remember">
                            <span class="lever"></span>
                            Sim
                        </label>
                    </div>
                    <br>
                    <div class="col s12">
                        <button class="waves-effect waves-light btn" type="submit">Entrar</button>
                        <a href="{{route('login.create')}}" class="waves-effect waves-light btn white-text">Cadastrar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

