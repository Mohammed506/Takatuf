<div class="modal fade " id="ModalEdit{{ $volunteer->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Edit opportunity') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.volunteers.edit', $volunteer) }}" method="PATCH">



                    @csrf
                    <input type="hidden" value="{{ $volunteer->id }}" name="volunteer_id">
                    <div class="form-group">
                        <label for="formGroupExampleInput">First_name
                        </label>
                        <input name="first_name" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{ $volunteer->first_name }}" required>
                        <div class="invalid-feedback">
                            Please enter opportunity name
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Last_name
                        </label>
                        <input name="last_name" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{ $volunteer->last_name }}" required>
                        <div class="invalid-feedback">
                            Please enter opportunity name
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Username
                        </label>
                        <input name="volunteer_username" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{ $volunteer->volunteer_username }}" required>
                        <div class="invalid-feedback">
                            Please enter opportunity name
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Phonenumber
                        </label>
                        <input name="volunteer_phonenumber" type="text" class="form-control"
                            id="formGroupExampleInput" value="{{ $volunteer->volunteer_phonenumber }}" required>
                        <div class="invalid-feedback">
                            Please enter opportunity name
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Email
                        </label>
                        <input name="email" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{ $volunteer->email }}" required>
                        <div class="invalid-feedback">
                            Please enter opportunity name
                        </div>
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-white" data-bs-dismiss="modal"
                    style="background:#43425d">Cancle</button>
                <input type="submit" class="btn" style="background:#008989 ;color:white" value="Edit">
                </form>
            </div>
        </div>
    </div>
</div>
