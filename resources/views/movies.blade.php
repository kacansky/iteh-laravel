<x-layout>
    <x-slot name='title'>
        Movies
    </x-slot>
    <div class='container'>
        <div class='row mt-2'>
            <h1>Movies</h1>
        </div>
        <div class='row mt-2'>
            <div class='col-7'>
                <table class='table table-dark'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Length</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $movie)
                        <tr>
                            <td>{{$movie->id}}</td>
                            <td>{{$movie->title}}</td>
                            <td>{{$movie->length}}min</td>
                            <td>
                                <a href="/movies/{{$movie->id}}">
                                    <button class='form-control btn btn-success mt-2'>Update</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class='col-5'>
                <form action="/movies" method="post">
                    @csrf
                    <label>Title</label>
                    <input type="text" name="title" class='form-control'>
                    <label>Length</label>
                    <input type="number" name="length" class='form-control'>
                    <label>Plot</label>
                    <textarea name="plot" cols="30" rows="10" class='form-control'></textarea>
                    <button class='form-control btn btn-primary mt-2'>Create</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>