<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/seeker/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seeker/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- Header -->

    @include('user.layout.navbar')
    <!-- Edit Profile Content -->
    <main class="edit-profile-container1">
        <div class="page-header1">
            <h1 class="page-title1">Edit Profile</h1>
        </div>

            <!-- 🎓 Education -->
            <div class="form-section1">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <h2 class="section-title1"><i class="fas fa-graduation-cap"></i> Education</h2>
                <form action="{{ route('deleteProfileEducation', ['id' => $id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn1"
                        style="color: white; background-color: red;margin-left: 30px; padding: 10px; min-width: fit-content;">
                        <i class="fas fa-trash"></i> Remove
                    </button>
                </form>
                
        <form class="profile-form1" action="{{ route('UpdateProfileEducation', ['id' => $id]) }}" method="post">
            @csrf
                <div class="education-item1">
                    <div class="form-row1">
                        <div class="form-group">
                            <label>Institution</label>
                            <input type="text" name="edu_institution" class="form-control"
                                placeholder="e.g. Stanford University" value="{{ $userEducation->institute_name }}">
                            @error('edu_institution') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="edu_location" class="form-control" placeholder="e.g. Stanford, CA"
                                value="{{ $userEducation->location }}">
                            @error('edu_location') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-row1">
                        <div class="form-group">
                            <label>Degree</label>
                            <input type="text" name="edu_degree" class="form-control"
                                placeholder="e.g. Master of Computer Science"
                                value="{{ $userEducation->degree_title }}">
                            @error('edu_degree') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Dates</label>
                            <input type="text" name="edu_dates" class="form-control" placeholder="e.g. 2015 - 2017"
                                value="{{ $userEducation->years }}">
                            @error('edu_dates') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="edu_description" class="form-control form-textarea"
                            placeholder="Thesis or specialization">{{ $userEducation->description }}</textarea>
                        @error('edu_description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>


            <!-- ✅ Submit -->
            <div class="action-buttons">
                <a href="{{ route('user.profile') }}">
                    <button type="button" class="btn1"
                        style="border:var(--primary-blue) 2px solid; color: var(--primary-blue);">Cancel</button>
                </a>
                <button type="submit" class="btn1 btn-primary">Update</button>
            </div>
        </form>


    </main>

    <!-- Footer -->

    @include('user.layout.footer')


</body>

</html>