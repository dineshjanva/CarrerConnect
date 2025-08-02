@extends('admin.pages.master')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect | Create New Ad</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <style>
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

        .red {
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
    </style> --}}
</head>

<body>

    <!-- Main Content -->
    {{-- @section('contant')
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
                <form id="edit-ad-form" action="{{ route('admin.ads.update', $ad->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Campaign Name -->
                    <div>
                        <label class="form-label">Campaign Name</label>
                        <input type="text" name="campaign_name" class="form-input"
                            value="{{ old('campaign_name', $ad->campaign_name) }}">
                    </div>

                    <!-- Ad Type -->
                    <div>
                        <label class="form-label">Ad Type</label>
                        <div class="flex items-center gap-6">
                            <label>
                                <input type="radio" name="ad_type" value="banner" {{ old('ad_type', $ad->ad_type) ==
                                'banner' ? 'checked' : '' }}>
                                Banner
                            </label>
                            <label>
                                <input type="radio" name="ad_type" value="video" {{ old('ad_type', $ad->ad_type) ==
                                'video' ? 'checked' : '' }}>
                                Video
                            </label>
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" {{ old('status', $ad->status) == 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="paused" {{ old('status', $ad->status) == 'paused' ? 'selected' : '' }}>Paused
                            </option>
                        </select>
                    </div>

                    <!-- Headline -->
                    <div>
                        <label class="form-label">Headline</label>
                        <input type="text" name="headline" class="form-input"
                            value="{{ old('headline', $ad->headline) }}">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="form-label">Description</label>
                        <textarea name="ad_description"
                            class="form-textarea">{{ old('ad_description', $ad->ad_description) }}</textarea>
                    </div>

                    <!-- Call to Action -->
                    <div>
                        <label class="form-label">Call To Action (CTA)</label>
                        <input type="text" name="cta" class="form-input" value="{{ old('cta', $ad->cta) }}">
                    </div>

                    <!-- Destination URL -->
                    <div>
                        <label class="form-label">Destination URL</label>
                        <input type="url" name="destination_url" class="form-input"
                            value="{{ old('destination_url', $ad->destination_url) }}">
                    </div>

                    <!-- Creative Image -->
                    <div>
                        <label class="form-label">Creative Image</label>
                        <input type="file" name="creative_image" class="form-input">
                        @if($ad->creative_image)
                        <img src="{{ asset('storage/' . $ad->creative_image) }}" alt="Creative" class="mt-2 max-h-24">
                        @endif
                    </div>

                    <!-- Target Audience -->
                    <div>
                        <label class="form-label">Target Audience</label>
                        @php
                        $selectedAudience = old('target_audience', json_decode($ad->target_audience ?? '[]', true));
                        @endphp
                        <div class="flex gap-4 flex-wrap">
                            <label><input type="checkbox" name="target_audience[]" value="job_seekers" {{
                                    in_array('job_seekers', $selectedAudience) ? 'checked' : '' }}> Job Seekers</label>
                            <label><input type="checkbox" name="target_audience[]" value="employers" {{
                                    in_array('employers', $selectedAudience) ? 'checked' : '' }}> Employers</label>
                            <label><input type="checkbox" name="target_audience[]" value="students" {{
                                    in_array('students', $selectedAudience) ? 'checked' : '' }}> Students</label>
                        </div>
                    </div>

                    <!-- Start Date & End Date -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-input"
                                value="{{ old('start_date', $ad->start_date) }}">
                        </div>
                        <div>
                            <label class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-input"
                                value="{{ old('end_date', $ad->end_date) }}">
                        </div>
                    </div>

                    <!-- Total Budget -->
                    <div>
                        <label class="form-label">Total Budget (₹)</label>
                        <input type="number" name="total_budget" step="0.01" class="form-input"
                            value="{{ old('total_budget', $ad->total_budget) }}">
                    </div>

                    <!-- Bid Strategy -->
                    <div>
                        <label class="form-label">Bid Strategy</label>
                        <select name="bid_strategy" class="form-select">
                            <option value="cpc" {{ old('bid_strategy', $ad->bid_strategy) == 'cpc' ? 'selected' : '' }}>
                                Cost per Click (CPC)</option>
                            <option value="cpm" {{ old('bid_strategy', $ad->bid_strategy) == 'cpm' ? 'selected' : '' }}>
                                Cost per Mille (CPM)</option>
                        </select>
                    </div>

                    <!-- Bid Amount -->
                    <div>
                        <label class="form-label">Bid Amount (₹)</label>
                        <input type="number" name="bid_amount" step="0.01" class="form-input"
                            value="{{ old('bid_amount', $ad->bid_amount) }}">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save"></i> Update Campaign
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </main>
    @endsection --}}


    @section('content')
        @if(session('success'))
            <div class="text-green-600 font-semibold mb-4">{{ session('success') }}</div>
        @endif

        <main class="w-full px-6 py-8">
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="w-full bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">Create New Ad Campaign</h1>
                    <div class="flex space-x-2">
                        <button
                            class="text-red-600 border border-red-600 hover:bg-red-50 rounded px-4 py-2 flex items-center">
                            <i class="fas fa-times mr-2"></i> Cancel
                        </button>
                        <button class="bg-blue-600 text-white hover:bg-blue-700 rounded px-4 py-2 flex items-center">
                            <i class="fas fa-save mr-2"></i> Save Draft
                        </button>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.ads.update', $ad->id) }}" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Campaign Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Campaign Name</label>
                        <input type="text" name="campaign_name" value="{{ old('campaign_name', $ad->campaign_name) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200" />
                    </div>

                    <!-- Ad Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ad Type</label>
                        <div class="flex gap-6">
                            @foreach(['banner' => 'Banner', 'video' => 'Video'] as $value => $label)
                                <label class="inline-flex items-center">
                                    <input type="radio" name="ad_type" value="{{ $value }}" {{ old('ad_type', $ad->ad_type) == $value ? 'checked' : '' }} class="text-blue-600">
                                    <span class="ml-2">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="active" {{ old('status', $ad->status) == 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="paused" {{ old('status', $ad->status) == 'paused' ? 'selected' : '' }}>Paused
                            </option>
                        </select>
                    </div>

                    <!-- Headline -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Headline</label>
                        <input type="text" name="headline" value="{{ old('headline', $ad->headline) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="ad_description" rows="3"
                            class="w-full border border-gray-300 rounded px-3 py-2">{{ old('ad_description', $ad->ad_description) }}</textarea>
                    </div>

                    <!-- CTA -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Call To Action (CTA)</label>
                        <input type="text" name="cta" value="{{ old('cta', $ad->cta) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2" />
                    </div>

                    <!-- Destination URL -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Destination URL</label>
                        <input type="url" name="destination_url" value="{{ old('destination_url', $ad->destination_url) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2" />
                    </div>

                    <!-- Creative Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Creative Image</label>
                        <input type="file" name="creative_image" class="w-full border border-gray-300 rounded px-3 py-2" />
                        @if($ad->creative_image && file_exists(public_path('storage/ads/' . $ad->creative_image)))
                        <img src="{{ asset('storage/ads/' . $ad->creative_image) }}" alt="Creative Image" class="mt-2 max-h-32">
                        @endif
                    </div>
<!-- Target Audience -->
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Target Audience</label>
    @php
        $audienceData = old('target_audience', $ad->target_audience ?? []);
        $selectedAudience = is_array($audienceData) ? $audienceData : json_decode($audienceData, true);
    @endphp
    <div class="flex gap-4 flex-wrap">
        @foreach(['job_seekers', 'employers', 'students'] as $audience)
            <label class="inline-flex items-center">
                <input type="checkbox" name="target_audience[]" value="{{ $audience }}"
                    {{ in_array($audience, $selectedAudience) ? 'checked' : '' }} class="text-blue-600">
                <span class="ml-2 capitalize">{{ str_replace('_', ' ', $audience) }}</span>
            </label>
        @endforeach
    </div>
</div>

                    <!-- Start Date & End Date -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                            <input type="date" name="start_date" value="{{ old('start_date', \Carbon\Carbon::parse($ad->start_date)->format('Y-m-d')) }}"
                            
                                class="w-full border border-gray-300 rounded px-3 py-2" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                            <input type="date" name="end_date" value="{{ old('end_date', \Carbon\Carbon::parse($ad->end_date)->format('Y-m-d')) }}"
                                class="w-full border border-gray-300 rounded px-3 py-2" />
                        </div>
                    </div>

                    <!-- Total Budget -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Total Budget (₹)</label>
                        <input type="number" step="0.01" name="total_budget"
                            value="{{ old('total_budget', $ad->total_budget) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2" />
                    </div>

                    <!-- Bid Strategy -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bid Strategy</label>
                        <select name="bid_strategy" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="cpc" {{ old('bid_strategy', $ad->bid_strategy) == 'cpc' ? 'selected' : '' }}>CPC
                            </option>
                            <option value="cpm" {{ old('bid_strategy', $ad->bid_strategy) == 'cpm' ? 'selected' : '' }}>CPM
                            </option>
                        </select>
                    </div>

                    <!-- Bid Amount -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bid Amount (₹)</label>
                        <input type="number" step="0.01" name="bid_amount" value="{{ old('bid_amount', $ad->bid_amount) }}"
                            class="w-full border border-gray-300 rounded px-3 py-2" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700 flex justify-center items-center">
                            <i class="fas fa-save mr-2"></i> Update Campaign
                        </button>
                    </div>
                </form>
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