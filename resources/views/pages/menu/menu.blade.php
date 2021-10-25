@extends('layouts.default')

@section('content')
<div class="col-sm-8 px-0">
    <div class="row">
        <div class="col-sm-5 align-self-center ml-3 pb-3 px-0 text-center search-menu">
            <form action="/menu">
                <input class="col py-3" type="search" name="search" value="{{ request('search') }}"
                    placeholder="search menu...">
            </form>
        </div>
    </div>
    <!-- panna cotta -->
    <div class="title-menus">
        <h2 class="font-weight-bold">Panna Cotta</h2>
        <hr class="divider my-0 mb-3">
    </div>
    <div class="row px-3">
        <div class="row table-menu p-0 ml-0 col">
            <table class="w-100">
                <tr>
                    <th>NO</th>
                    <th class="p-0">NAME</th>
                    <th>PRICE</th>
                    <th class="p-0 text-center">PHOTO</th>
                    <th class="text-center colom-action">ACTION</th>
                </tr>
                @php
                $no = 1;
                @endphp
                @forelse ($pannacotta as $pc)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td class="p-0">{{ $pc->name }}</td>
                    <td>@currency($pc->price)</td>
                    <td class=" p-0 text-center"><img class="img-pc" src="{{ asset( $pc->photo) }}" alt="">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('menu.edit', $pc->id) }}" class="btn-edit">EDIT</a>
                        <form class="d-inline ml-2" action="{{ route('menu.destroy', $pc->id )}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn-delete"
                                onclick="return confirm('Yakin Ingin Menghapus Menu ini ?')">DELETE</button>
                        </form>
                    </td>
                </tr>
                @empty
                <td>
                    <p>Menu not availible</p>
                </td>
                @endforelse
            </table>
        </div>

    </div>
    <!-- end panna cotta -->

    <!-- drinks 1 liters-->
    <div class="title-menus mt-4">
        <h2 class="font-weight-bold">1 Liter</h2>
        <hr class="divider my-0 mb-3">
    </div>
    <div class="row px-3">
        <div class="row table-menu p-0 ml-0 col">
            <table class="w-100">
                <tr>
                    <th>NO</th>
                    <th class="p-0">NAME</th>
                    <th>PRICE</th>
                    <th class="text-center w-25">PHOTO</th>
                    <th class="text-center colom-action">ACTION</th>
                </tr>
                @php
                $no = 1;
                @endphp
                @forelse ($liters as $liter)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td class="p-0">{{ $liter->name }}</td>
                    <td>@currency($liter->price)</td>
                    <td class="p-0 w-25 text-center"><img class="img-liter" src="{{ asset($liter->photo) }}" alt="">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('menu.edit', $liter->id) }}" class="btn-edit">EDIT</a>
                        <form class="d-inline ml-2" action="{{ route('menu.destroy', $liter->id )}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn-delete"
                                onclick="return confirm('Yakin Ingin Menghapus Menu ini ?')">DELETE</button>
                        </form>
                    </td>
                </tr>
                @empty
                <td>
                    <p>Menu not availible</p>
                </td>
                @endforelse
            </table>
        </div>

    </div>
    <!-- end drinks 1l -->

    <!-- drinks 250 ml -->
    <div class="title-menus mt-4">
        <h2 class="font-weight-bold">250 Mililiters</h2>
        <hr class="divider my-0 mb-3">
    </div>
    <div class="row px-3">
        <div class="row table-menu p-0 ml-0 col">
            <table class="w-100">
                <tr>
                    <th>NO</th>
                    <th class="p-0">NAME</th>
                    <th>PRICE</th>
                    <th class="text-center w-25">PHOTO</th>
                    <th class="text-center colom-action">ACTION</th>
                </tr>
                @php
                $no = 1;
                @endphp
                @forelse ($mililiters as $mililiter)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td class="p-0">{{ $mililiter->name }}</td>
                    <td>@currency($mililiter->price)</td>
                    <td class="p-0 w-25 text-center"><img class="img-mililiter" src="{{ asset( $mililiter->photo) }}"
                            alt=""></td>
                    <td class="text-center">
                        <a href="{{ route('menu.edit', $mililiter->id) }}" class="btn-edit">EDIT</a>
                        <form class="d-inline ml-2" action="{{ route('menu.destroy', $mililiter->id )}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn-delete"
                                onclick="return confirm('Yakin Ingin Menghapus Menu ini ?')">DELETE</button>
                        </form>
                    </td>
                </tr>
                @empty
                <td>
                    <p>Menu not availible</p>
                </td>
                @endforelse
            </table>
        </div>

    </div>
    <!-- end drinks 250 ml-->

</div>
@endsection