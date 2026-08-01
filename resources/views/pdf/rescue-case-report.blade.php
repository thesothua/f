@php
    $imageToBase64 = function($url) {
        if (empty($url)) {
            return null;
        }
        
        $localPath = null;
        
        if (str_contains($url, 'localhost:5173/src/assets/images/')) {
            $filename = basename($url);
            $frontPath = base_path('../furrydom-front/src/assets/images/' . $filename);
            if (file_exists($frontPath)) {
                $localPath = $frontPath;
            }
        } elseif (str_contains($url, '/storage/')) {
            $storagePart = explode('/storage/', $url)[1];
            $localStoragePath = storage_path('app/public/' . $storagePart);
            if (file_exists($localStoragePath)) {
                $localPath = $localStoragePath;
            }
        }
        
        if ($localPath && file_exists($localPath)) {
            $type = pathinfo($localPath, PATHINFO_EXTENSION);
            $data = file_get_contents($localPath);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        
        return $url; // Fallback to URL
    };

    $logoSrc = $imageToBase64($settings->logo_url ?? '');
    
    // Status colors
    $statusColors = [
        'dispatched' => '#3b82f6',
        'admitted' => '#f59e0b',
        'in_treatment' => '#10b981',
        'recovered' => '#059669',
        'released' => '#8b5cf6',
        'adopted' => '#ec4899',
        'deceased' => '#ef4444'
    ];
    $statusColor = $statusColors[strtolower($case->status)] ?? '#ea580c';

    $formatActivity = function($act) {
        $properties = $act->properties;
        $event = $act->event;

        if ($event === 'created') {
            return 'Case was initiated from report';
        }

        if (!empty($properties) && (is_array($properties) || is_object($properties))) {
            $propsArray = is_object($properties) ? json_decode(json_encode($properties), true) : $properties;
            $attributes = $propsArray['attributes'] ?? [];
            $old = $propsArray['old'] ?? [];

            $changes = [];
            if (isset($attributes['status']) && $attributes['status'] !== ($old['status'] ?? null)) {
                $oldStatus = strtoupper($old['status'] ?? 'none');
                $newStatus = strtoupper($attributes['status']);
                $changes[] = "status changed from '{$oldStatus}' to '{$newStatus}'";
            }
            if (isset($attributes['rescuer_id']) && $attributes['rescuer_id'] !== ($old['rescuer_id'] ?? null)) {
                $changes[] = "rescuer assignment updated";
            }
            if (isset($attributes['description']) && $attributes['description'] !== ($old['description'] ?? null)) {
                $changes[] = "description/diagnosis updated";
            }
            if (isset($attributes['clinic_details']) || isset($attributes['recovery_details']) || isset($attributes['adoption_details']) || isset($attributes['release_details']) || isset($attributes['deceased_details'])) {
                $changes[] = "operational status metadata details updated";
            }

            if (count($changes) > 0) {
                return ucfirst(implode(', ', $changes));
            }
        }

        return $act->description ?? 'Updated case details';
    };
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rescue Case Report - {{ $case->case_number }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #374151;
            margin: 0;
            padding: 10px;
            font-size: 13px;
            line-height: 1.5;
        }
        .report-box {
            max-width: 850px;
            margin: auto;
            border: 1px solid #e5e7eb;
            padding: 25px;
            background: #fff;
        }
        .header {
            margin-bottom: 20px;
        }
        .header table {
            width: 100%;
            border-collapse: collapse;
        }
        .logo-section {
            vertical-align: middle;
        }
        .logo-title {
            font-size: 18px;
            font-weight: bold;
            color: #111827;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }
        .logo-slogan {
            font-size: 9px;
            font-weight: bold;
            color: #ea580c;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 2px;
            line-height: 1.2;
        }
        .report-title-section {
            text-align: right;
            vertical-align: middle;
        }
        .report-title-section h2 {
            margin: 0 0 5px 0;
            color: #111827;
            font-size: 20px;
            letter-spacing: 0.5px;
        }
        .case-number {
            font-size: 14px;
            font-weight: bold;
            color: #4b5563;
        }
        .status-badge {
            display: inline-block;
            padding: 2px 8px;
            font-size: 10px;
            font-weight: bold;
            color: #fff;
            background-color: {{ $statusColor }};
            border-radius: 9999px;
            text-transform: uppercase;
            margin-top: 5px;
        }
        hr {
            border: 0;
            border-top: 1px solid #e5e7eb;
            margin: 15px 0;
        }
        .section-title {
            font-size: 11px;
            font-weight: bold;
            color: #ea580c;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            border-bottom: 1px solid #f3f4f6;
            padding-bottom: 4px;
            margin-top: 15px;
        }
        .grid-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .grid-table td {
            width: 50%;
            vertical-align: top;
            padding: 0 10px 0 0;
        }
        .data-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .data-list li {
            margin-bottom: 6px;
        }
        .data-label {
            font-size: 10px;
            color: #9ca3af;
            text-transform: uppercase;
            font-weight: bold;
            display: block;
        }
        .data-value {
            font-size: 12px;
            color: #1f2937;
            font-weight: 650;
        }
        .description-card {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 15px;
        }
        .description-text {
            font-style: italic;
            color: #4b5563;
        }
        .milestone-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .milestone-table th {
            background: #f9fafb;
            color: #374151;
            font-weight: bold;
            text-align: left;
            padding: 8px;
            border-bottom: 2px solid #e5e7eb;
            font-size: 11px;
            text-transform: uppercase;
        }
        .milestone-table td {
            padding: 10px 8px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 12px;
            vertical-align: top;
        }
        .timeline-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .timeline-table td {
            padding: 8px 5px;
            border-bottom: 1px solid #f9fafb;
            font-size: 11px;
        }
        .timeline-date {
            width: 25%;
            color: #9ca3af;
            font-family: monospace;
        }
        .timeline-action {
            width: 50%;
            color: #374151;
            font-weight: 650;
        }
        .timeline-user {
            width: 25%;
            color: #6b7280;
            text-align: right;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 12px;
        }
    </style>
</head>
<body>
    <div class="report-box">
        <div class="header">
            <table>
                <tr>
                    <td class="logo-section">
                        <table style="border-collapse: collapse; border: none; margin: 0; padding: 0;">
                            <tr>
                                @if(!empty($logoSrc))
                                    <td style="padding: 0 10px 0 0; border: none; vertical-align: middle; width: 44px;">
                                        <img src="{{ $logoSrc }}" style="height: 38px; width: auto; display: block;" alt="Logo">
                                    </td>
                                @endif
                                <td style="padding: 0; border: none; vertical-align: middle;">
                                    <div class="logo-title">{{ $settings->site_name ?? 'Furrydom NGO' }}</div>
                                    @if(!empty($settings->site_slogan))
                                        <div class="logo-slogan">{{ $settings->site_slogan }}</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="report-title-section">
                        <h2>RESCUE CASE REPORT</h2>
                        <div class="case-number">{{ $case->case_number }}</div>
                        <div><span class="status-badge">{{ str_replace('_', ' ', $case->status) }}</span></div>
                    </td>
                </tr>
            </table>
        </div>

        <hr>

        <table class="grid-table">
            <tr>
                <td>
                    <div class="section-title">Case Information</div>
                    <ul class="data-list">
                        <li>
                            <span class="data-label">Animal Type</span>
                            <span class="data-value">{{ $case->animalReport->animal_type ?? $case->animal_type ?? 'N/A' }}</span>
                        </li>
                        <li>
                            <span class="data-label">Urgency Level</span>
                            <span class="data-value" style="color: {{ ($case->animalReport->urgency ?? '') === 'high' ? '#ef4444' : '#f59e0b' }};">{{ strtoupper($case->animalReport->urgency ?? 'Medium') }}</span>
                        </li>
                        <li>
                            <span class="data-label">Assigned Rescuer</span>
                            <span class="data-value">{{ $case->rescuer->name ?? 'Unassigned' }}</span>
                        </li>
                        <li>
                            <span class="data-label">Reported Date</span>
                            <span class="data-value">{{ $case->created_at->format('d/m/Y H:i') }}</span>
                        </li>
                    </ul>
                </td>
                <td>
                    <div class="section-title">Reporter Information</div>
                    <ul class="data-list">
                        <li>
                            <span class="data-label">Reporter Name</span>
                            <span class="data-value">{{ $case->animalReport->reporter_name ?? 'Anonymous / Walk-in' }}</span>
                        </li>
                        <li>
                            <span class="data-label">Mobile Number</span>
                            <span class="data-value">{{ $case->animalReport->reporter_mobile ?? 'N/A' }}</span>
                        </li>
                        <li>
                            <span class="data-label">Email Address</span>
                            <span class="data-value">{{ $case->animalReport->reporter_email ?? 'N/A' }}</span>
                        </li>
                        <li>
                            <span class="data-label">Rescue Location</span>
                            <span class="data-value">{{ $case->animalReport->location ?? 'N/A' }}</span>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>

        @if(!empty($case->description))
            <div class="section-title">Diagnosis & Description Notes</div>
            <div class="description-card">
                <div class="description-text">{!! nl2br(e($case->description)) !!}</div>
            </div>
        @endif

        {{-- Operational Milestones Details --}}
        @php
            $hasMilestones = (!empty($case->clinic_details) && (!empty($case->clinic_details['clinic_name']) || !empty($case->clinic_details['dr_name'])))
                || (!empty($case->recovery_details) && (!empty($case->recovery_details['expenses']) || !empty($case->recovery_details['medical_reports']) || !empty($case->recovery_details['medical_report'])))
                || (!empty($case->adoption_details) && (!empty($case->adoption_details['name']) || !empty($case->adoption_details['email'])))
                || (!empty($case->release_details) && !empty($case->release_details['release_location']))
                || (!empty($case->deceased_details) && !empty($case->deceased_details['cause_of_death']));
        @endphp

        @if($hasMilestones)
            <div class="section-title">Operational Milestones</div>
            <table class="milestone-table">
                <thead>
                    <tr>
                        <th style="width: 30%;">Milestone Stage</th>
                        <th style="width: 70%;">Details & Recorded Metadata</th>
                    </tr>
                </thead>
                <tbody>
                    @if($case->clinic_details && (!empty($case->clinic_details['clinic_name']) || !empty($case->clinic_details['dr_name'])))
                        <tr>
                            <td><strong>Clinic Admission</strong></td>
                            <td>
                                <div><strong>Clinic:</strong> {{ $case->clinic_details['clinic_name'] ?? 'N/A' }}</div>
                                <div><strong>Doctor:</strong> {{ $case->clinic_details['dr_name'] ?? 'N/A' }}</div>
                            </td>
                        </tr>
                    @endif

                    @if($case->recovery_details && (!empty($case->recovery_details['expenses']) || !empty($case->recovery_details['medical_reports']) || !empty($case->recovery_details['medical_report'])))
                        <tr>
                            <td><strong>Recovery Status</strong></td>
                            <td>
                                @if(!empty($case->recovery_details['expenses']))
                                    <div><strong>Medical Expenses:</strong> INR {{ number_format($case->recovery_details['expenses'], 2) }}</div>
                                @endif
                                @if(!empty($case->recovery_details['medical_reports']))
                                    <div style="margin-top: 5px;"><strong>Medical Reports ({{ count($case->recovery_details['medical_reports']) }}):</strong></div>
                                    <ul style="margin: 2px 0 0 0; padding-left: 15px; font-size: 11px;">
                                        @foreach($case->recovery_details['medical_reports'] as $reportUrl)
                                            <li><a href="{{ $reportUrl }}" target="_blank" style="color: #ea580c;">{{ basename($reportUrl) }}</a></li>
                                        @endforeach
                                    </ul>
                                @elseif(!empty($case->recovery_details['medical_report']))
                                    <div style="margin-top: 5px;"><strong>Medical Report:</strong> <a href="{{ $case->recovery_details['medical_report'] }}" target="_blank" style="color: #ea580c;">View Attachment</a></div>
                                @endif
                            </td>
                        </tr>
                    @endif

                    @if($case->adoption_details && (!empty($case->adoption_details['name']) || !empty($case->adoption_details['email'])))
                        <tr>
                            <td><strong>Adoption Record</strong></td>
                            <td>
                                <div><strong>Adopter Name:</strong> {{ $case->adoption_details['name'] ?? 'N/A' }}</div>
                                @if(!empty($case->adoption_details['email']))
                                    <div><strong>Email:</strong> {{ $case->adoption_details['email'] }}</div>
                                @endif
                                @if(!empty($case->adoption_details['phone']))
                                    <div><strong>Phone:</strong> {{ $case->adoption_details['phone'] }}</div>
                                @endif
                                @if(!empty($case->adoption_details['location']))
                                    <div><strong>Location:</strong> {{ $case->adoption_details['location'] }}</div>
                                @endif
                            </td>
                        </tr>
                    @endif

                    @if($case->release_details && !empty($case->release_details['release_location']))
                        <tr>
                            <td><strong>Release Record</strong></td>
                            <td>
                                <div><strong>Release Location:</strong> {{ $case->release_details['release_location'] }}</div>
                            </td>
                        </tr>
                    @endif

                    @if($case->deceased_details && !empty($case->deceased_details['cause_of_death']))
                        <tr>
                            <td><strong>Deceased Record</strong></td>
                            <td style="color: #ef4444;">
                                <div><strong>Cause of Death:</strong> {{ $case->deceased_details['cause_of_death'] }}</div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        @endif

        {{-- Activity Timeline History --}}
        @if($case->activities && count($case->activities) > 0)
            <div class="section-title">Case Activity Log Timeline</div>
            <table class="timeline-table">
                <tbody>
                    @foreach($case->activities->sortByDesc('created_at') as $activity)
                        <tr>
                            <td class="timeline-date">{{ $activity->created_at->format('d/m/Y H:i') }}</td>
                            <td class="timeline-action">{{ $formatActivity($activity) }}</td>
                            <td class="timeline-user">{{ $activity->causer->name ?? 'System' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="footer">
            Report generated on {{ date('d M Y, H:i') }}<br>
            © {{ date('Y') }} {{ $settings->site_name ?? 'Furrydom NGO' }}. All rights reserved.
        </div>
    </div>
</body>
</html>
