@extends('layouts.sigfi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger">SIGFI (Sistema de Gestion Financiera - Version 1.1)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Sistema para administracióm de finanzas personales, en esta version esta disponible: 
                     </br>
                    <ul>
                        <li>Ingreso de compras: disponible producto, monto, cantidad, medida</li>
                        <li>Resumen de compras: Menu para vizualizar compras realizadas</li>
                        <li>Mantenedor de Productos</li>
                        <li>Mantenedor de usuarios</li>
                        <li>Dashboard con numero de productos comprados</li>
                    </ul>
                </div>

                <div class="card-footer bg-transparent">
                    Nuevas funcionalidades para version 1.2: (<b>Fecha lanzamiento 15-08-2020</b>)
                    </br>
                    <ul>
                        <li>Creación de opcion de Pagos, como alternativa al ingreso de compras</li>
                        <li>Modificación de pagina de ingreso al sitio</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
