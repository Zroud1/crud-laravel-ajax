
        {{--  --}}
        <div class="modal fade" id="editStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addStudent">edit students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="errors">

                    </div>
                    <div class="row form-group">
                        <label for="name" class=" control-label">name:</label>
                        <input type="text" name="name" id="update_name" class="form-control" />
                        <span class="text-danger" id='update_errorName'> </span>
                        <input type="hidden" name="update_id" id="update_id" value="">
                    </div>
                    <div class="row form-group">
                        <label for="email" class=" control-label">email:</label>
                        <input type="text" name="email" id="update_email"  class="form-control"/>
                        <span class=" text-danger" id='update_errorEmail'> </span>

                    </div>
                    <div class="row form-group">
                        <label for="phone" class=" control-label">phone:</label>
                        <input type="text" name="phone" id="update_phone"  class="form-control"/>
                        <span class=" text-danger" id='update_errorPhone'> </span>

                    </div>
                    <div class="row form-group">
                        <label for="speciality" class=" control-label">speciality:</label>
                        <input type="text" name="speciality" id="update_speciality"  class="form-control cursor" />
                        <span class=" text-danger" id='update_errorSpeciality'> </span>

                    </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary " id='update_student'>update</a>
                </div>
            </div>
            </div>
        </div>

        {{--  --}}
