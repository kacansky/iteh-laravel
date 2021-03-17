<x-layout>
    <x-slot name='title'>
        Movie
    </x-slot>
    <div class='container'>
        <div class='row mt-2'>
            <h1>Update {{$movie->title}}</h1>

        </div>
        <div class="row mt-2">
            <div class="col-12">
                <form action="/movies/{{$movie->id}}" method="post">
                    @csrf
                    <label>ID</label>
                    <input type="number" disabled class="form-control" value="{{$movie->id}}">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{$movie->title}}">
                    <label>Length</label>
                    <input type="number" name="length" class="form-control" value="{{$movie->length}}">
                    <label>Plot</label>
                    <textarea name="plot" cols="30" rows="10" class="form-control">
                {{$movie->plot}}

            </textarea>
                    <button class="form-control btn btn-success mt-2">Update</button>
                    <button name='delete' class="form-control btn btn-danger mt-2">Delete</button>
                </form>
            </div>
        </div>
        <div class="row mt-2">
            <h2>Roles</h2>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movie->actors as $actor)
                        <tr>
                            <td>{{$actor->actor->first_name}}</td>
                            <td>{{$actor->actor->last_name}}</td>
                            <td>{{$actor->role}}</td>
                            <td>
                                <form action="/roles/delete" method="post">
                                    @csrf
                                    <input type="text" name='movie_id' hidden value="{{$movie->id}}">
                                    <input type="text" name='actor_id' hidden value="{{$actor->actor->id}}">
                                    <button class="form-control btn btn-danger mt-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <form action="/roles" method="post">
                    @csrf
                    <input type="text" name='movie_id' hidden value="{{$movie->id}}">
                    <label>Actor</label>
                    <select name="actor_id" class='form-control'>
                        @foreach($actors as $actor)
                        <option value="{{$actor->id}}">
                            {{
                            $actor->first_name.' '.$actor->last_name
                            }}
                        </option>
                        @endforeach
                    </select>
                    <label>Role</label>
                    <input type="text" name="role" class="form-control">
                    <button class="form-control btn btn-primary mt-2">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>