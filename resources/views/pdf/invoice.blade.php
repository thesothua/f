@php
    $imageToBase64 = function ($url) {
        if (empty($url)) {
            return null;
        }

        $localPath = null;

        if (file_exists($url)) {
            $localPath = $url;
        } elseif (str_contains($url, 'localhost:5173/src/assets/images/')) {
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
        } elseif (file_exists(public_path($url))) {
            $localPath = public_path($url);
        }

        if ($localPath && file_exists($localPath)) {
            $type = pathinfo($localPath, PATHINFO_EXTENSION);
            $data = file_get_contents($localPath);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }

        return $url; // Fallback to URL
    };

    $logoSrc = $imageToBase64($settings->logo_url ?? '');
    $signatureSrc = $imageToBase64($settings->signature_url ?? '');

    // Map payment methods to human readable labels
    $paymentMethodLabel = 'Razorpay';
    if (!empty($donation->payment_method)) {
        $methodMap = [
            'cash' => 'Cash',
            'bank_transfer' => 'Bank Transfer',
            'cheque' => 'Cheque',
            'upi_manual' => 'UPI (Manual)',
            'razorpay_qr' => 'Razorpay UPI QR',
            'upi' => 'UPI',
            'card' => 'Card',
            'netbanking' => 'Netbanking',
            'wallet' => 'Wallet',
        ];
        $paymentMethodLabel =
            $methodMap[$donation->payment_method] ?? ucwords(str_replace('_', ' ', $donation->payment_method));
    } elseif ($donation->payment_gateway === 'offline') {
        $paymentMethodLabel = 'Offline Payment';
    } elseif ($donation->payment_gateway === 'razorpay_qr') {
        $paymentMethodLabel = 'Razorpay UPI QR';
    }

    // Resolve allocation targets accurately
    $planName =
        $donation->plan?->name ?? ($donation->subscription?->plan?->name ?? $donation->subscription?->plan?->title);
    $campaignTitle =
        $donation->campaign?->title ??
        ($donation->campaign?->name ??
            ($donation->subscription?->campaign?->title ?? $donation->subscription?->campaign?->name));
    $autoFeederName =
        $donation->autoFeeder?->name ??
        ($donation->auto_feeder?->name ??
            ($donation->subscription?->autoFeeder?->name ??
                ($donation->subscription?->auto_feeder?->name ??
                    (!empty($donation->new_feeder_name)
                        ? "New Station: {$donation->new_feeder_name}"
                        : (!empty($donation->subscription?->new_feeder_name)
                            ? "New Station: {$donation->subscription->new_feeder_name}"
                            : null)))));
    $autoFeederAddress = $donation->new_feeder_address ?? ($donation->subscription?->new_feeder_address ?? null);
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Donation Invoice</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 10px;
            font-size: 14px;
            line-height: 1.5;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            border: 1px solid #eee;
            padding: 30px;
            background: #fff;
        }

        .header {
            margin-bottom: 20px;
        }

        .header table {
            width: 100%;
            border-collapse: collapse;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #ea580c;
        }

        .slogan {
            font-size: 11px;
            color: #666;
            margin-top: 4px;
        }

        .invoice-details {
            text-align: right;
            font-size: 12px;
            color: #555;
        }

        .invoice-details h2 {
            margin: 0 0 8px 0;
            color: #111;
            font-size: 20px;
        }

        hr {
            border: 0;
            border-top: 1px solid #eee;
            margin: 15px 0;
        }

        .billing-info {
            width: 100%;
            margin-bottom: 25px;
            border-collapse: collapse;
        }

        .billing-info td {
            width: 50%;
            vertical-align: top;
        }

        .info-title {
            font-weight: bold;
            color: #111;
            margin-bottom: 4px;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .details-table th {
            background: #f9fafb;
            color: #374151;
            font-weight: bold;
            text-align: left;
            padding: 10px;
            border-bottom: 2px solid #e5e7eb;
            font-size: 12px;
            text-transform: uppercase;
        }

        .details-table td {
            padding: 12px 10px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 13px;
        }

        .total-row td {
            border-top: 2px solid #e5e7eb;
            font-weight: bold;
            font-size: 15px;
            color: #111;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #9ca3af;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="header">
            <table>
                <tr>
                    <td>
                        <table style="border-collapse: collapse; border: none; margin: 0; padding: 0; width: 100%;">
                            <tr>
                                @if (!empty($logoSrc))
                                    <td style="padding: 0 12px 0 0; border: none; vertical-align: middle; width: 50px;">
                                        <img src="{{ $logoSrc }}" style="height: 44px; width: auto; display: block;"
                                            alt="Logo">
                                    </td>
                                @endif
                                <td style="padding: 0; border: none; vertical-align: middle;">
                                    <div
                                        style="font-size: 18px; font-weight: bold; color: #111827; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.2;">
                                        {{ $settings->site_name ?? 'Furrydom India Care Foundation' }}</div>
                                    @if (!empty($settings->site_slogan))
                                        <div
                                            style="font-size: 9px; font-weight: bold; color: #ea580c; text-transform: uppercase; letter-spacing: 1.5px; margin-top: 2px; line-height: 1.2;">
                                            {{ $settings->site_slogan }}</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="invoice-details">
                        <h2>DONATION RECEIPT</h2>
                        <div><strong>Receipt No:</strong>
                            INV-{{ $donation->created_at ? $donation->created_at->format('Ymd') : date('Ymd') }}-{{ sprintf('%04d', $donation->id) }}
                        </div>
                        <div><strong>Date:</strong>
                            {{ $donation->created_at ? $donation->created_at->format('M d, Y') : date('M d, Y') }}</div>
                        <div><strong>Status:</strong> <span
                                style="color: #16a34a; font-weight: bold;">{{ strtoupper($donation->status) }}</span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <hr>

        <table class="billing-info">
            <tr>
                <td>
                    <div class="info-title">NGO Organization Details</div>
                    <strong>{{ $settings->site_name ?? 'Furrydom India Care Foundation' }}</strong><br>
                    {!! nl2br(e($settings->site_address ?? 'Ahmedabad, Gujarat, India')) !!}<br>
                    Email: {{ $settings->contact_email ?? 'contact@furrydom.org' }}<br>
                    Phone: {{ $settings->contact_phone ?? '+91-9876543210' }}<br>
                    <strong>Section-8 License No:</strong> 151483<br>
                    <strong>PAN:</strong> AAFCF7270D<br>
                    <strong>80G Reg. No:</strong> AAFCF7270DF20241
                </td>
                <td>
                    <div class="info-title">Donor Details</div>
                    <strong>{{ $donation->donor_name }}</strong><br>
                    Email: {{ $donation->donor_email }}<br>
                    @if (!empty($donation->donor_phone))
                        Phone: {{ $donation->donor_phone }}<br>
                    @endif
                    @if (!empty($donation->pan_number))
                        PAN Card: <strong>{{ strtoupper($donation->pan_number) }}</strong><br>
                    @endif
                </td>
            </tr>
        </table>

        <table class="details-table">
            <thead>
                <tr>
                    <th>Contribution Description</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th style="text-align: right;">Amount Paid</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Charitable Contribution & Support</strong>
                        <br><small style="color: #666;">Frequency:
                            {{ !empty($donation->subscription_id) ? 'Monthly Recurring Subscription' : 'One-time Donation' }}</small>
                        @if ($autoFeederName)
                            <br><small style="color: #ea580c; font-weight: bold;">Auto Feeder Station:
                                {{ $autoFeederName }}</small>
                            @if ($autoFeederAddress)
                                <br><small style="color: #666;">Location: {{ $autoFeederAddress }}</small>
                            @endif
                        @elseif($campaignTitle)
                            <br><small style="color: #ea580c; font-weight: bold;">Fundraising Campaign:
                                {{ $campaignTitle }}</small>
                        @elseif($planName)
                            <br><small style="color: #2563eb; font-weight: bold;">Target Cause:
                                {{ $planName }}</small>
                        @else
                            <br><small style="color: #16a34a; font-weight: bold;">Allocation: General Unrestricted
                                Fund</small>
                        @endif
                    </td>
                    <td>{{ $paymentMethodLabel }}</td>
                    <td><code>{{ $donation->gateway_transaction_id ?? ($donation->transaction_id ?? 'N/A') }}</code>
                    </td>
                    <td style="text-align: right; font-weight: bold;">₹ {{ number_format($donation->amount, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3" style="text-align: right;">Total Amount Received:</td>
                    <td style="text-align: right; color: #ea580c;">₹ {{ number_format($donation->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; margin-top: 25px; border-collapse: collapse;">
            <tr>
                <td style="width: 60%; vertical-align: bottom;">
                    <div
                        style="background-color: #f9fafb; padding: 12px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 12px; color: #4b5563; margin-right: 15px;">
                        <strong>80G Tax Exemption Note:</strong> Furrydom India Care Foundation is a registered
                        Section-8 non-profit organization. Donations are eligible for tax deduction under Section 80G of
                        the Income Tax Act. This receipt serves as official proof of your charitable contribution.
                    </div>
                </td>
                <td style="width: 40%; text-align: right; vertical-align: bottom; padding-left: 15px;">
                    @if (!empty($signatureSrc))
                        <div style="margin-bottom: 5px;">
                            <img src="{{ $signatureSrc }}" style="max-height: 50px; max-width: 180px;" alt="Signature">
                        </div>
                    @endif
                    <div
                        style="border-top: 1px solid #e5e7eb; padding-top: 5px; font-size: 12px; font-weight: bold; color: #374151;">
                        Authorized Signatory
                    </div>
                </td>
            </tr>
        </table>

        <div class="footer">
            Thank you for your generous support towards animal welfare! 🐾<br>
            © {{ date('Y') }} {{ $settings->site_name ?? 'Furrydom India Care Foundation' }}. All rights reserved.
        </div>
    </div>
</body>

</html>
