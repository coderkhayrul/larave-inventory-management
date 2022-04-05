<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer List</title>
</head>
<style>
    .col-header {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    h1 {
        color: rgb(9, 92, 216);
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }

    th {
        /* padding: 5px; */
        background: rgba(1, 37, 240, 0.952);
        color: white;
    }

    tr:hover {
        background: rgba(218, 216, 216, 0.568);
        color: black;
    }

</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-header">
                <h1>All Customer List</h1>
            </div>
            <div class="col-table">
                <table style="width:100%">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postel</th>
                        <th>Country</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($all as $data)
                    <tr>
                        <td>{{ $data->customer_name }}</td>
                        <td>{{ $data->customer_email }}</td>
                        <td>{{ $data->customer_phone }}</td>
                        <td>{{ $data->customer_company }}</td>
                        <td>{{ $data->customer_address }}</td>
                        <td>{{ $data->city }}</td>
                        <td>{{ $data->state }}</td>
                        <td>{{ $data->postal }}</td>
                        <td>{{ $data->country }}</td>
                        <td>
                            @if ($data->status == 1)
                                Active
                            @else
                                InActive
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>
