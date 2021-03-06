@extends('layouts.profile')

@section('content')

<section>
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Demande de poste à quai</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Demande de poste à quai</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Navire</th>
                                            <th>Transitaire </th>
                                            <th>Armateur </th>
                                            <th>Consignataire </th>
                                            <th>Provenance </th>
                                            <th>E.T.D </th>
                                            <th>Valide</th>
                                        </tr>
                                    </thead>
                                    @foreach($formulaires as $formulaire)
                                        <tbody>
                                            <td> <a href="#bannerformmodal" data-toggle="modal" data-target="#modal-<?php echo $formulaire->id;?>">{{$formulaire->champs['nom_navire']}} </a></td>
                                            <td>{{$formulaire->champs['transitaire']}}</td>
                                            <td>{{$formulaire->champs['armateur']}}</td>
                                            <td>{{$formulaire->champs['consignataire']}}</td>
                                            <td>{{$formulaire->champs['provenance']}}</td>
                                            <td>{{$formulaire->champs['date']}}</td>


                                        <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo $formulaire->id;?>" aria-hidden="true" id="modal-<?php echo $formulaire->id;?>">
                                                     <div class="modal-dialog modal-lg">
                                                         <div class="modal-content">
                                                             <div class="modal-content">
                                                                 <div class="modal-header">
                                                                     <h4 class="modal-title" id="myModalLabel">Information sur la navire</h4>
                                                                 </div>
                                                                 <div class="modal-body">

                                                                         <div >
                                                                             <ul class="list-group">
                                                                                    <li class="list-group-item">IMO  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['imo']}}  </span></li>
                                                                                     <li class="list-group-item">Cargaison  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['cargaison']}}  </span></li>
                                                                                     <li class="list-group-item">Nature du marchandise :<span class="label label-default" style="float: right;"> {{$formulaire->champs['marchandise']}}  </span></li>
                                                                                     <li class="list-group-item">Mode de conditionnement  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['m_conditionnement']}}  </span></li>
                                                                                     <li class="list-group-item">Tonnage  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['tonnage']}}  </span></li>
                                                                                     <li class="list-group-item">Type du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['type']}}  </span></li>
                                                                                     <li class="list-group-item">La rade actuelle  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['rade']}}  </span></li>
                                                                                     <li class="list-group-item">Paviollon du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['pavillon']}}  </span></li>
                                                                                     <li class="list-group-item">Longeur du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['longeur_navire']}}  </span></li>
                                                                                 <li class="list-group-item">Longeur du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['largeur_navire']}}  </span></li>
                                                                                 <li class="list-group-item">Longeur du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['tirant_eau']}}  </span></li>
                                                                             </ul>
                                                                         </div>

                                                                 </div>
                                                                 <div class="modal-footer">
                                                                     <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                               <td>
                                                   @if($formulaire->valide)
                                                   <span class="badge badge-success">valide</span>
                                                   @else
                                                   <span class="badge badge-dark">non valide</span>
                                                   @endif
                                               </td>
                                            <td style="display: flex;" >
                                                @can('demande_de_poste_a_quai-validate')
                                                    <a href="{{ route('poste_quais.show', $formulaire->id) }}" class="btn btn-sm btn-primary" role="button" style="margin-right: 3px;">Consulter</a>
                                                @endcan
                                                @can('demande_de_poste_a_quai-create')
                                                    <a href="{{ route('poste_quais.edit', $formulaire->id) }}" class="btn btn-sm btn-info" role="button" style="margin-right: 3px;">Modifier</a>
                                                @endcan
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['poste_quais.destroy', $formulaire->id] ]) !!}
                                                {!! Form::submit('Supprimer', ['class' => 'btn btn-sm btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tbody>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                        @can('demande_de_poste_a_quai-create')
                            <div class="card-footer">
                                <a href="{{ route('poste_quais.create') }}" class="btn btn-info" role="button">Nouveau demande</a>

                             </div>
                        @endcan
                </div>
            </section>
        </div>

@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

