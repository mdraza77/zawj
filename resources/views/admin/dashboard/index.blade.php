@extends('layouts.main')
@section('title', 'Dashboard - Poor Graduate')
@section('content')
    <main id="main" class="main">
        <!-- Main Form -->
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="card card-primary mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="page-title mb-0">Poor Graduate Dashboard</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="tt active">
                    <div class="tt-content">
                        <i class="fas fa-solid fa-check check"></i>
                        <div class="message">
                            <span class="text text-1">Success</span>
                            <span class="text text-2">{{ $message }}</span>
                        </div>
                    </div>
                    <i class="fa-solid fa-xmark close"></i>
                    <div class="pg active"></div>
                </div>
            @endif

            <section class="section dashboard">
                <div class="row">
                    <!-- Left side columns -->
                    <div class="col-lg-12">
                        <div class="row">
                            <!-- Total Orders -->
                            <div class="col-xxl-3 col-md-6 mb-4">
                                <a href="#">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Orders</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 60px; height: 60px; background-color: #f0f4ff; flex-shrink: 0;">
                                                    <i class="bi bi-cart-fill"
                                                        style="font-size: 1.8rem; color: #4f46e5; line-height: 1;"></i>
                                                </div>

                                                <div class="ps-3 d-flex flex-column justify-content-center">
                                                    <h6
                                                        style="font-size: 1.5rem; font-weight: 700; margin: 0; line-height: 1.2; color: #1e293b;">
                                                        500
                                                    </h6>
                                                    {{-- <span class="text-success small fw-bold" style="line-height: 1;">
                                                        +5% <span class="text-muted fw-normal">last month</span>
                                                    </span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Available Products -->
                            <div class="col-xxl-3 col-md-6 mb-4">
                                <a href="#">
                                    <div class="card card-secondary">
                                        <div class="card-body">
                                            <h5 class="card-title">Available Products</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 60px; height: 60px; background-color: #f0f4ff; flex-shrink: 0;">
                                                    <i class="bi bi-box-seam"
                                                        style="font-size: 1.8rem; color: #4f46e5; line-height: 1;"></i>
                                                </div>

                                                <div class="ps-3 d-flex flex-column justify-content-center">
                                                    <h6
                                                        style="font-size: 1.5rem; font-weight: 700; margin: 0; line-height: 1; color: #1e293b;">
                                                        1200
                                                    </h6>
                                                    {{-- <span class="text-muted small"
                                                        style="margin-top: 4px; line-height: 1;">Out of 50</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Total Users -->
                            <div class="col-xxl-3 col-md-6 mb-4">
                                <a href="{{ route('users.index') }}">
                                    <div class="card card-secondary">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Users</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 60px; height: 60px; background-color: #f0f4ff; flex-shrink: 0;">
                                                    <i class="bi bi-people-fill"
                                                        style="font-size: 1.8rem; color: #4f46e5; line-height: 1;"></i>
                                                </div>

                                                <div class="ps-3 d-flex flex-column justify-content-center">
                                                    <h6
                                                        style="font-size: 1.5rem; font-weight: 700; margin: 0; line-height: 1; color: #1e293b;">
                                                        {{ $Totalusers ?? 0 }}
                                                    </h6>
                                                    {{-- <span class="text-muted small"
                                                        style="margin-top: 4px; line-height: 1;">Out of 50</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Quick Actions -->
                            <div class="col-12">
                                <div class="card card-tertiary">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-bolt me-2"></i>
                                            Quick Actions
                                        </h5>
                                        <div class="d-flex flex-wrap gap-3">
                                            <a href="#" class="btn btn-primary">Add New Product</a>
                                            <a href="#" class="btn btn-primary">View Orders</a>
                                            <a href="#" class="btn btn-primary">View Reports</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        </div>

        <style>
            /* Design System Variables */
            :root {
                --primary-color: #4361ee;
                --secondary-color: #3f37c9;
                --success-color: #4cc9f0;
                --info-color: #4895ef;
                --warning-color: #f72585;
                --danger-color: #e63946;
                --light-color: #f8f9fa;
                --dark-color: #212529;
                --gray-100: #f8f9fa;
                --gray-200: #e9ecef;
                --gray-300: #dee2e6;
                --gray-400: #ced4da;
                --gray-500: #adb5bd;
                --gray-600: #6c757d;
                --gray-700: #495057;
                --gray-800: #343a40;
                --gray-900: #212529;

                --border-radius: 8px;
                --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
                --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);

                --card-padding: 1.5rem;
                --card-border: 1px solid var(--gray-200);
            }

            /* Card Header Section */
            .card-header-section {
                border-left: 4px solid var(--info-color);
            }

            .page-title {
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--gray-800);
                margin-bottom: 0.25rem;
            }

            .breadcrumb {
                background-color: transparent;
                padding: 0;
                margin: 0;
                font-size: 0.9rem;
            }

            .breadcrumb-item {
                display: flex;
                align-items: center;
            }

            .breadcrumb-item a {
                color: var(--primary-color);
                text-decoration: none;
                transition: color 0.15s ease;
            }

            .breadcrumb-item a:hover {
                color: var(--secondary-color);
            }

            .breadcrumb-item+.breadcrumb-item::before {
                content: ">";
                color: var(--gray-400);
                padding: 0 0.5rem;
            }

            .breadcrumb-item.active {
                color: var(--gray-700);
                font-weight: 500;
            }

            /* Alert Styles */
            .alert {
                border: none;
                border-radius: var(--border-radius);
                padding: 0.75rem 1rem;
                margin-bottom: 1rem;
            }

            .alert-body {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .alert-success {
                background-color: #d1e7dd;
                color: #0f5132;
            }

            .alert-danger {
                background-color: #f8d7da;
                color: #842029;
            }

            .btn-close {
                background: none;
                border: none;
                opacity: 0.5;
            }

            .btn-close:hover {
                opacity: 1;
            }

            /* Card Styles */
            .card {
                border: var(--card-border);
                border-radius: var(--border-radius);
                box-shadow: var(--shadow);
                margin-bottom: 1.5rem;
                transition: box-shadow 0.15s ease;
            }

            .card:hover {
                box-shadow: var(--shadow-lg);
            }

            .card-primary {
                border-left: 4px solid var(--primary-color);
            }

            .card-secondary {
                border-left: 4px solid var(--success-color);
            }

            .card-tertiary {
                border-left: 4px solid var(--warning-color);
            }

            .card-action {
                border-left: 4px solid var(--success-color);
            }

            .card-header {
                background-color: white;
                border-bottom: 1px solid var(--gray-200);
                padding: 1rem var(--card-padding);
                border-top-left-radius: var(--border-radius);
                border-top-right-radius: var(--border-radius);
            }

            .card-title {
                font-size: 1.1rem;
                font-weight: 600;
                color: var(--gray-800);
                margin: 0;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .card-body {
                padding: var(--card-padding);
            }

            /* Form Styles */
            .form-group {
                margin-bottom: 1rem;
            }

            .form-label {
                display: block;
                font-weight: 500;
                color: var(--gray-700);
                margin-bottom: 0.375rem;
                font-size: 0.9rem;
            }

            .required::after {
                content: " *";
                color: var(--danger-color);
            }

            .form-control {
                display: block;
                width: 100%;
                padding: 0.5rem 0.75rem;
                font-size: 0.9rem;
                font-weight: 400;
                line-height: 1.5;
                color: var(--gray-700);
                background-color: white;
                background-clip: padding-box;
                border: 1px solid var(--gray-300);
                border-radius: var(--border-radius);
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .form-control:focus {
                color: var(--gray-700);
                background-color: white;
                border-color: var(--primary-color);
                outline: 0;
                box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
            }

            .form-control:read-only {
                background-color: var(--gray-100);
                opacity: 1;
            }

            .form-control:read-only:focus {
                border-color: var(--gray-300);
                box-shadow: none;
            }

            textarea.form-control {
                min-height: 6rem;
            }

            /* Invalid Feedback */
            .invalid-feedback {
                display: none;
                width: 100%;
                margin-top: 0.25rem;
                font-size: 0.875em;
                color: var(--danger-color);
            }

            .is-invalid .form-control {
                border-color: var(--danger-color);
            }

            .is-invalid .form-control:focus {
                border-color: var(--danger-color);
                box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.25);
            }

            /* Upload Section */
            .upload-section {
                text-align: center;
            }

            .upload-label {
                display: block;
                cursor: pointer;
            }

            .upload-container {
                border: 2px dashed var(--gray-400);
                border-radius: var(--border-radius);
                padding: 2rem;
                transition: all 0.2s ease;
                background-color: var(--gray-50);
            }

            .upload-container:hover {
                border-color: var(--primary-color);
                background-color: #f0f7ff;
            }

            .upload-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
            }

            .upload-icon {
                font-size: 2rem;
                color: var(--gray-400);
            }

            .upload-text {
                font-weight: 600;
                color: var(--gray-700);
                margin: 0;
            }

            .upload-hint {
                font-size: 0.8rem;
                color: var(--gray-500);
                margin: 0;
            }

            .upload-input {
                display: none;
            }

            /* Logo Preview */
            .logo-preview-section {
                text-align: center;
            }

            .preview-title {
                font-weight: 600;
                color: var(--gray-700);
                margin-bottom: 1rem;
                font-size: 0.9rem;
            }

            .logo-preview-container {
                border: 1px solid var(--gray-200);
                border-radius: var(--border-radius);
                padding: 1rem;
                background-color: white;
            }

            .logo-preview {
                width: auto;
                max-width: 100%;
            }

            /* Action Buttons */
            .action-buttons {
                display: flex;
                justify-content: flex-end;
                gap: 0.75rem;
                flex-wrap: wrap;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.5rem 1.25rem;
                font-size: 0.9rem;
                font-weight: 500;
                line-height: 1.5;
                text-align: center;
                text-decoration: none;
                vertical-align: middle;
                border: 1px solid transparent;
                border-radius: var(--border-radius);
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .btn-primary {
                color: #fff;
                background-color: var(--primary-color);
                border-color: var(--primary-color);
            }

            .btn-primary:hover {
                color: #fff;
                background-color: var(--secondary-color);
                border-color: var(--secondary-color);
            }

            .btn-secondary {
                color: #fff;
                background-color: var(--gray-600);
                border-color: var(--gray-600);
            }

            .btn-secondary:hover {
                color: #fff;
                background-color: var(--gray-700);
                border-color: var(--gray-700);
            }
        </style>
    </main>
@endsection
