<x-layout>
    <x-slot name='title'>
        Actors
    </x-slot>
    <div class='container'>
        <div class='row mt-2'>
            <h1>Actors</h1>
        </div>
        <div class='row mt-2'>
            <div class='col-7'>
                <table class='table table-dark'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First name</th>
                            <th>Last name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actors as $actor)
                        <tr>
                            <td>{{$actor->id}}</td>
                            <td>{{$actor->first_name}}</td>
                            <td>{{$actor->last_name}}</td>
                            <td>
                                <form action="/actors/{{$actor->id}}" method="post">
                                    @csrf
                                    <button class='btn btn-danger form-control mt-2'>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class='col-5'>
                <form action="/actors" method="post">
                    @csrf
                    <label>First name</label>
                    <input type="text" name="first_name" class='form-control'>
                    <label>Last name</label>
                    <input type="text" name="last_name" class='form-control'>
                    <button class='form-control btn btn-primary mt-2'>Create</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>