@extends('admin.pages.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Create New Ad</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/cms.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-blue: #0a66c2;
            --dark-blue: #084482;
            --light-blue: #e6f0ff;
            --white: #ffffff;
            --dark-gray: #333333;
            --medium-gray: #666666;
            --light-gray: #f5f5f5;
            --sidebar-bg: #2c3e50;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --purple: #6f42c1;
            --teal: #20c997;
        }

        .red{
            color: var(--danger);
            font: 700;
        }

        /* Main Content */
        /* .main-content1 {
            flex: 1;
            margin-left: 250px;
            padding-top: 70px;
        } */

        .content-container {
            padding: 30px;
        }

        

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            color: var(--primary-blue);
        }

        .cms-actions {
            display: flex;
            gap: 15px;
        }

        .cms-btn {
            padding: 10px 20px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cms-btn:hover {
            background-color: var(--dark-blue);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary-blue);
            color: var(--primary-blue);
            padding: 10px 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-outline:hover {
            background-color: var(--light-blue);
        }

        /* Form Styles */
        .form-container {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-blue);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .form-group1 {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: var(--white);
            font-size: 14px;
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px rgba(10, 102, 194, 0.2);
        }

        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-radio-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group1 {
            flex: 1;
        }

        .file-upload {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload:hover {
            border-color: var(--primary-blue);
            background-color: var(--light-blue);
        }

        .file-upload i {
            font-size: 40px;
            color: var(--medium-gray);
            margin-bottom: 15px;
        }

        .file-upload p {
            margin-bottom: 15px;
            color: var(--medium-gray);
        }

        .upload-btn {
            background-color: var(--primary-blue);
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            display: inline-block;
        }

        .preview-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .preview-box {
            width: 200px;
            height: 150px;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }

        .preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-remove {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .budget-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .budget-card {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 15px;
        }

        .budget-title {
            font-size: 14px;
            color: var(--medium-gray);
            margin-bottom: 8px;
        }

        .budget-value {
            font-size: 18px;
            font-weight: 600;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background-color: var(--dark-blue);
        }

        .btn-secondary {
            background-color: var(--medium-gray);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: var(--dark-gray);
        }

        /* Footer */
        footer {
            background-color: var(--dark-gray);
            color: var(--white);
            padding: 30px 20px;
            margin-top: 30px;
            width: calc(100% - 250px);
            margin-left: 250px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .copyright {
            font-size: 14px;
            color: #aaa;
        }

        .version {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 3px 10px;
            font-size: 12px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: visible;
            }

            .sidebar-title,
            .sidebar-menu span {
                display: none;
            }

            .sidebar-menu a {
                justify-content: center;
                padding: 15px;
            }

            .sidebar-menu a i {
                margin-right: 0;
                font-size: 20px;
            }

            .main-content1 {
                margin-left: 70px;
            }

            footer {
                width: calc(100% - 70px);
                margin-left: 70px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .cms-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Main Content -->
    @section('contant')
        @if(session('success'))
            <Span style="color: var(--success)">{{ $message }}</Span>
        @endif
        <main class="main-content1">
            <div class="content-container">
                <div class="page-header">
                    <h1 class="page-title">Create New Ad Campaign</h1>
                    <div class="cms-actions">
                        <button class="btn-outline">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button class="cms-btn">
                            <i class="fas fa-save"></i> Save Draft
                        </button>
                    </div>
                </div>

                <!-- Campaign Details Form -->
                <div class="form-container">
                    <form id="create-ad-form" action="{{ route('admin.ads.createdata') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Campaign Information Section -->
                        <div class="form-section">
                            <h2 class="section-title">Campaign Information</h2>
                            <div class="form-grid">
                                <div class="form-group1">
                                    <label class="form-label">Campaign Name *</label>
                                    <input type="text" class="form-input" placeholder="Enter campaign name"
                                        name="campaign_name" required value="{{ old('campaign_name') }}">
                                    @error('campaign_name') <span class="red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group1">
                                    <label class="form-label">Ad Type *</label>
                                    <div class="form-radio-group">
                                        <div class="radio-item">
                                            <input type="radio" id="type-banner" name="ad_type" value="banner" {{old('ad_type') == 'banner' ? 'checked' : '' }}>
                                            <label for="type-banner">Banner Ad</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="type-sponsored" name="ad_type" value="sponsored" {{old('ad_type') == 'sponsored' ? 'checked' : '' }}>
                                            <label for="type-sponsored">Sponsored Content</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="type-popup" name="ad_type" value="popup" {{old('ad_type') == 'popup' ? 'checked' : '' }}>
                                            <label for="type-popup">Popup Ad</label>
                                        </div>
                                    </div>
                                    @error('ad_type') <span class="red">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group1">
                                    <label class="form-label">Status *</label>
                                    <select class="form-select" name="status">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="paused" {{ old('status') == 'paused' ? 'selected' : '' }}>Paused
                                        </option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                    </select>
                                    @error('status') <span class="red">{{ $message }}</span> @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group1">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-textarea"
                                        placeholder="Describe your ad campaign">{{ old('description') }}</textarea>
                                    @error('description') <span class="red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Ad Content Section -->
                        <div class="form-section">
                            <h2 class="section-title">Ad Content</h2>
                            <div class="form-grid">
                                <!-- Headline -->
                                <div class="form-group1">
                                    <label class="form-label">Headline *</label>
                                    <input type="text" name="headline" class="form-input" placeholder="Enter ad headline"
                                        required value="{{ old('headline') }}">
                                    @error('headline') <span class="red">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group1">
                                    <label class="form-label">Description Text *</label>
                                    <textarea name="ad_description" class="form-textarea" placeholder="Enter ad description"
                                        required>{{ old('ad_description') }}</textarea>
                                    @error('ad_description') <span class="red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group1">
                                    <label class="form-label">Call to Action *</label>
                                    <input type="text" name="cta" class="form-input"
                                        placeholder="e.g. Apply Now, Learn More" value="{{ old('cta') }}">
                                    @error('cta') <span class="red">{{ $message }}</span> @enderror
                                </div>

                                <!-- Destination URL -->
                                <div class="form-group1">
                                    <label class="form-label">Destination URL *</label>
                                    <input type="url" name="destination_url" class="form-input"
                                        placeholder="https://example.com" value="{{ old('destination_url') }}">
                                    @error('destination_url') <span class="red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Upload Image -->
                            <div class="form-group1">
                                <label class="form-label">Ad Creative *</label>
                                <input type="file" name="creative_image" class="form-input" accept="image/*" required>
                                @error('creative_image') <span class="red">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Targeting & Scheduling Section -->
                        <div class="form-section">
                            <h2 class="section-title">Targeting & Scheduling</h2>
                            <div class="form-grid">
                             <div class="form-group1">
    <label class="form-label">Target Audience</label>
    <div class="checkbox-group">
        <div class="checkbox-item">
            <input type="checkbox" id="target-job-seekers" name="target_audience[]" value="job_seekers" checked>
            <label for="target-job-seekers">Job Seekers</label>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" id="target-employers" name="target_audience[]" value="employers">
            <label for="target-employers">Employers</label>
        </div>
        <div class="checkbox-item">
            <input type="checkbox" id="target-recruiters" name="target_audience[]" value="recruiters">
            <label for="target-recruiters">Recruiters</label>
        </div>
    </div>
    @error('target_audience')
        <span class="red">{{ $message }}</span>
    @enderror
</div>



                                <div class="form-row">
                                    <div class="form-group1">
                                        <label class="form-label">Start Date *</label>
                                        <input type="date" name="start_date" class="form-input"
                                            value="{{ old('start_date') }}">
                                        @error('start_date') <span class="red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group1">
                                        <label class="form-label">End Date *</label>
                                        <input type="date" name="end_date" class="form-input" value="{{ old('end_date') }}">
                                        @error('end_date') <span class="red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Budget Section -->
                        <div class="form-section">
                            <h2 class="section-title">Budget & Pricing</h2>
                            <div class="budget-grid">
                                <div class="budget-card">
                                    <div class="budget-title">Total Budget *</div>
                                    <div class="budget-value">$<input type="number" class="form-input"
                                            style="width: 100px; display: inline;" min="0" step="50"  value="{{ old('total_budget', 1000) }}"
                                            name="total_budget"></div>
                                             @error('total_budget') <span class="red">{{ $message }}</span> @enderror
                                </div>

                                {{-- <div class="budget-card">
                                    <div class="budget-title">Daily Budget</div>
                                    <div class="budget-value">$<input type="number" class="form-input"
                                            style="width: 100px; display: inline;" min="0" step="10" value="50"></div>
                                </div> --}}

                                <div class="budget-card">
    <div class="budget-title">Bid Strategy</div>
    <select class="form-select" name="bid_strategy">
        <option value="cpc">Cost Per Click (CPC)</option>
        <option value="cpm">Cost Per 1000 Impressions (CPM)</option>
        <option value="cpa">Cost Per Action (CPA)</option>
    </select>
    @error('bid_strategy')
        <span class="red">{{ $message }}</span>
    @enderror
</div>


                               <div class="budget-card">
    <div class="budget-title">Bid Amount</div>
    <div class="budget-value">
        $<input type="number" name="bid_amount" class="form-input"
            style="width: 80px; display: inline;" min="0.1" step="0.1" value="1.50">
    </div>
    @error('bid_amount')
        <span class="red">{{ $message }}</span>
    @enderror
</div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="button" class="btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-rocket"></i> Launch Campaign
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </main>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // File upload functionality
            const uploadArea = document.getElementById('upload-area');
            const fileInput = document.getElementById('file-input');
            const previewContainer = document.getElementById('preview-container');

            uploadArea.addEventListener('click', () => {
                fileInput.click();
            });

            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = var(--primary - blue);
                uploadArea.style.backgroundColor = var(--light - blue);
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.style.borderColor = '#ddd';
                uploadArea.style.backgroundColor = '';
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = '#ddd';
                uploadArea.style.backgroundColor = '';

                if (e.dataTransfer.files.length) {
                    handleFiles(e.dataTransfer.files);
                }
            });

            fileInput.addEventListener('change', () => {
                if (fileInput.files.length) {
                    handleFiles(fileInput.files);
                }
            });

            function handleFiles(files) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (!file.type.match('image.*')) continue;

                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const previewBox = document.createElement('div');
                        previewBox.className = 'preview-box';

                        const img = document.createElement('img');
                        img.src = e.target.result;

                        const removeBtn = document.createElement('div');
                        removeBtn.className = 'preview-remove';
                        removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                        removeBtn.addEventListener('click', () => {
                            previewContainer.removeChild(previewBox);
                        });

                        previewBox.appendChild(img);
                        previewBox.appendChild(removeBtn);
                        previewContainer.appendChild(previewBox);
                    };

                    reader.readAsDataURL(file);
                }
            }

            // Form submission
            const form = document.getElementById('create-ad-form');
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Get form data
                const formData = new FormData(form);
                const campaignData = {
                    name: form.querySelector('[placeholder="Enter campaign name"]').value,
                    type: form.querySelector('input[name="ad-type"]:checked').value,
                    status: form.querySelector('.form-select').value,
                    // Add other form fields
                };

                // In a real app, this would send data to the server
                alert(`Campaign "${campaignData.name}" created successfully!`);

                // Redirect to ads management page
                window.location.href = 'admin-ads.html';
            });

            // Cancel button
            document.querySelectorAll('.btn-secondary, .btn-outline').forEach(btn => {
                btn.addEventListener('click', () => {
                    if (confirm('Are you sure you want to cancel? All unsaved changes will be lost.')) {
                        window.location.href = 'admin-ads.html';
                    }
                });
            });
        });
    </script>
</body>

</html>