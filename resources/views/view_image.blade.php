<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <h3>View all image</h3>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Image id</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imageData as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>
                        <img src="{{ url('storage/images/' . $data->image) }}" style="height: 100px; width: 150px;">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
