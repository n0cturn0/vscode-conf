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
                                                <h3 class="card-title">Vaga</h3>

                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form method="POST" action="{{route('criavaga')}}" enctype="multipart/form-data">
                                                <div class="card-body">
                                                
                                                  
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


                                                  

                                              



                                                </div>
                                                <!-- /.card-body -->


                                                @unless(empty($vagas))
                                                <h2>Não existe candidatos ainda para esta vaga</h2>
                                                @endunless
                                                <table class="table table-bordered text-center">
                                            <tbody>
                                            <tr>
                                                <th>Vaga</th>
                                                <th>Nome</th>
                                                <th>Currículo</th>
                                                

                                            </tr>
                                            @foreach($vagas as $values)
                                                <tr>

                                                    <td>
                                                     <a href="">   {{$values->vaga}} </a>
                                                    </td>
                                                    <td> <a href="{{asset('curriculos/'.$values->curriculo)}}"  class="btn btn-block btn-default btn-xs">{{$values->nome}}</a></td>
                                                    <td>
                                                    <a href="{{asset('curriculos/'.$values->curriculo)}}">
                                                        <img width="50"  height="50" src="https://www.techspot.com/images2/downloads/topdownload/2014/05/bullzip-p.webp">
                                                   </a>
                                                    
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
