@extends('layouts.app')

@section('content')
    @livewire('explore.index',['detail' => $resort_detail])
@endsection
{{--@push('js')--}}
{{--    <script>--}}
{{--        $wire.on('subSubmitted', () => {--}}
{{--            $('#addClose').click();--}}
{{--            $('#btn123').click();--}}
{{--        });--}}
{{--        $wire.on('remOrUp', () => {--}}
{{--            $('#resClose').click();--}}
{{--            $('#btn456').click();--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
@push('js')
    <!-- JS for Dynamic Child Age Inputs -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const childCount = document.getElementById('childCount');
            const container = document.getElementById('childAgesContainer');

            childCount.addEventListener('change', function () {
                const count = parseInt(this.value);
                container.innerHTML = '';

                for (let i = 1; i <= count; i++) {
                    const label = document.createElement('label');
                    label.className = 'form-label text-white mt-2';
                    label.innerText = `Child ${i} Age`;

                    const select = document.createElement('select');
                    select.className = 'form-select bg-dark text-white border-light mb-2';
                    select.name = `child_age_${i}`;

                    for (let age = 1; age <= 12; age++) {
                        const option = document.createElement('option');
                        option.value = age;
                        option.innerText = `${age} year${age > 1 ? 's' : ''} old`;
                        select.appendChild(option);
                    }

                    container.appendChild(label);
                    container.appendChild(select);
                }
            });
        });
    </script>
@endpush
