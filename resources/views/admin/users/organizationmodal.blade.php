<div class="modal fade " id="ModalEdit{{ $organization->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Organization</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.organizations.edit', $organization) }}" method="PATCH">



                    @csrf
                    <input type="hidden" value="{{ $organization->id }}" name="volunteer_id">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Organization Name
                        </label>

                        <input name="organization_name" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{ $organization->organization_name }}" required>
                        <div class="invalid-feedback">
                            Please enter opportunity name
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput">Email
                        </label>
                        <input name="email" type="text" class="form-control" id="formGroupExampleInput"
                            value="{{ $organization->email }}" required>
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
