@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div >
                <h2 class="alert alert-dark text-center" style="color:red; text:bold">Enregistrer vos Dépenses ici !</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success fa fa-plus-circle" href="{{ route('autresdepenses.create') }}"> Ajouter une dépense</a>
            </div>
        </div>
    </div>
   
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif

    @if($message = Session::get('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <p align="center"><strong>{{$message}}</strong></p>
    </div>
    @endif
   
    <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
        <tr class="text-center">
            <th>No</th>
            <th>Date Depense</th>
            <th>Type</th>
            <th>Libelle</th>
            <th>Montant</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($data as $autresdepenses)
        <tbody style="color:black; font:blod; background:#ffff">
            <tr class="text-center">
            <td>{{ ++$i }}</td>
            <td>{{ $autresdepenses->dateDepenses }}</td>
            <td>{{ $autresdepenses->type }}</td>
            <td>{{ $autresdepenses->libelle }}</td>
            <td>{{ $autresdepenses->montant }} Fcfa</td>
            <td width="25%">
                <form action="{{ route('autresdepenses.destroy',$autresdepenses->idDepenses) }}" method="POST">
                <a class="btn btn-info" href="{{ route('autresdepenses.show',$autresdepenses->idDepenses) }}"><span class="fa fa-eye"></a>
                <a class="btn btn-primary" href="{{ route('autresdepenses.edit',$autresdepenses->idDepenses) }}"><span class="fa fa-edit"></span> Editer</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-confirm"><span class="fa fa-trash"></span></button>
                </form>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
    
    <div class="pagination-block">
                            
        {{  $data->appends(request()->input())->links('layouts.paginationlinks') }}
    </div>

    {{-- {!! $data->links() !!} --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
    $('.delete-confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Confirmez-vous la suppression ?`,
            text: "Cet enregistrement et ses détails seront définitivement supprimés!",
            icon: "warning",
            buttons: true,
            buttons: ["Annuler", "Oui!"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            form.submit();
            }
        });
    });
    </script>  
@endsection