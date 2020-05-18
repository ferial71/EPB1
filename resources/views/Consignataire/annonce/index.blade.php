@extends('layouts.profile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Posts</h3></div>
                    <div class="panel-heading">Page {{ $annonceNavs->currentPage() }} of {{ $annonceNavs->lastPage() }}</div>
                    @foreach ($annonceNavs as $annonceNav)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('annonceNav.show', $annonceNav->id ) }}"><b>{{ $annonceNav->navire_id }}</b><br>
                                    <p class="teaser">
                                        {{  str_limit($annonceNav->DRAFT, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {!! $annonceNavs->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
