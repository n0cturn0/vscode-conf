@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Criando produto</h1>
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
                                            <h3 class="card-title">Enviar imagens para esse produto</h3>

                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form method="POST" action="{{url('cadastracv')}}" enctype="multipart/form-data">
                                            <div class="card-body">
                                                @csrf
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
                                                <input type="hidden" name="idproduto" value="{{$id}}">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Enviar arquivo</label>
                                                    <input type="file" name="arquivo[]" multiple class="form-control" id="exampleInputEmail1"  placeholder="Categoria" required>

                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Enviar imagens</button>
                                                </div>



                                            </div>
                                            <!-- /.card-body -->


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
