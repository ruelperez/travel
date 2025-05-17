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
@push('css')
    <style>
        body {
            background: linear-gradient(to bottom, #ffffff, #f9f9ff);
        }

        .carousel-inner img {
            transition: transform 0.3s ease;
        }

        .carousel-inner img:hover {
            transform: scale(1.05);
        }

        .btn-glow {
            animation: pulseGlow 1.5s infinite;
            transition: transform 0.2s ease;
        }

        .btn-glow:hover {
            transform: scale(1.05);
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 0px rgba(255, 255, 0, 0.6); }
            50% { box-shadow: 0 0 20px rgba(255, 193, 7, 0.8); }
            100% { box-shadow: 0 0 0px rgba(255, 255, 0, 0.6); }
        }

        .animated-section {
            animation: fadeSlideUp 0.8s ease-in-out;
        }

        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .tab-item {
            transition: background 0.3s ease;
        }

        .tab-item:hover {
            background-color: #f0f0f0;
        }

        .call-card {
            animation: popIn 0.9s ease-out;
        }

        @keyframes popIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
@endpush
