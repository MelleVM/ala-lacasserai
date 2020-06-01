{{-- pages/bookings.blade.php --}}

{{-- gebruikt 'app' layout --}}
@extends('layouts.app')

{{-- 'content' sectie --}}
@section('content')

<div class="modal-page-wrapper"></div>

<div class="section-1">
    <div class="wrapper">
        <div class="container text-align-center">
            <h1>My bookings</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="card-bookings invoice-box-list">
        <div class="card-header">
            {{-- Knop om de lijst met boekingen van de
                ingelogde gebruiker te downloaden in PDF formaat --}}
            <div onclick="CreatePDFfromHTML('list')" class="btn-outline-black"><i class="fas fa-download"></i> Export to PDF
            </div>
        </div>
        <div class="scroll-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>State</th>
                    <th>Payment Method</th>
                    <th>Payed</th>
                    <th>Price</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            {{-- Deze If statement checkt of er boekingen in de database zijn 
                waarvan de user_id overeenkomt met het id van de gebruiker --}}
            @if (count($bookings->where('user_id', Auth::user()->id)) > 0)
            {{-- Dit stukje HTML word herhaald voor elke boeking in de database
                waarvan de user_id overeenkomt met het id van de gebruiker --}}
            @foreach ($bookings->where('user_id', Auth::user()->id) as $booking)
            <tbody>
                <tr>
                    <td>{{$booking->room_number}}</td>
                    <td>{{$booking->state}}</td>
                    <td>{{$booking->payment_method}}</td>
                    <td>@if ($booking->payed == true) <span class="positive-text">True</span> @else <span
                            class="negative-text">False</span> @endif</td>
                    <td>€ {{$booking->price * $booking->nights}}</td>
                    <td>{{$booking->time_from}}</td>
                    <td>{{$booking->time_to}}</td>
                    <td>
                        {{-- Knop om dit factuur te downloaden in PDF formaat --}}
                        <div onclick="myFunction({{$booking->id}})" class="invoice-modal-btn btn-outline-red">VIEW
                            INVOICE</div>
                    </td>
                </tr>
            </tbody>
            @endforeach
            @else
            {{-- Dit stukje HTML word weergegeven als er geen boekingen in de
                database zijn waarvan de user_id overeenkomt met het id van de gebruiker  --}}
            <tr>
                <td>No bookings found.</td>
            </tr>
            @endif
        </table>
        </div>
    </div>
    {{-- Deze If statement checkt of er boekingen in de database zijn 
        waarvan de user_id overeenkomt met het id van de gebruiker --}}
     @if (count($bookings->where('user_id', Auth::user()->id)) > 0)
    {{-- Dit stukje HTML word herhaald voor elke boeking in de database
        waarvan de user_id overeenkomt met het id van de gebruiker --}}
    @foreach ($bookings->where('user_id', Auth::user()->id) as $booking)
    {{-- Dit is het Factuur --}}
    <div class="html-content invoice-box invoice-box-{{$booking->id}}">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="/storage/images/logo-small.png" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                Invoice #: {{$booking->id}}<br> Created: {{$booking->created_at}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                LaCasserai, Inc.<br> {{Auth::user()->postal_code}} {{Auth::user()->address}}<br>
                                {{Auth::user()->residence}}
                            </td>

                            <td>
                                {{Auth::user()->name}}<br> {{Auth::user()->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td colspan="3">Payment Method</td>
                <td>{{$booking->payment_method}}</td>
            </tr>

            <tr class="details">
                <td colspan="3">{{$booking->payment_method}}</td>
                <td>€{{$booking->price * $booking->nights}}</td>
            </tr>

            <tr class="heading">
                <td>Item</td>
                <td>Cost p/n</td>
                <td>Nights</td>
                <td>Price</td>
            </tr>

            <tr class="item" v-for="item in items">
                <td>Room</td>
                <td>€{{$booking->price}}</td>
                <td>2</td>
                <td>€{{$booking->price * $booking->nights}}</td>
            </tr>

            <tr>
                <td colspan="4">
                </td>
            </tr>

            <tr class="total">
                <td colspan="3">
                    <div onclick="CreatePDFfromHTML({{$booking->id}})" class="btn-outline-black">
                        <i class="fa fa-download"></i>
                        Export to PDF</div>
                </td>
                <td>Total: €{{$booking->price * $booking->nights}}</td>
            </tr>
        </table>
    </div>
    @endforeach
    @endif

    {{-- Dit stukje HTML is voor de "Featured" rooms, 
        oftewel kamers die een speciale actie hebben  --}}
    <div class="side-section">
        <h2>Featured Rooms</h2>
        <a href="/rooms/1" class="room">
            <img src="/storage/images/room-2.png" alt="">
            <div class="room-wrapper">
                <div class="discount-triangle"></div>
                <div class="discount-percentage-container">
                    <div class="discount-percentage">50%</div>
                    <div class="discount-percentage-off">off</div>
                </div>
                <div class="rating-container">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="location-container">
                    <div class="rating-text">Title</div>
                    <div class="location">Boston, MA</div>
                </div>
                <div class="price-container">
                    <div class="old-price">€50</div>
                    <div class="price">
                        <sup>€</sup>
                        50
                    </div>
                    <span class="time">/night</span>
                </div>
            </div>
        </a>
        <a href="/rooms/1" class="room">
            <img src="/storage/images/room-1.jpg" alt="">
            <div class="room-wrapper">
                <div class="discount-triangle"></div>
                <div class="discount-percentage-container">
                    <div class="discount-percentage">50%</div>
                    <div class="discount-percentage-off">off</div>
                </div>
                <div class="rating-container">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="location-container">
                    <div class="rating-text">Title</div>
                    <div class="location">Boston, MA</div>
                </div>
                <div class="price-container">
                    <div class="old-price">€50</div>
                    <div class="price">
                        <sup>€</sup>
                        50
                    </div>
                    <span class="time">/night</span>
                </div>
            </div>
        </a>
        <a href="/rooms/1" class="room">
            <img src="/storage/images/room-1.jpg" alt="">
            <div class="room-wrapper">
                <div class="discount-triangle"></div>
                <div class="discount-percentage-container">
                    <div class="discount-percentage">50%</div>
                    <div class="discount-percentage-off">off</div>
                </div>
                <div class="rating-container">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <div class="location-container">
                    <div class="rating-text">Title</div>
                    <div class="location">Boston, MA</div>
                </div>
                <div class="price-container">
                    <div class="old-price">€50</div>
                    <div class="price">
                        <sup>€</sup>
                        50
                    </div>
                    <span class="time">/night</span>
                </div>
            </div>
        </a>
    </div>
</div>


@endsection

{{-- Deze section is voor extra javacript die 
    alleen uitgevoerd moet worden op deze pagina --}}
@section('javascript')
<script>
    //Zorgt ervoor dat de modal tevoorschijn komt
    function myFunction(booking_id) {
        $('.modal-page-wrapper').show();
        $('.invoice-box-' + booking_id).fadeIn(300);
    }

    //Maakt PDF met HTML
    function CreatePDFfromHTML(booking_id) {
        var HTML_Width = $('.invoice-box-' + booking_id).width();
        var HTML_Height = $('.invoice-box-' + booking_id).height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($('.invoice-box-' + booking_id)[0]).then(function (canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width,
                canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4),
                    canvas_image_width, canvas_image_height);
            }
            pdf.save('invoice#' + booking_id + '.pdf');
        });
    }

</script>
@endsection
