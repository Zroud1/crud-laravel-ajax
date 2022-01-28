@extends('layouts.app')
@section('content')

    @include('student.include.add')
    @include('student.include.update')
    @include('student.include.delete')

    <div class="container py-5">
        <div id="success" >

          </div>
        <div class="row">
            <div class="col md-12">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                             <h4 >Students data</h4>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary float-end mr-2" data-bs-toggle="modal" data-bs-target="#addStudent"> Add data</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>speciality</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')

   <script>
       $(document).ready(function(e) {
           // booton success
            $(document).on('click', '#close',function(e){
                $('#success').html('');
                $('#success').removeClass('alert alert-success');
           })


           // get All students

            function fetchStudent() {
                $.ajax({
                     type: "GET",
                    url: "/fetchStudent",
                    dataType: "json",
                    success: function (response) {

                        $.each(response.students, function (key, student) {
                            $('tbody').html();
                            $('tbody').append(
                                `
                                    <tr>
                                        <td>${student.name}</td>
                                        <td>${student.email}</td>
                                        <td>${student.phone}</td>
                                        <td>${student.speciality}</td>
                                        <td>

                                            <input type="hidden" id="id" class="form-control" value="${student.id}">

                                             <button type="button" value="${student.id}"  class="edit_student btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                             <button type="button" value="${student.id}" class="delete_student btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </td>

                                    </tr>
                                `
                            );
                        });
                    }
                });

            };
            fetchStudent();


            // addd student
            $(document).on('click', '#add_student',function(e){
                e.preventDefault();
                var data={
                    'name' :$('#name').val(),
                    'email' :$('#email').val(),
                    'phone' :$('#phone').val(),
                    'speciality' :$('#speciality').val()
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/students",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response.status==400){
                            $("#errorEmail").html(response.errors.email);
                            $("#errorName").html(response.errors.name);
                            $("#errorPhone").html(response.errors.phone);
                            $("#errorSpeciality").html(response.errors.speciality);
                        }else{
                            $('#addStudent').modal('hide');
                            $('#addStudent').find('input').val('');
                            $('#addStudent').find('span').val('');
                            fetchStudent();
                            $('#success').addClass('alert alert-success');
                            $('#success').attr('role', 'alert');
                            $('#success').append(`
                                student added successfully
                                <span id='close' class='float-right' style ='cursor: pointer'><i class="fas fa-times text-success"></i></span>
                            `)

                        }

                    }
                });

            });

            //edit student
            $(document).on('click', '.edit_student',function(e){
                e.preventDefault();

                $.ajax({
                    type: "GET",
                    url:'student/'+$(this).val(),
                    dataType: "json",
                    success: function(data){

                     $.each(data.student,function(key,value){
                        $('#update_name').val(value.name);
                        $('#update_email').val(value.email);
                        $('#update_phone').val(value.phone);
                        $('#update_speciality').val(value.speciality);
                        $('#update_id').val(value.id);
                     })

                    }
                })
                $('#editStudent').modal('show');
            })

                  // update student



            $(document).on('click', '#update_student',function(e){
                e.preventDefault();
                var data={
                    'name' :$('#update_name').val(),
                    'email' :$('#update_email').val(),
                    'phone' :$('#update_phone').val(),
                    'speciality' :$('#update_speciality').val(),
                    'id':$('#update_id').val(),
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "student/"+$('#update_id').val(),
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response.status==400){
                            $('.errors').html('');
                            $.each(response.errors, function(i, error){
                            $('.errors').append(`<ul style='list-style :none'>
                                <li class='alert alert-danger'>${error}</li>
                            </ul>
                            `);
                            })
                        }else {
                            $('#editStudent').modal('hide');
                            $('#editStudent').find('input').val('');
                            $('#editStudent').find('span').val('');
                            fetchStudent();
                            $('#success').addClass('alert alert-success');
                            $('#success').attr('role', 'alert');
                            $('#success').append(`
                               ${response.message}
                                <span id='close' class='float-right' style ='cursor: pointer'><i class="fas fa-times text-success"></i></span>
                            `)

                        }

                    }
                });

            });

            //delete student
            //show model
            $(document).on('click','.delete_student',function(){


               $('#deleteStudent').val($(this).val());
                $('#delete_student_model').modal('show');
            });
            //methode delete
            $(document).on('click','#delete_student',function(e){
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                 $.ajax({
                     type: "DELETE",
                     url:'student/'+ $('#deleteStudent').val(),
                     data:'data',
                     dataType: 'json',
                     success: function(response) {
                        if(response.status==200){
                            $('#success').addClass('alert alert-success');
                            $('#success').attr('role', 'alert');
                            $('#success').append(`
                               ${response.message}
                                <span id='close' class='float-right' style ='cursor: pointer'><i class="fas fa-times text-success"></i></span>
                            `);
                            fetchStudent();
                            $('#delete_student_model').modal('hide');
                        }
                     }
                 })


            });

        });
   </script>



@endsection
