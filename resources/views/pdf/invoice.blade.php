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
                        <span class="logo">{{ $settings->site_name ?? 'Furrydom' }}</span>
                        @if(!empty($settings->site_slogan))
                            <div class="slogan">{{ $settings->site_slogan }}</div>
                        @endif
                    </td>
                    <td class="invoice-details">
                        <h2>RECEIPT / INVOICE</h2>
                        <div><strong>Invoice No:</strong> INV-{{ date('Ymd') }}-{{ $donation->id }}</div>
                        <div><strong>Date:</strong> {{ $donation->created_at->format('M d, Y') }}</div>
                        <div><strong>Status:</strong> <span style="color: green; font-weight: bold;">{{ strtoupper($donation->status) }}</span></div>
                    </td>
                </tr>
            </table>
        </div>

        <hr>

        <table class="billing-info">
            <tr>
                <td>
                    <div class="info-title">NGO Details</div>
                    <strong>{{ $settings->site_name ?? 'Furrydom NGO' }}</strong><br>
                    {!! nl2br(e($settings->site_address ?? '123 Rescue Way, Animal Haven')) !!}<br>
                    Email: {{ $settings->contact_email ?? 'contact@furrydom.com' }}<br>
                    Phone: {{ $settings->contact_phone ?? '+1-234-567-890' }}
                </td>
                <td>
                    <div class="info-title">Donor Details</div>
                    <strong>{{ $donation->donor_name }}</strong><br>
                    Email: {{ $donation->donor_email }}<br>
                    @if(!empty($donation->donor_phone))
                        Phone: {{ $donation->donor_phone }}<br>
                    @endif
                    @if(!empty($donation->pan_number))
                        PAN Card: {{ strtoupper($donation->pan_number) }}<br>
                    @endif
                </td>
            </tr>
        </table>

        <table class="details-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th style="text-align: right;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Donation to support Furrydom Welfare Campaign
                        @if($donation->campaign)
                            <br><small style="color: #666;">Campaign: {{ $donation->campaign->title }}</small>
                        @endif
                        @if($donation->donation_type === 'recurring')
                            <br><small style="color: #666; font-style: italic;">Monthly Recurring Subscription</small>
                        @endif
                    </td>
                    <td>{{ strtoupper($donation->payment_method ?? 'Razorpay') }}</td>
                    <td><code>{{ $donation->gateway_transaction_id ?? $donation->transaction_id ?? 'N/A' }}</code></td>
                    <td style="text-align: right;">{{ number_format($donation->amount, 2) }} {{ strtoupper($donation->currency ?? 'INR') }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3" style="text-align: right;">Total Paid:</td>
                    <td style="text-align: right;">{{ number_format($donation->amount, 2) }} {{ strtoupper($donation->currency ?? 'INR') }}</td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%; margin-top: 25px; border-collapse: collapse;">
            <tr>
                <td style="width: 60%; vertical-align: bottom;">
                    <div style="background-color: #f9fafb; padding: 12px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 12px; color: #4b5563; margin-right: 15px;">
                        <strong>Tax Exemption Note:</strong> Furrydom is a registered non-profit organization. This receipt serves as official proof of your charitable donation. Thank you for your kindness and support towards our animal companions!
                    </div>
                </td>
                <td style="width: 40%; text-align: right; vertical-align: bottom; padding-left: 15px;">
                    @if(!empty($settings->signature_url))
                        <div style="margin-bottom: 5px;">
                            <img src="{{ $settings->signature_url }}" style="max-height: 50px; max-width: 180px;" alt="Signature">
                        </div>
                    @endif
                    <div style="border-top: 1px solid #e5e7eb; padding-top: 5px; font-size: 12px; font-weight: bold; color: #374151;">
                        Authorized Signature
                    </div>
                </td>
            </tr>
        </table>

        <div class="footer">
            Thank you for your generous contribution! 🐾<br>
            © {{ date('Y') }} {{ $settings->site_name ?? 'Furrydom' }}. All rights reserved.
        </div>
    </div>
</body>
</html>
