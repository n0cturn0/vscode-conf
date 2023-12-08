@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Criando uma vaga</h1>
@stop

@section('content')
        <div class="row">


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <!-- general form elements -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Cadastro de vaga para recebimento de currículo</h3>

                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form method="POST" action="{{route('criavaga')}}" enctype="multipart/form-data">
                                                <div class="card-body">
                                                


                                                    <!-- <div class="form-group">
                                                        <label for="exampleInputEmail1">Perfis</label>
                                                        <select name="perfil" class="form-control" required>
                                                        <option value="">Selecione um perfil</option>
                                                        <option value="100">-- Sem Perfil --</option>
                                                        <option value="0">Perfil Simples</option>
                                                        <option value="1">Perfil Enrijecido</option>
                                                        </select>
                                                       
                                                    </div> -->

                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome da vaga</label>
                                                        <input type="text" name="vaga" class="form-control" id="exampleInputEmail1"  placeholder="Nome da vaga" required>

                                                    </div>
    {{--                                                <div class="form-group">--}}
    {{--                                                    <label for="exampleInputEmail1">Enviar arquivo</label>--}}
    {{--                                                    <input type="file" name="arquivo[]" multiple class="form-control" id="exampleInputEmail1"  placeholder="Categoria" required>--}}

    {{--                                                </div>--}}

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Informações da vaga</label>
                                                        <textarea name="informacao" class="form-control"></textarea>

                                                    </div>
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if(session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif


                                                  

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Cadastrar a vaga</button>
                                                    </div>



                                                </div>
                                                <!-- /.card-body -->
                                                <table class="table table-bordered text-center">
                                            <tbody>
                                            <tr>
                                                <th>Nome da vaga</th>
                                                <th>Apagar</th>
                                                

                                            </tr>
                                            @foreach($vagas as $values)
                                                <tr>

                                                    <td>
                                                     <a href="{{url('deparacurriculo/'.$values->id)}}">   {{$values->vaga}} </a>
                                                    </td>
                                                    <td>
                                                    <a href="{{url('apagavaga/'.$values->id)}}"  class="btn btn-block btn-danger btn-xs">Apagar</a>
                                                    
                                                    </td>
                                                   
                                                    

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>

                                            </form>
                                        </div>
                                        <!-- /.card -->
                                      




                                    </div>
                                    <!--/.col (left) -->
                                    <!-- right column -->

                                    <!--/.col (right) -->
                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section>
                    </div>
                </div>
            </div>
    </div>
@stop
