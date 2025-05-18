@extends('layouts.payment_layout')

@section('content')
    <div class="container my-5">
        <div class="bg-white p-4 rounded confirmation-wrapper shadow-lg"
             style="max-width: 900px; margin: auto; font-family: Arial, sans-serif; line-height: 1.6;">
        <h4 class="text-center fw-bold">OFFICIAL PURCHASE CONFIRMATION</h4>
            <p class="text-center small">(This is NOT your hotel confirmation)</p>

            <p><strong>Purchase Date:</strong> {{ $confirmation->purchased_date }}</p>
            <p>Thank you for your purchase of a vacation certificate with Vacation Deals All Inclusive</p>
            <p><strong>Your Certificate Number is:</strong> {{ $confirmation->transaction_id }}</p>
            <p><strong>Your certificate expires on:</strong> {{ $confirmation->certificate_expire }}</p>
            <p><strong>Package Price:</strong> ${{ $confirmation->amount }}</p>

            <div class="alert alert-warning fw-semibold mt-4">
                THIS CONFIRMATION MUST BE E-SIGNED WITHIN 48 HOURS OF PURCHASE.
            </div>

            <p><strong>IMPORTANT:</strong> ONLY if your purchase includes specific dates – If your arrival date is within 3 months Verifications Department will contact you within 72 hours to collect Resort Fees and confirm your hotel reservation. If your arrival date is more than 4 months away, we will contact you closer to your arrival to confirm your qualifications and collect Resort Fees. For concerns, call 877-867-0114 (M-F 9-9, Sa-Su 9-2 CT).</p>

            <p><strong>IMPORTANT:</strong> OPEN DATED PACKAGES – To reserve your dates please call 855-690-2950 (M-F 9-8, Sa 9-5, Su 9-3 CT). This promotion may not be used during Christmas and New Year's weeks unless an additional premium is paid.</p>

            <h5 class="mt-4 text-primary fw-bold">¡FREE INCENTIVES!</h5>
            <p>If you book dates within 6 months of purchase, you’re eligible for incentives and rewards (subject to availability and not applicable to Cancun or group travel). Call 855-690-2950 for details.</p>

            <p class="fw-bold">Reservations are contingent upon date availability.</p>
            <p>Submit travel dates as soon as possible by calling the number above.</p>

            <hr>

            <h5 class="fw-bold">PAYMENT CONFIRMATION</h5>
            <p><strong>Name:</strong> {{ $confirmation->name }}</p>
            <p><strong>Phone:</strong> {{ $confirmation->phone }}</p>
            <p><strong>Email:</strong> {{ $confirmation->email }}</p>

            <p><strong>Type of package:</strong> {{ $confirmation->package }}</p>
            <p><strong>Payment Type:</strong> Direct</p>
            <p><strong>Payment Amount:</strong> ${{ $confirmation->amount }}</p>
            <p><strong>Invoice #:</strong> {{ $confirmation->invoice_number }}</p>
            <p><strong>Payment Date:</strong> {{ $confirmation->us_time }}</p>
            <p><strong>Card Holder:</strong> {{ $confirmation->name }}</p>
            <p><strong>Card Type:</strong> {{ $confirmation->card_type }}</p>
            <p><strong>Card Number:</strong> {{ $confirmation->card_number }}</p>

            <p class="text-muted small">The merchant name that will appear on your credit card statement is DISCOUNT VACATION COST 08778670114 NV 89119 USA</p>

            <h5 class="mt-4 fw-bold">YOUR VACATION PACKAGE INCLUDES:</h5>
            <table class="table table-bordered">
                <thead class="table-light">
                <tr>
                    <th>Destination</th>
                    <th>Arrival Date</th>
                    <th>Plan Type</th>
                    <th>No. of Nights</th>
                    <th>Certificate Comments</th>
                    <th>Gifts</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $confirmation->resort_name }}</td>
                    <td>OPEN</td>
                    <td>All Inclusive</td>
                    <td>4</td>
                    <td></td>
                    <td>airport pick up. free night VDP PVR, CABO, LORETO MONSTER PACKAGE</td>
                </tr>
                </tbody>
            </table>

            <p><strong>Note:</strong> Certificate covers 2 adults and 2 kids under 12. Additional costs apply for extras.</p>
            <p>Airport pickup is available for a fee.</p>
            <p>Mexico must be your first destination in multi-location packages.</p>
            <p>90-minute tour and presentation is mandatory and scheduled usually the morning after arrival.</p>

            <p>Package price does <u>NOT</u> include Resort Fees (per adult, per night). These must be paid during the verification call.</p>

            <h5 class="fw-bold text-danger mt-4">RE-SCHEDULING POLICY</h5>
            <p>One change allowed for free if requested 10+ days before arrival. Additional changes: $99 fee.</p>

            <h5 class="fw-bold mt-4">TERMS AND CONDITIONS</h5>
            <ul>
                <li>Mandatory 90-minute presentation in Mexico.</li>
                <li>This offer is for promotional use only and cannot be used if traveling with others using promotions.</li>
                <li>Villa Group members cannot use this offer.</li>
            </ul>

            <h5 class="fw-bold">CANCELLATION POLICY</h5>
            <p>Cancel within 24 hours at no cost via 877-849-0140 or email ejbello@vacationdealsallinclusive.com. After 24 hours, $149 cancellation fee applies. No refunds beyond expiration date.</p>

            <h5 class="fw-bold">NO SHOW / UNUSED NIGHTS</h5>
            <p>No refunds for no-shows, early checkouts, or unused nights.</p>

            <h5 class="fw-bold">ACTIVATION</h5>
            <p>This email is your receipt. Please e-sign to confirm and activate your certificate.</p>
            <h5 class="mt-5">Electronic Signature</h5>

            @if($confirmation->sign_path)
                <p class="text-muted">This certificate has already been signed.</p>

                <!-- Display disabled checkboxes -->
                <div class="form-check mb-3">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">
                        I understand and agree with the Terms and Conditions and/or the Cancelation Policy as stated in this document.
                    </label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input me-2" type="checkbox" checked disabled>
                    <label class="form-check-label">
                        I understand and agree to receive SMS.
                    </label>
                </div>

                <!-- Show the saved signature -->
                <div class="border rounded bg-light p-2 mb-4" style="width: 100%; max-width: 100%; overflow-x: auto;">
                    <img src="{{ asset($confirmation->sign_path) }}" alt="Signed Signature" style="max-width: 100%; height: auto;">
                </div>
            @else
                <!-- Show signature form if not signed yet -->
                <form method="POST" action="{{ route('purchase.sign') }}" id="signature-form">
                    @csrf
                    <input type="hidden" name="link_id" value="{{ $confirmation->link_id }}">
                    <input type="hidden" name="signature_data" id="signature_data">

                    <p>Please sign below to confirm you agree with the terms and conditions.</p>

                    <div class="form-check mb-3">
                        <input class="form-check-input me-2" type="checkbox" id="checkTerms">
                        <label class="form-check-label" for="checkTerms">
                            <strong>By checking this box</strong> I understand and agree with the Terms and Conditions and/or the Cancelation Policy as stated in this document.
                        </label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input me-2" type="checkbox" id="checkSMS">
                        <label class="form-check-label" for="checkSMS">
                            <strong>By checking this box</strong> I understand and agree to receive SMS.
                        </label>
                    </div>

                    <div class="border rounded bg-light mb-3" style="width: 100%; max-width: 100%; overflow-x: auto;">
                        <canvas id="signature-pad" style="width: 100%; height: 200px;"></canvas>
                    </div>

                    <div class="mb-4">
                        <button type="button" class="btn btn-secondary btn-sm" id="clear-signature">Clear</button>
                        <button type="submit" class="btn btn-success btn-sm">Submit Signature</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script>
        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas);

        // Resize canvas properly for responsiveness
        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = 200 * ratio;
            canvas.getContext('2d').scale(ratio, ratio);
            signaturePad.clear();
        }

        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        document.getElementById('clear-signature').addEventListener('click', () => {
            signaturePad.clear();
        });

        document.getElementById('signature-form').addEventListener('submit', function (e) {
            const termsChecked = document.getElementById('checkTerms').checked;
            const smsChecked = document.getElementById('checkSMS').checked;

            if (!termsChecked || !smsChecked) {
                e.preventDefault();
                alert('Please agree to the Terms and Conditions and SMS before submitting.');
                return;
            }

            if (signaturePad.isEmpty()) {
                e.preventDefault();
                alert('Please provide a signature before submitting.');
                return;
            }

            document.getElementById('signature_data').value = signaturePad.toDataURL();
        });
    </script>
@endpush
@push('css')
    <style>
        .shadow-lg {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }
        .form-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            margin-bottom: 1rem;
            flex-wrap: nowrap;
        }

        .form-check-input {
            margin-top: 4px;
            transform: scale(1.2);
            cursor: default;
        }

        .form-check-label {
            line-height: 1.5;
            flex: 1;
            font-size: 14px;
            color: #555;
        }

        @media (max-width: 576px) {
            .form-check {
                flex-wrap: nowrap;
                align-items: flex-start;
            }

            .form-check-input {
                margin-top: 6px;
            }

            .form-check-label {
                font-size: 14px;
            }
        }
    </style>
@endpush
