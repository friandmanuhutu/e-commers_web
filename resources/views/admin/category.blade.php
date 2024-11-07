<!DOCTYPE html>
<html>
    <head>
        @include('admin.css')

        <style type="text/css">
            input[type="text"] {
                width: 400px;
                height: 50px;
            }

            .div_deg {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 30px;
            }

            .table_deg {
                text-align: center;
                margin: auto;
                border: 1px solid white;
                margin-top: 50px;
                border-collapse: separate;
                border-spacing: 5px; /* Menambahkan jarak antar sel */
            }

            th {
                background-color: #C63C51;
                padding: 15px;
                font-size: 20px;
                font-weight: bold;
                color: white;
                border: 2px solid white; /* Garis putih pada setiap header */
            }

            .category {
                padding: 10px 10px 10px 10px;
                color: white;
                background-color: blue;
                border-radius: 5px;
                text-decoration: none;
            }

            .category:hover {
                color: white;
                background-color: rgb(8, 8, 164);
                text-decoration: none;
            }

            td {
                color: white;
                padding: 10px;
                border: 2px solid white; /* Garis putih pada setiap kotak data */
            }
        </style>


    </head>

  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1 style="color: #fff">ADD CATEGORY</h1>

    <div class="div_deg">
    <form action="{{ url('add_category') }}" method="post">

        @csrf

        <div>
            <input type="text" name="category">

            <input class="btn btn-primary" type="submit" value="Add Category">
        </div>

    </form>
    </div>

    <div>
        <table class="table_deg">
            <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ( $data as $data )

            <tr>
                <td>{{ $data->category_name }}</td>

                <td>
                    <a class="category" href="{{ url('edit_category',$data->id )}}">Edit</a>
                </td>

                <td>
                    <a class="btn btn-danger" onClick="confirmation(event)" href="{{ url('delete_category', $data->id) }}">Delete</a>
                </td>
            </tr>

            @endforeach
        </table>
    </div>


      </div>
    </div>

    @include('admin.js')

  </body>
</html>


