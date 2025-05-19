@extends('layouts.payment_layout')

@section('content')
    <div class="container my-5">
        <div class="bg-white p-4 rounded shadow-lg" style="max-width: 900px; margin: auto; font-family: Arial, sans-serif; font-size: 13px; line-height: 1.5;">
            <h4 class="text-center fw-bold text-uppercase">Official Purchase Confirmation</h4>
            <p class="text-center small">(This is NOT your hotel confirmation)</p>

            <p><strong>Purchase Date:</strong> {{ $confirmation->purchased_date }}</p>
            <p>Thank you for your purchase of a vacation certificate with Vacation Deals All Inclusive</p>
            <p><strong>Your Certificate Number is:</strong> {{ $confirmation->cert_number }}</p>
            <p><strong>Your certificate expires on:</strong> {{ $confirmation->certificate_expire }}</p>
            <p><strong>Package Price:</strong> ${{ $confirmation->amount }}</p>

            <p class="fw-bold text-uppercase mt-4">This confirmation must be e-signed within 48 hours of purchase.</p>

            <p><strong>IMPORTANT:</strong> ONLY if your purchase includes specific dates – If your arrival date is within 3 months Verifications Department will contact you within 72 hours to collect Resort Fees and confirm your hotel reservation. If your arrival date is more than 4 months away, we will contact you closer to your arrival to confirm your qualifications and collect Resort Fees. For concerns, call 888-592-0021 (M-F 9-9, Sa-Su 9-2 CT).</p>

            <p><strong>IMPORTANT:</strong> OPEN DATED PACKAGES – To reserve your dates please call 888-592-0021 (M-F 9-8, Sa 9-5, Su 9-3 CT). This promotion may not be used during Christmas and New Year's weeks unless an additional premium is paid.</p>

            <div class="bg-warning px-3 py-2 rounded fw-semibold mt-4" style="display: inline-block; font-size: 14px;">
                FREE INCENTIVES
            </div>
            <p class="mt-2">If you book dates within 6 months of purchase, you’re eligible for incentives and rewards (subject to availability and not applicable to Cancun or group travel). Call 888-592-0021 for details.</p>

            <hr>
            <h5 class="fw-bold text-center">Payment Confirmation</h5>

            <table class="table table-borderless">
                <tbody>
                <tr><td><strong>Name:</strong></td><td>{{ $confirmation->name }}</td></tr>
                <tr><td><strong>Phone:</strong></td><td>{{ $confirmation->phone }}</td></tr>
                <tr><td><strong>Email:</strong></td><td>{{ $confirmation->email }}</td></tr>
                <tr><td><strong>Type of package:</strong></td><td>{{ $confirmation->package }}</td></tr>
                <tr><td><strong>Payment Type:</strong></td><td>Direct</td></tr>
                <tr><td><strong>Payment Amount:</strong></td><td>${{ $confirmation->amount }}</td></tr>
                <tr><td><strong>Invoice #:</strong></td><td>{{ $confirmation->invoice_number }}</td></tr>
                <tr><td><strong>Payment Date:</strong></td><td>{{ $confirmation->us_time }}</td></tr>
                <tr><td><strong>Card Holder:</strong></td><td>{{ $confirmation->name }}</td></tr>
                <tr><td><strong>Card Type:</strong></td><td>{{ $confirmation->card_type }}</td></tr>
                <tr><td><strong>Card Number:</strong></td><td>{{ $confirmation->card_number }}</td></tr>
                </tbody>
            </table>

            <div class="text-muted small">
                The merchant name that will appear on your credit card statement is DISCOUNT VACATION COST 08778670114 NV 89119 USA
            </div>

{{--            <h5 class="mt-4 fw-bold">Your Vacation Package Includes:</h5>--}}
{{--            <table class="table table-bordered text-center small">--}}
{{--                <thead class="table-light">--}}
{{--                <tr>--}}
{{--                    <th>Destination</th>--}}
{{--                    <th>Arrival Date</th>--}}
{{--                    <th>Plan Type</th>--}}
{{--                    <th>No. of Nights</th>--}}
{{--                    <th>Certificate Comments</th>--}}
{{--                    <th>Gifts</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                <tr>--}}
{{--                    <td>Mexico</td>--}}
{{--                    <td>OPEN</td>--}}
{{--                    <td>All Inclusive</td>--}}
{{--                    <td>4</td>--}}
{{--                    <td></td>--}}
{{--                    <td>{{$confirmation->package}}</td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}

{{--            <p><strong>Note:</strong> Certificate covers 2 adults and 2 kids under 12. Additional costs apply for extras.</p>--}}

{{--            <h5 class="fw-bold mt-4">Terms and Conditions</h5>--}}
{{--            <p>This is a one-time promotional offer. Everyone included in the Mexico reservation must attend a 90-minute breakfast and presentation.--}}
{{--                You cannot use this package at the same location and around the same time as family or friends who are also traveling on a promotional deal.--}}
{{--                If your family or friends are scheduled to attend the same presentation during overlapping dates, your package will no longer be valid unless you pay a higher nightly rate to keep the reservation.--}}
{{--                This rule does not apply if you're traveling with Universal Vacation Club members using their membership.--}}
{{--                Villa Group members are not eligible to use this package.</p>--}}

{{--            <h5 class="fw-bold">Cancellation Policy</h5>--}}
{{--            <p>You have 24 hours to cancel without any penalty by calling 888-592-0021 or emailing bookings@greenescapestravel.com--}}
{{--                If you’re unable to use the certificate, it can be transferred to another qualified person.--}}
{{--                Cancellations made after the 24-hour window will incur a $149 cancellation fee.--}}
{{--                Please note, once the original expiration date has passed, the package becomes non-refundable.--}}
{{--            </p>--}}

{{--            <h5 class="fw-bold"> Re-Scheduling Policy</h5>--}}
{{--            <p>Any changes made to your reservation after the initial booking may incur a processing fee and are dependent on hotel room availability. Please note that Resort Fees and White Glove Service charges are non-refundable. These fees must be discussed directly with the Reservations department.--}}
{{--            </p>--}}

{{--            <h5 class="fw-bold">No Show / Unused Nights</h5>--}}
{{--            <p>No refunds for no-shows, early checkouts, or unused nights.</p>--}}

{{--            <h5 class="fw-bold">Activation</h5>--}}
{{--            <p>This email is your receipt. Please e-sign to confirm and activate your certificate.</p>--}}

{{--            @include('partials.e_signature', ['confirmation' => $confirmation])--}}

        </div>
    </div>

@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('signed'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Reservation Confirmed!',
                html: `
                <p>Thank you for signing your certificate.</p>
                <p><strong>Please check your email</strong> — we’ve sent your official purchase confirmation there.</p>
            `,
                confirmButtonText: 'OK',
                confirmButtonColor: '#198754',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(() => {
                location.reload(); // 🔄 refresh after clicking OK
            });
        </script>
    @endif

    <script>
        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas);

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
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Agreement',
                    text: 'Please check all agreement boxes before submitting.',
                    confirmButtonColor: '#d33'
                });
                return;
            }

            if (signaturePad.isEmpty()) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'No Signature',
                    text: 'Please provide your signature before submitting.',
                    confirmButtonColor: '#d33'
                });
                return;
            }

            document.getElementById('signature_data').value = signaturePad.toDataURL();

            // ✅ Remove e.preventDefault() here to allow submission
        });
    </script>
@endpush
