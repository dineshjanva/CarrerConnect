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

        <!-- 💼 Work Experience -->
        <div class="form-section1">
            @if (session('message'))
                <span>{{ session('message') }}</span>
            @endif
            <h2 class="section-title1"><i class="fas fa-briefcase"></i> Work Experience</h2>
            <form action="{{ route('deleteProfileExperience', ['id' => $id]) }}" method="POST" >
                @csrf
                <button type="submit" class="btn1" style="color: white; background-color: red;margin-left: 30px; padding: 10px; min-width: fit-content;">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </form>

            <form class="profile-form1" action="{{ route('UpdateProfileExperience', ['id' => $id]) }}" method="post">
                @csrf
                <div class="education-item1">
                    <div class="form-row1">
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" name="exp_company" class="form-control"
                                placeholder="e.g. Tech Solutions Inc." value="{{ $userExperience->company_name }}"
                                required>
                            @error('exp_company') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="exp_location" class="form-control"
                                placeholder="e.g. San Francisco, CA" value="{{ $userExperience->location }}" required>
                            @error('exp_location') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-row1">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" name="exp_title" class="form-control" placeholder="e.g. Senior Developer"
                                value="{{ $userExperience->job_title }}" required>
                            @error('exp_title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Dates</label>
                            <input type="text" name="exp_dates" class="form-control"
                                placeholder="e.g. Jan 2020 - Present" value="{{ $userExperience->years }}" required>
                            @error('exp_dates') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="exp_description" class="form-control form-textarea"
                            placeholder="What did you work on?">{{ $userExperience->description }}</textarea>
                        @error('exp_description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
        </div>

       

        <!-- ✅ Submit -->
        <div class="action-buttons">
            <a href="{{ route('user.profile') }}">
            <button type="button" class="btn1"
                style="border:var(--primary-blue) 2px solid; color: var(--primary-blue);">Cancel</button>
            </a>
                <!-- ✅ Use JS-triggered delete form -->
            <!-- <button type="button" class="btn1" style="color: white; background-color: red;"
                    onclick="event.preventDefault(); document.getElementById('delete-exp-form').submit();">
                    <i class="fas fa-trash"></i> Remove
                </button> -->

            <a href="{{ route('user.profile') }}">
                <button type="submit" class="btn1 btn-primary">Save Changes</button>
            </a>
        </div>
        </form>


    </main>
    <!-- Footer -->
    @include('user.layout.footer')


</body>

</html>