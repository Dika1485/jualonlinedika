<!DOCTYPE html>
<html lang="en">
<head>
  <title>jualonlinedika - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head>
<body>

<div class="container mt-3">
    <p>
    <ul class="navbar-nav list-group">
        <li class="nav-item list-group-item-active"><a href="/">All Product</a></li>
        <li class="nav-item list-group-item-active"><a href="/paying">Paying</a></li>
        <li class="nav-item list-group-item-active"><a href="/order">Order</a></li>
    </ul>
    </p>
  <form action="/create" method="post">
    @csrf
  <p>
    <div class="table-responsive">
        <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <th>name</th>
                    <td><input type="text" name="title" class="form-control form-control-user" required></td>
                </tr>
                <tr>
                    <th>price</th>
                    <td><textarea type="number" name="description" class="form-control form-control-user" required></textarea></td>
                </tr>
            </tbody>
        </table>
        <center>
        <p>
            <button type="submit" class="btn btn-success btn-md">Insert Product</button>
        </p>
        </center>
    </div>
  </p>
  </form>
  <h2>List of All Product</h2>
  <table id="myTable" class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($produk as $produk)
      <tr>
        <td>{{$produk->id}}</td>
        <td>{{$produk->name}}</td>
        <td>{{$produk->price}}</td>
        <td>
        	<a href="/edit?id={{$produk->id}}" class="btn btn-primary">Edit</a> 
            <form action="/delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$produk->id}}">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

</body>
<script>
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>
</html>