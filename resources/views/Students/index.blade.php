<!-- resources/views/Students/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <a href="{{ url('/students/create') }}" class="btn btn-primary">Create Student</a>
    <div class="container mt-5">
        <h2 class="text-center">Student List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Age</th>
                    <th>Actions</th> <!-- Column for actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->mobilenumber }}</td>
                        <td>{{ $student->age }}</td>
                        <td>
                            <a href="{{ url('/students/'.$student->id.'/edit') }}" class="btn btn-warning">Edit</a>
                            <form action="{{ url('/students/'.$student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</body>
</html>
