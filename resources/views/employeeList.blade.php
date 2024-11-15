@extends('layouts.layout')
@section('sidebar')
    <x-admin-sidebar pageName="{{ $page_name }}" />
@endsection
@section('main')
    <div class="block">
        <button data-modal-trigger="#ModalCreate" class="col-span-12 rounded-[7px] h-fit border-2 bg-blue-600 border-black overflow-hidden focus-visible:bg-opacity-75">
            <div class="px-6 py-1 rounded-[5px] border-b-4 border-r-2 border-blue-800 text-white">
                Add Employee
            </div>
        </button>
        @foreach ($errors->all() as $item)
            {{ $item . ' |' }}
        @endforeach
        @if (session('msg'))
            {{ session('msg') }}
        @endif
        <div class="table-style w-fit max-h-56">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Division</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}.</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->sex }}</td>
                            <td>{{ $item->division }}</td>
                            <td>
                                <div class="flex flex-nowrap">
                                    <button class="text-blue-600" data-modal-trigger="#ModalEdit" data-edit-id="{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                    <button class="text-red-500" data-modal-trigger="#ModalDelete" data-delete-id="{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <x-modal id="ModalCreate">
                <x-slot name="header">Add New Employee</x-slot>
                <form method="post" class="w-96">
                    @csrf
                    @method('post')
                    <x-input-h id="CreateName" name="name" type="text" label="Name" labelSpan="3" placeholder="Insert Name" />
                    <x-input-h id="CreateDivision" name="division" type="text" label="Division" labelSpan="3" placeholder="Specify Division" />
                    <div class="grid grid-cols-12 py-3">
                        <label class="col-span-3 font-semibold">Gender</label>
                        <div class="cols-span-9 flex items-center">
                            <input type="radio" class="mt-1" name="sex" value="male" id="CreateMale" checked>
                            <label for="CreateMale" class="mr-2">Male</label>
                            <input type="radio" class="mt-1" name="sex" value="female" id="CreateFemale">
                            <label for="CreateFemale">Female</label>
                        </div>
                    </div>
                    <button class="mt-2 col-span-12 rounded-[7px] w-full h-fit border-2 bg-blue-600 border-black overflow-hidden focus-visible:bg-opacity-75">
                        <div class="px-6 py-1 rounded-[5px] border-b-4 border-r-2 border-blue-800 text-white">
                            create
                        </div>
                    </button>
                </form>
            </x-modal>
            <x-modal id="ModalEdit">
                <x-slot name="header">Edit Employee Data</x-slot>
                <form method="post" class="w-96">
                    @csrf
                    @method('put')
                    <x-input-h id="EditName" name="name" type="text" label="Name" labelSpan="3" placeholder="Insert Name" />
                    <x-input-h id="EditDivision" name="division" type="text" label="Division" labelSpan="3" placeholder="Specify Division" />
                    <div class="grid grid-cols-12 py-3">
                        <label class="col-span-3 font-semibold">Gender</label>
                        <div class="cols-span-9 flex items-center">
                            <input type="radio" class="mt-1" name="sex" value="male" id="EditMale">
                            <label for="EditMale" class="mr-2">Male</label>
                            <input type="radio" class="mt-1" name="sex" value="female" id="EditFemale">
                            <label for="EditFemale">Female</label>
                        </div>
                    </div>
                    <button id="EditID" name="id" value="" class="mt-2 col-span-12 rounded-[7px] w-full h-fit border-2 bg-blue-600 border-black overflow-hidden focus-visible:bg-opacity-75">
                        <div class="px-6 py-1 rounded-[5px] border-b-4 border-r-2 border-blue-800 text-white">
                            Edit
                        </div>
                    </button>
                </form>
            </x-modal>
            <x-modal id="ModalDelete">
                <x-slot name="header">Delete Employee</x-slot>
                <form method="post" class="w-96">
                    @csrf
                    @method('delete')
                    <h1 class="mt-1 text-lg">Data will be permanently deleted!!</h1>
                    <button id="DeleteID" name="id" value="" class="mt-2 col-span-12 rounded-[7px] w-full h-fit border-2 bg-red-600 border-black overflow-hidden focus-visible:bg-opacity-75">
                        <div class="px-6 py-1 rounded-[5px] border-b-4 border-r-2 border-red-800 text-white">
                            Confirm
                        </div>
                    </button>
                </form>
            </x-modal>
            <script>
                $(() => {
                    let EditID = $('#EditID');
                    let EditName = $('#EditName');
                    let EditDivision = $('#EditDivision');
                    let EditMale = $('#EditMale');
                    let EditFemale = $('#EditFemale');
                    $('[data-edit-id]').on('click', function() {
                        EditID.val($(this).attr('data-edit-id'));
                        td = $(this).closest('tr').find('td');
                        EditName.val(td[1].innerHTML);
                        EditDivision.val(td[3].innerHTML);
                        if (td[2].innerHTML === 'female') {
                            EditFemale.prop('checked', true);
                        } else {
                            EditMale.prop('checked', true);
                        }
                    })

                    let DeleteID = $('#DeleteID');
                    $('[data-delete-id]').on('click', function() {
                        DeleteID.val($(this).attr('data-delete-id'));
                    })
                })
            </script>
        </div>
    </div>
@endsection
