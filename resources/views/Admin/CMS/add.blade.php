@extends('Admin.pages.master')


<title>CareerConnect | Create New Post</title>
<link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/cms.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@section('contant')
    <!-- Main Content -->
    <main class="main-content1">
        <div class="content-container1">
            <div class="page-header">
                <h1 class="page-title">Create New Blog Post</h1>
                <div class="cms-actions">
                    <button class="cms-btn" id="saveDraftBtn">
                        <i class="fas fa-save"></i> Save Draft
                    </button>
                    <button class="cms-btn" id="previewBtn">
                        <i class="fas fa-eye"></i> Preview
                    </button>
                </div>
            </div>

            <!-- New Post Form -->
            <div class="form-container1">
                <div class="form-header">
                    <h2 class="form-title">Blog Post Details</h2>
                </div>

                <div class="form-row1">
                    <div class="form-group1">
                        <label for="postTitle" class="form-label">Post Title</label>
                        <input type="text" id="postTitle" class="form-control" placeholder="Enter post title">
                    </div>

                    <div class="form-group1 half">
                        <label for="postCategory" class="form-label">Category</label>
                        <select id="postCategory" class="form-control">
                            <option value="">Select category</option>
                            <option value="career-advice">Career Advice</option>
                            <option value="industry-insights">Industry Insights</option>
                            <option value="workplace-culture">Workplace Culture</option>
                            <option value="job-search">Job Search Strategies</option>
                            <option value="resume-tips">Resume Tips</option>
                        </select>
                    </div>

                    <div class="form-group1 half">
                        <label for="postStatus" class="form-label">Status</label>
                        <select id="postStatus" class="form-control">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="scheduled">Scheduled</option>
                        </select>
                    </div>

                    <div class="form-group1 half" id="publishDateGroup">
                        <label for="publishDate" class="form-label">Publish Date</label>
                        <input type="text" id="publishDate" class="form-control" placeholder="Select date and time">
                    </div>

                    <div class="form-group1 half">
                        <label for="postTags" class="form-label">Tags</label>
                        <select id="postTags" class="form-control">
                            <option value="resume">Resume</option>
                            <option value="interview">Interview</option>
                            <option value="career">Career</option>
                            <option value="job-search">Job Search</option>
                            <option value="skills">Skills</option>
                            <option value="remote-work">Remote Work</option>
                        </select>
                    </div>

                    <div class="form-group1">
                        <label class="form-label">Featured Image</label>
                        <div class="image-upload" id="imageUploadArea">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Click to upload or drag and drop</p>
                            <p class="small">Recommended size: 1200x630 pixels</p>
                            <img id="previewImage" class="preview-image" alt="Preview">
                            <input type="file" id="featuredImage" accept="image/*" style="display: none;">
                        </div>
                    </div>

                    <div class="form-group1">
                        <label for="postExcerpt" class="form-label">Excerpt</label>
                        <textarea id="postExcerpt" class="form-control" placeholder="Enter a short excerpt for this post"
                            rows="3"></textarea>
                    </div>

                    <div class="form-group1">
                        <label class="form-label">Content</label>
                        <div class="editor-toolbar">
                            <button type="button" title="Bold"><i class="fas fa-bold"></i></button>
                            <button type="button" title="Italic"><i class="fas fa-italic"></i></button>
                            <button type="button" title="Underline"><i class="fas fa-underline"></i></button>
                            <button type="button" title="Heading"><i class="fas fa-heading"></i></button>
                            <button type="button" title="Quote"><i class="fas fa-quote-right"></i></button>
                            <button type="button" title="List"><i class="fas fa-list"></i></button>
                            <button type="button" title="Link"><i class="fas fa-link"></i></button>
                            <button type="button" title="Image"><i class="fas fa-image"></i></button>
                            <button type="button" title="Code"><i class="fas fa-code"></i></button>
                        </div>
                        <div class="editor-content" id="postContent" contenteditable="true">
                            <p>Start writing your blog post here...</p>
                        </div>
                    </div>
                </div>

                <div class="form-footer1">
                    <button class="btn1 btn-outline">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button class="btn1 btn-primary" id="savePostBtn">
                        <i class="fas fa-save"></i> Save Post
                    </button>
                    <button class="btn1 btn-success" id="publishBtn">
                        <i class="fas fa-paper-plane"></i> Publish Now
                    </button>
                </div>
            </div>
        </div>
@endsection

    <!-- Footer -->
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Select2 for tags
        $('#postTags').select2({
            placeholder: "Select tags",
            tags: true,
            tokenSeparators: [',', ' ']
        });

        // Initialize date picker
        flatpickr("#publishDate", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today",
            time_12hr: true
        });

        // Show/hide publish date based on status
        const statusSelect = document.getElementById('postStatus');
        const publishDateGroup = document.getElementById('publishDateGroup');

        function togglePublishDate() {
            if (statusSelect.value === 'scheduled') {
                publishDateGroup.style.display = 'block';
            } else {
                publishDateGroup.style.display = 'none';
            }
        }

        statusSelect.addEventListener('change', togglePublishDate);
        togglePublishDate(); // Initial check

        // Image upload functionality
        const imageUploadArea = document.getElementById('imageUploadArea');
        const featuredImage = document.getElementById('featuredImage');
        const previewImage = document.getElementById('previewImage');

        imageUploadArea.addEventListener('click', function () {
            featuredImage.click();
        });

        featuredImage.addEventListener('change', function (e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    previewImage.src = event.target.result;
                    previewImage.style.display = 'block';
                    imageUploadArea.querySelector('p').textContent = 'Change image';
                };

                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // Drag and drop for image upload
        imageUploadArea.addEventListener('dragover', function (e) {
            e.preventDefault();
            this.style.borderColor = (--primary - blue);
            this.style.backgroundColor = (--light - blue);
        });

        imageUploadArea.addEventListener('dragleave', function () {
            this.style.borderColor = '#ddd';
            this.style.backgroundColor = 'transparent';
        });

        imageUploadArea.addEventListener('drop', function (e) {
            e.preventDefault();
            this.style.borderColor = '#ddd';
            this.style.backgroundColor = 'transparent';

            if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                featuredImage.files = e.dataTransfer.files;

                const reader = new FileReader();

                reader.onload = function (event) {
                    previewImage.src = event.target.result;
                    previewImage.style.display = 'block';
                    imageUploadArea.querySelector('p').textContent = 'Change image';
                };

                reader.readAsDataURL(e.dataTransfer.files[0]);
            }
        });

        // Form actions
        document.getElementById('saveDraftBtn').addEventListener('click', function () {
            alert('Post saved as draft successfully!');
            // In a real app, this would submit the form with draft status
        });

        document.getElementById('previewBtn').addEventListener('click', function () {
            alert('Preview functionality would open in a new tab');
            // In a real app, this would open a preview window
        });

        document.getElementById('savePostBtn').addEventListener('click', function () {
            alert('Post saved successfully!');
            // In a real app, this would submit the form
        });

        document.getElementById('publishBtn').addEventListener('click', function () {
            alert('Post published successfully!');
            // In a real app, this would submit the form with published status
        });
    });
</script>