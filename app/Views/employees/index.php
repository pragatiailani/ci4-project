<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .pfp{
            height: 100px;
            width: 80px;
            border: 2px solid black;
            position: relative;
        }
        .pfp img{
            cursor: pointer;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .pfp::before{
            content: "Change";
            text-align: center;
            font-size: 0.7em;
            bottom: 0;
            color: white;
            padding: 0.2em;
            width: 100%;
            /* height: 20%; */
            background: rgba(0,0,0,0.7);
            position: absolute;
            opacity: 0;
            transition: all 0.2s ease-in-out;
        }
        .pfp:hover::before{
            opacity: 1;
        }
    </style>

</head>
<body class="p-4">
    <h1 class="text-center">
        Employee List &nbsp;
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmp">
Add New Employee</a>
    </h1>
    <table class="table table-hover mt-5">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Profile</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Field</th>
            <th scope="col">Joining Date</th>
            <th scope="col">Action</th>
        </tr>
        <?php foreach ($employees as $employee) : ?>
            <tr>
                <td><?= $employee['id']; ?></td>
                <td>
                    <div class="pfp">
                        <img src="<?=base_url() . $employee['pfp']?>" alt="Profile Picture" class="edit-img" data-id="<?=$employee['id'];?>" data-bs-toggle="modal" data-bs-target="#editImage">
                    </div>
                </td>
                <td><?= $employee['firstName']; ?></td>
                <td><?= $employee['lastName']; ?></td>
                <td><?= $employee['email']; ?></td>
                <td><?= $employee['field']; ?></td>
                <td><?= $employee['joinDate']; ?></td>
                <td>
                    <a class="btn btn-primary edit-button" data-id="<?=$employee['id'];?>" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                    <a class="btn btn-danger" href="/module2/delete/<?= $employee['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- ADD EMPLOYEE MODAL -->
    <div class="modal fade" id="addEmp" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">Add a new employee</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <form action="/module2/create" method="post" enctype="multipart/form-data">

                <label class="form-label">Profile Picture: </label>
                <input type="file" class="form-control" name="pfp">

                <label class="form-label">First Name: </label>
                <input type="text" class="form-control" name="fname">

                <label class="form-label">Last Name: </label>
                <input type="text" class="form-control" name="lname">

                <label class="form-label">Email: </label>
                <input type="email" class="form-control" name="email">

                <label class="form-label">Department: </label>
                <input type="text" class="form-control" name="field">

                <label class="form-label">Joining Date: </label>
                <input type="date" class="form-control" name="jdate">
                
                <button type="submit" name="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- UPDATE EMPLOYEE MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">Edit Information</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <!-- <form id="editForm"> -->
            <form action="/module2/update/<?= $employees['id']; ?>" method="post" id="editForm">

                <label class="form-label">First Name: </label>
                <input type="text" id="fname" class="form-control" name="fname">

                <label class="form-label">Last Name: </label>
                <input type="text" id="lname" class="form-control" name="lname">

                <label class="form-label">Email: </label>
                <input type="email" id="email" class="form-control" name="email">

                <label class="form-label">Department: </label>
                <input type="text" id="field" class="form-control" name="field">

                <label class="form-label">Joining Date: </label>
                <input type="date" id="jdate" class="form-control" name="jdate">
                
                <button type="submit" name="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    

    <!-- UPDATE EMPLOYEE PROFILE -->
    <div class="modal fade" id="editImage" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">Change Profile Picture</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <form action="/module2/pfp/<?= $employees['id']; ?>" method="post" id="changePfp" enctype="multipart/form-data">

                <label class="form-label">New Profile Picture: </label>
                <input type="file" id="pfp" class="form-control" name="pfp">

                <button type="submit" name="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
        </div>
    </div>
    </div>


    <!-- JavaScript code -->
    <script>
        $(document).ready(function() {
            // Edit button click event
            employeeId = null;
            $('.edit-button').click(function() {
                // console.log("clicked");
                employeeId = $(this).data('id');

                // AJAX request to get employee data
                $.ajax({
                    url: '/module2/edit/' + employeeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(employeeId);
                        // console.log(response);
                        
                        // Populate the edit form with employee data
                        $('#fname').val(response.employees.firstName);
                        $('#lname').val(response.employees.lastName);
                        $('#email').val(response.employees.email);
                        $('#field').val(response.employees.field);
                        
                        var joinDate = new Date(response.employees.joinDate);
                        var formattedDate = joinDate.toISOString().split('T')[0];
                        $('#jdate').val(formattedDate);

                    },
                    error: function(xhr, status, error) {
                        console.log(status); // Log the detailed error message to the console
                        alert('Error occurred. Please try again.');
                    }
                });
            });
            // Edit form submit event
            $('#editForm').submit(function(e) {
                e.preventDefault();
                
                // console.log("employeeId");
                // Get the form data
                var formData = $(this).serialize();
                
                // console.log(formData);

                // AJAX request to update employee data
                $.ajax({
                    url: '/module2/update/' + employeeId,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert('Error occurred. Please try again.');
                        }
                    },
                    error: function() {
                        alert('Error occurred. Please try again.');
                    }
                });
            });


            $('.edit-img').click(function() {
                employeeId = $(this).data('id');
                console.log(employeeId);
            });
            
            // Edit form submit event
            $('#changePfp').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: '/module2/pfp/' + employeeId,
                    type: 'POST',
                    data: formData,
                    dataType: 'text',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var filePath = response.trim();

                        if (filePath) {
                            // console.log("File path:", filePath);
                            location.reload();
                        } else {
                            alert('Error occurred. Please try again. Invalid response: ' + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);
                        alert('Error occurred. Please try again.2');
                    }
                });
            });

        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>
