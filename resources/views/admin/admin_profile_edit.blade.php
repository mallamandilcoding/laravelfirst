@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit profile details</h4>

                        <form action="">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Name" id="example-text-input"
                                        value="{{ $adminData->name}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Email" id="example-text-input"
                                        value="{{ $adminData->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input name="profile_image" class="form-control" placeholder="" id="image"
                                        type="file">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{ asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" value="Update Profile"
                                class="btn btn-roundbtn btn-info waves-effect waves-light">

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>

</div>

<script>
    var fileInput = document.getElementById("image");
    var selectedImage = document.getElementById("showImage");

    fileInput.addEventListener("change", function(event) {
        var file = event.target.files[0]; // Get the selected file
        if (file) {
            var reader = new FileReader(); // Create a new FileReader object

            // Event listener for when the FileReader has successfully read the file
            reader.onload = function(e) {
            // Update the src attribute of the image with the data URL of the selected file
            selectedImage.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file was selected, you can handle it here (e.g., display an error message)
            console.log("No file selected.");
        }
    });


</script>

@endsection