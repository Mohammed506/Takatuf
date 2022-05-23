<div class="modal fade " id="ModalEdit{{ $opportunity->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Edit opportunity') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('organization.opportunities.edit', $opportunity) }}" method="PATCH"
                    enctype="multipart/form-data">



                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Opportunity
                            Name</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput"
                            value={{ $opportunity->name }} required>
                        <div class="invalid-feedback">
                            Please enter opportunity name
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Description</label>
                        <textarea name="description" cols="10" rows="5" class="form-control input-lg" id="formGroupExampleInput2"
                            required>{{ $opportunity->description }}</textarea>
                        <div class="invalid-feedback">
                            Please enter a description

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput3">Starting-Date</label>
                        <input name="start" type="date" value="{{ $opportunity->start }}" class="form-control"
                            id="formGroupExampleInput3" required>
                        <div class="invalid-feedback">
                            Please enter starting date

                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="formGroupExampleInput4">Duration</label>
                        <input name="duration" type="number" value="{{ $opportunity->duration }}"
                            class="form-control" id="formGroupExampleInput4" min="1" required>
                        <div class="invalid-feedback">
                            Please enter duration
                        </div>
                    </div>
                    <input type="hidden" name="">
                    <div class="form-group ">
                        <label for="formGroupExampleInput4">Number of
                            seats</label>
                        <input name="seats" value="{{ $opportunity->seats }}" type="number" class="form-control"
                            id="formGroupExampleInput4" min="1" required>
                        <div class="invalid-feedback">
                            Please enter valid number of seats
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label for="formGroupExampleInput4">End-date</label>
                        <input name="finish" type="date" class="form-control" id="formGroupExampleInput4"
                            placeholder="11/11/2021">
                        <div class="invalid-feedback">
                            Please enter finishing date
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="formGroupExampleInput4">Location</label>
                        <input name="location" type="text" value="{{ $opportunity->location }}" class="form-control"
                            id="formGroupExampleInput4" required>
                        <div class=" invalid-feedback">
                            Please enter valid number of seats
                        </div>
                    </div>
                    <div class="form-group">

                        <h6 class="mt-1">Required Gender: </h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female"
                                checked />
                            <label class="form-check-label" for="femaleGender">Female</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" />
                            <label class="form-check-label" for="maleGender">Male</label>
                        </div>



                    </div>
                    <div class="form-group ">
                        <label for="formGroupExampleInput4">Image</label>
                        <input name="image" type="file" class="form-control" id="formGroupExampleInput4" required>
                        <div class="invalid-feedback">
                            Please enter valid image
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="formGroupExampleInput4">Category</label>
                        <select name="category_id" class="form-select" id="formGroupExampleInput4">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please enter duration
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
