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

    @include('user.layout.navbar')
    <!-- 🛠 Skills -->
    <main class="edit-profile-container1">
        <div class="page-header1">
            <h1 class="page-title1">Skills</h1>
        </div>
        <form class="profile-form1" action="{{ route('addeduaction') }}" method="post">
            @csrf
            <div class="form-section1">
                <h2 class="section-title1"><i class="fas fa-code"></i> Skills</h2>
                <div class="form-group">
                    <label for="skills">Your Skills (comma separated)</label>
                    <textarea name="skills" id="skills" class="form-control form-textarea"
                        placeholder="e.g. Laravel, Vue.js, MySQL">{{ old('skills', $skillString) }}</textarea>
                    @error('skills') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- button  -->
            <div class="action-buttons">
                <a href="{{ route('user.profile') }}">
                    <button type="button" class="btn1"
                        style="border:var(--primary-blue) 2px solid; color: var(--primary-blue);">Cancel</button>
                </a>
                <button type="submit" class="btn1 btn-primary">Save Changes</button>

            </div>
        </form>
    </main>
    @include('user.layout.footer')
</body>

</html>