<h5 class="mt-5">Electronic Signature</h5>

@if($confirmation->sign_path)
    <p class="text-muted">This certificate has already been signed.</p>
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
    <div class="border rounded bg-light p-2 mb-4">
        <img src="{{ asset($confirmation->sign_path) }}" alt="Signed Signature" style="max-width: 100%; height: auto;">
    </div>
@else
    <form method="POST" action="{{ route('purchase.sign') }}" id="signature-form">
        @csrf
        <input type="hidden" name="linkID" value="{{ $confirmation->linkID }}">
        <input type="hidden" name="dataID" value="{{ $confirmation->id }}">
        <input type="hidden" name="signature_data" id="signature_data">

        <p>Please sign below to confirm you agree with the terms and conditions.</p>

        <div class="form-check mb-3">
            <input class="form-check-input me-2 border border-dark" type="checkbox" id="checkTerms">
            <label class="form-check-label" for="checkTerms">
                <strong>By checking this box</strong> I understand and agree with the Terms and Conditions and/or the Cancelation Policy as stated in this document.
            </label>
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input me-2 border border-dark" type="checkbox" id="checkSMS">
            <label class="form-check-label" for="checkSMS">
                <strong>By checking this box</strong> I understand and agree to receive SMS.
            </label>
        </div>

        <div class="border rounded bg-light mb-3">
            <canvas id="signature-pad" style="width: 100%; height: 200px;"></canvas>
        </div>

        <div class="mb-4">
            <button type="button" class="btn btn-secondary btn-sm" id="clear-signature">Clear</button>
            <button type="submit" class="btn btn-success btn-sm">Submit Signature</button>
        </div>
    </form>
@endif
