@extends('./employees/layout')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('employees/create') }}" class="btn btn-info float-right"><i class="fas fa-plus-circle"></i> Add New </a>
        </div>
    </div>

    <table class="table table-striped table-bordered mt-4">
        <thead>
            <th> ID </th>
            <th> First Name </th>
            <th> Last Name </th>
            <th> Email </th>
            <th> Adress </th>
            <th> Birthdate </th>
            <th> Actions for employee </th>
            <th> Delete </th>
            <th> Updated </th>
        </thead>

        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td> {{ $employee->id }} </td>
                <td> {{ $employee->first_name }} </td>
                <td> {{ $employee->last_name }} </td>
                <td> {{ $employee->email }} </td>
                <td> {{ $employee->address }} </td>
                <td> {{ $employee->birthdate }} </td>
                <td><a href="{{ route('employees.show', $employee->id )}}" class="badge badge-info"> View </a>
                    <a href="{{ route('employees.edit', $employee->id )}}" class="badge badge-success"> Edit </a>
                </td>
                <td>
                    <form action="{{ route('employees.destroy', $employee->id)}}" method="post" float:right>
                     @csrf
                     @method('DELETE')
                        <button class="badge btn-danger" type="submit" style="float:right"> Delete </button>
                   </form>
                    
                </td>
                <td> {{ $employee->updated_at }} </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>