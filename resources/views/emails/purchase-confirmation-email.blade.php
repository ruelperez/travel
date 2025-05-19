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

            <h5 class="mt-4 fw-bold">Your Vacation Package Includes:</h5>
            <table class="table table-bordered text-center small">
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
                    <td>Mexico</td>
                    <td>OPEN</td>
                    <td>All Inclusive</td>
                    <td>4</td>
                    <td></td>
                    <td>{{$confirmation->package}}</td>
                </tr>
                </tbody>
            </table>

            <p>**This Certificate is for 2 adults and 2 children 12 years of age or under.  Pricing for any
                additional persons, extra nights or room upgrades will be quoted by the Reservations
                department during the booking process**</p>
            <p>Airport pick up service is available for a fee.</p>
            <p>Purchasers of multi-destination packages MUST travel to Mexico first AND meet all
                qualifications in order to validate subsequent certificates.</p>
            <p>With this promotional package, attendance to a 90 minute tour and presentation is
                obligatory.</p>
            <p>Presentations are normally scheduled for the first morning after your arrival to the
                destination. Concierge team may reschedule the date of your presentation as
                required.</p>
            <p>Package price does NOT include the Resort Fee per adult, per night.</p>
            <p>Resort Fees must be paid during the verification call, once your travel dates have
                been confirmed, in order to receive your hotel confirmation. Resort Fees must be
                paid with a major credit card in order to receive your hotel confirmation.  You must meet all
                the terms for qualification at the time of your reservation in order for us to issue you with a
                confirmation number for your hotel stay.</p>
            <p>If the advertised hotel does not have rooms available when you make your reservation, you will be given the option of a similar
                offer in another hotel of like quality and features.</p>

            <h5 class="fw-bold mt-4">Terms and Conditions</h5>
            <p>This is a one time only promotional offer.  Attendance by all persons in the Mexico
                reservation to a 90 minute breakfast and presentation is mandatory.
                This package cannot be used in the same destination during the same or similar dates as
                family / friends who are travelling on any other promotional reservation.
                If family or friends are attending the same presentation during similar dates, this
                promotional package will be deemed invalid unless a higher nightly rate is paid in order to
                confirm your stay.  Does not apply when travelling with Universal Vacation Club members
                using their membership.  This package may not be used by Villa Group members.</p>
            <h5 class="fw-bold"> Re-Scheduling Policy</h5>
            <p>Once your reservation is made with us, you may re-schedule or make changes one time
                with no fees only if your change request is received at least 10 days before your scheduled
                arrival. Subsequent changes to your reservation are subject to a $99 processing fee and are subject
                to hotel room availability.</p>
            <h5 class="fw-bold">Cancellation Policy</h5>
            <p>We value your business and understand that travel plans can change. Please read our
                cancellation and refund policy carefully before finalizing your purchase:
                <br><br>
                You have 24 hours to cancel without penalty by calling (210) 272-9169 or by email
                to bookings@greenescapestravel.com or admin@greenescapestravel.com. After the 24-hour
                grace period, any cancellation will be subject to a 50% cancellation fee based on the total
                package cost. This fee covers prepaid accommodations, reservations, and administrative
                costs.
                <br><br>
                If you are unable to use the package, it may be transferred to another qualified
                individual.
                <br><br>
                All packages become non-refundable after their original expiration date.
                <br><br>
                No extension may be granted unless specified on a written support.
                <br><br>
                NO SHOW, EARLY CHECKOUT OR UNUSED NIGHTS.
                <br><br>
                No refunds will be given for no-shows, early checkouts or unused nights.
            </p>

            <h5 class="fw-bold">Activation</h5>
            <p>This email is your official receipt of a certificate purchase. To activate your certificate, it is necessary to send this document back to
                us, with your electronic signature on it to let us know that you acknowledge and accept the terms and conditions, and the
                cancellation policy.</p>

            <p style="font-size: 13px; color: #888; text-align: center;">
                <a href="{{ url('/purchase-confirmation/' . $confirmation->linkID) }}" style="color: #0b5ed7;">This email is your official receipt of a certificate purchase. Please e-sign and return, thank you.</a>
            </p>

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
