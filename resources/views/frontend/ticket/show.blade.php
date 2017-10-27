@extends('frontend.layouts.app')

@section('content')

    <div class="container">
        @include('frontend.ticket/partials.ticket')
    </div>

@endsection

@section('after-scripts')
    <script>
        // here
        var map, marker;
        var coordinates = {lat: {{ $ticket->lat }}, lng: {{ $ticket->lng }}};
        function initMap() {
        // Styles a map in night mode.
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: coordinates,
                mapTypeId: 'roadmap',
                styles: [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#00d1b2"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ]
            });

            // Create markers.
            marker = new google.maps.Marker({
                position: coordinates,
                map: map,
                title: '{{ $ticket->location }}'
            });
        }

        $('#googleMap').on('shown.bs.modal', function () {
            google.maps.event.trigger(map, "resize");
            map.setCenter( coordinates );
        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ3sVI--2Wyufx7Px5SdtFO02ePS_QyxE&callback=initMap"></script>
@endsection