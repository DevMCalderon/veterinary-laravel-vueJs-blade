@extends('layouts.app')

@section('content')
<div class="card mb-3">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            {{ $pet->name }}
        </div>
        <hr>
    </div>
    <div class="card-body pt-0">

        <div class="row">
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="email">Fecha de nacimiento</label>
                {{ $pet->fecha_nacimiento }}

            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="phone">Color</label>
                {{ $pet->color }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="city">Comentario</label>
                {{ $pet->comentarios }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="address">Alergias</label>
                {{ $pet->alergias }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">Tipo mascota</label>
                {{ $pet->tipoMascota->name }}
            </div>
            <div class="col-md-10 col-lg-6 mb-3">
                <label for="rfc">Raza</label>
                {{ $pet->tipoRaza->name }}
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            Historial Clínico
        </div>
        <hr>
    </div>
    <div class="card-body">
        <table class="table w-100 table-sm">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Peso</th>
                    <th>Temperatura</th>
                    <th>Mucosas</th>
                    <th>Palpitacion Abdominal</th>
                    <th>Síntomas</th>
                    <th>Diagnóstico</th>
                    <th>Receta</th>
                    <th>
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($pet->consultas as $consulta)
                <tr>
                    <td>{{$consulta->created_at}}</td>
                    <td>{{$consulta->peso}} kg</td>
                    <td>{{$consulta->temp}} °c</td>
                    <td>{{$consulta->mucosas}}</td>
                    <td>{{$consulta->palpitacion_abdominal}}</td>
                    <td>{{$consulta->sintomas}}</td>
                    <td>{{$consulta->diagnostico}}</td>
                    <td>{{$consulta->receta}}</td>
                    <td>
                        <div class="d-flex pt-2">
                            <a href="/consulta/{{ $consulta->id }}/imprimir" target="_blank"><i class="far fa-file-pdf text-danger" role="button"></i></a>
                            <a hred="#"><i class="far fa-envelope text-success ms-3 " role="button" onclick="sendMail('{{ $consulta->id }}')"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td  colspan="9">

                            <p class="text-center mb-0">Sin registros</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>
@endsection

@section('scripts')

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    function sendMail(id){
        Toast.fire({
                icon: 'info',
                title: 'Enviando correo...'
            })
        axios.post('/api/consulta/'+id+'/send-mail').then(response => {
            Toast.fire({
                icon: 'success',
                title: 'Información enviada'
            })
        });
    }
</script>

@endsection
