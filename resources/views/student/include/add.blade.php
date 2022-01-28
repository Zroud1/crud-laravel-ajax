   {{-- modal add data --}}
   <div class="modal fade" id="addStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addStudent">add students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row form-group">
                <label for="name" class=" control-label">name:</label>
                <input type="text" name="name" id="name" class="form-control" />
                <span class="text-danger" id='errorName'> </span>
            </div>
            <div class="row form-group">
                <label for="email" class=" control-label">email:</label>
                <input type="text" name="email" id="email"  class="form-control"/>
                <span class=" text-danger" id='errorEmail'> </span>

            </div>
            <div class="row form-group">
                <label for="phone" class=" control-label">phone:</label>
                <input type="text" name="phone" id="phone"  class="form-control"/>
                <span class=" text-danger" id='errorPhone'> </span>

            </div>
            <div class="row form-group">
                <label for="speciality" class=" control-label">speciality:</label>
                <input type="text" name="speciality" id="speciality"  class="form-control cursor" />
                <span class=" text-danger" id='errorSpeciality'> </span>

            </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary " id='add_student'>save</a>
        </div>
    </div>
    </div>
</div>

{{--end modal add data  --}}
