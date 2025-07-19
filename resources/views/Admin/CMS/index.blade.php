@extends('admin.pages.master')
<link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/cms.css') }}">

</head>
<!-- Main Content -->
@section('contant')

    <main class="main-content1">
        <div class="content-container">
            <div class="page-header">
                <h1 class="page-title">Content Management System</h1>
                <div class="cms-actions">
                    <button class="cms-btn">
                        <i class="fas fa-plus"></i> New Page
                    </button>
                    <button class="cms-btn">
                        <i class="fas fa-plus"></i> New Blog Post
                    </button>
                    <button class="cms-btn">
                        <i class="fas fa-sync-alt"></i> Sync Content
                    </button>
                </div>
            </div>

            <!-- CMS Dashboard Cards -->
            <div class="cms-grid1">
                <div class="cms-card1">
                    <div class="cms-card-header1">
                        <div class="cms-card-title">Homepage</div>
                        <div class="cms-status status-published">Published</div>
                    </div>
                    <div class="cms-card-body">
                        <div class="cms-meta">
                            <div class="cms-meta-item">
                                <i class="fas fa-calendar"></i> Updated: 05/15/2023
                            </div>
                            <div class="cms-meta-item">
                                <i class="fas fa-user"></i> By: Admin
                            </div>
                        </div>
                        <p>Main landing page for the CareerConnect platform with featured jobs and company listings.</p>
                    </div>
                    <div class="cms-card-footer">
                        <a href="#" class="action-link">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" class="action-link">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </div>
                </div>

                <div class="cms-card1">
                    <div class="cms-card-header1">
                        <div class="cms-card-title">About Us</div>
                        <div class="cms-status status-published">Published</div>
                    </div>
                    <div class="cms-card-body">
                        <div class="cms-meta">
                            <div class="cms-meta-item">
                                <i class="fas fa-calendar"></i> Updated: 04/28/2023
                            </div>
                            <div class="cms-meta-item">
                                <i class="fas fa-user"></i> By: Admin
                            </div>
                        </div>
                        <p>Company information, mission statement, and team details.</p>
                    </div>
                    <div class="cms-card-footer">
                        <a href="#" class="action-link">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" class="action-link">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </div>
                </div>

                <div class="cms-card1">
                    <div class="cms-card-header1">
                        <div class="cms-card-title">Privacy Policy</div>
                        <div class="cms-status status-published">Published</div>
                    </div>
                    <div class="cms-card-body">
                        <div class="cms-meta">
                            <div class="cms-meta-item">
                                <i class="fas fa-calendar"></i> Updated: 03/15/2023
                            </div>
                            <div class="cms-meta-item">
                                <i class="fas fa-user"></i> By: Legal Team
                            </div>
                        </div>
                        <p>Legal document outlining our privacy practices and user data handling.</p>
                    </div>
                    <div class="cms-card-footer">
                        <a href="#" class="action-link">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" class="action-link">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pages Section -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Website Pages</h2>
                    <button class="cms-btn">
                        <i class="fas fa-plus"></i> Add New Page
                    </button>
                </div>

                <table class="content-table1">
                    <thead>
                        <tr>
                            <th>Page Title</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Last Modified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="content-title">Homepage</td>
                            <td>/index.html</td>
                            <td><span class="cms-status status-published">Published</span></td>
                            <td>2023-05-15</td>
                            <td>
                                <button class="btn1 btn-sm1 btn-primary1">Edit</button>
                                <button class="btn1 btn-sm1 btn-outline1">View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Blog Posts Section -->
            <div class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Blog Posts</h2>
                    <button class="cms-btn">
                        <i class="fas fa-plus"></i> Add New Post
                    </button>
                </div>

                <table class="content-table1">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Publish Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="content-title">How to Write a Resume</td>
                            <td>Career Advice</td>
                            <td><span class="cms-status status-published">Published</span></td>
                            <td>2023-05-20</td>
                            <td>
                                <button class="btn1 btn-sm1 btn-primary1">Edit</button>
                                <button class="btn1 btn-sm1 btn-outline1">View</button>
                                <button class="btn1 btn-sm1 btn-danger1">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Edit buttons
        const editButtons = document.querySelectorAll('.btn-primary1');
        editButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const row = this.closest('tr');
                const title = row.querySelector('.content-title').textContent;
                alert(`Editing: ${title}`);
            });
        });

        // Delete buttons
        const deleteButtons = document.querySelectorAll('.btn-danger1');
        deleteButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const row = this.closest('tr');
                const title = row.querySelector('.content-title').textContent;

                if (confirm(`Are you sure you want to delete "${title}"?`)) {
                    row.style.opacity = '0.5';
                    setTimeout(() => {
                        row.remove();
                    }, 500);
                }
            });
        });
    });
</script>