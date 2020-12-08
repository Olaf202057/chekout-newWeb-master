@extends('app.user.account')

@section('title')
    <title>Chekout</title>
@endsection

@section('account_right_panel')
    <!-- slider -->
    <section class="profile_setting">
        <div class="profile_avatar">
            <img src="{{ asset('img/user.jfif') }}" class="img-fluid" alt="Logo" style="width:60px;height:60px;">
            <div class="profile_user_infos">
                <span style="font-weight: bold;">{{ ($fs_user->firstName ?? '') . ($fs_user->lastName ?? '') }}</span>
                <span class="text-dark">{{ $fs_user->email ?? 'email@example.com' }}</span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="addresses ml-4">
                    <h4 style="width: 100%">Saved Addresses ({{count($addresses)}})
                        <a data-toggle="collapse" id="address-btn"
                           href="#collapseAddress" role="button"
                           aria-expanded="false"
                           aria-controls="collapseExample"><i
                                style="float:right" class="fas fa-angle-up pr-4"></i></a></h4>
                    <div class="collapse show" id="collapseAddress">
                        @foreach($addresses as $address)
                            <div class="card mb-2">
                                <form action="{{ route('app.user.address.delete') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <span>Name</span>
                                                <input type="text" class="form-control" name="title"
                                                       value="{{ $address['title'] ?? ''}}" disabled>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <span>Street Address</span>
                                                <input type="text" class="form-control" name="address1"
                                                       value="{{ $address['line1'] ?? ''}}" disabled>
                                            </div>
                                            <div class="col-6">
                                                <span>Address 2</span>
                                                <input type="text" class="form-control" name="address2"
                                                       value="{{ $address['line2'] ?? ''}}" disabled>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-4">
                                                <span>City</span>
                                                <input type="text" class="form-control" name="city"
                                                       value="{{ $address['city'] ?? ''}}" disabled>
                                            </div>
                                            <div class="col-4">
                                                <span>State</span>
                                                <input type="text" class="form-control" name="state"
                                                       value="{{ $address['state'] ?? '' }}" disabled>
                                            </div>
                                            <div class="col-4">
                                                <span>Zip</span>
                                                <input type="text" class="form-control" name="zip"
                                                       value="{{ $address['zip'] ?? ''}}" disabled>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $address['address_id'] }}">
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-outline-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                        <div class="card">
                            <form action="{{ route('app.user.address.add') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    @csrf
                                    <h5>New Address</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Name</span>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <span>Street Address</span>
                                            <input type="text" class="form-control" name="address1">
                                        </div>
                                        <div class="col-6">
                                            <span>Address 2</span>
                                            <input type="text" class="form-control" name="address2">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-4">
                                            <span>City</span>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                        <div class="col-4">
                                            <span>State</span>
                                            <input type="text" class="form-control" name="state">
                                        </div>
                                        <div class="col-4">
                                            <span>Zip</span>
                                            <input type="text" class="form-control" name="zip">
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-outline-dark">Save Address</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="cards ml-4">
                    <h4 style="width: 100%">Saved Cards ({{count($cards)}})
                        <a data-toggle="collapse" id="address-btn"
                           href="#collapseExample" role="button"
                           aria-expanded="false"
                           aria-controls="collapseExample"><i
                                style="float:right" class="fas fa-angle-up pr-4"></i></a></h4>
                    <div class="collapse show" id="collapseExample">
                        @foreach($cards as $card)
                            <div class="card mb-2">
                                <form action="{{ route('app.user.card.delete') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                Name: {{ $card['card']['title'] ?? '' }}
                                            </div>
                                            <div class="col-3">
                                                Brand: {{ $card['card']['brand'] ?? '' }}
                                            </div>
                                            <div class="col-3">
                                                Last Four: {{ $card['card']['last4'] ?? ''}}
                                            </div>
                                            <div class="col-3">
                                                Exp: {{ $card['card']['exp_month'] ?? 00}}
                                                /{{ $card['card']['exp_year'] ?? 00 }}
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $card['card']['id'] }}">
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-outline-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                        <div class="card">
                            <form action="{{ route('app.user.card.store') }}" id="card-form" method="POST">
                                @csrf
                                <div class="card-body">
                                    <h5>New Card</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Name</span>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <span for="card-element">Cardholder
                                                    Name</span>
                                                <input type="text" id="cardholder-name"
                                                       class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-0">
                                        <div class="col-12">
                                            <span for="card-element">Card</span>
                                            <div id="card-element"
                                                 class="form-control"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-outline-dark" id="save-card">Save Card</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>

    <div class="modal fade" id="add-email-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width:300px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-option-modal-label">Add Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="option-attachment-body-content">
                    <form id="option-edit-form" class="form-horizontal" method="POST" action="">
                        <div class="card text-white bg-dark mb-0" style="background-color:black!important;">

                            <div class="card-body">
                                <!-- id -->
                                <div class="form-group">
                                    <label class="col-form-label" for="modal-input-email">Email Address</label>
                                    <input type="text" name="modal-input-email" class="form-control"
                                           id="modal-input-email" required="">
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="modal_done">Done</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function () {
            var stripe = Stripe('{{ env('STRIPE_TOKEN') }}');
            var elements = stripe.elements();
            var cardElement = elements.create('card');
            cardElement.mount('#card-element');

            $('#save-card').on('click', function () {
                var cardholder = $('#cardholder-name').val();
                stripe.createToken(cardElement).then(function (result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        var paymentMethodId = result.token.id;
                        var lastfour = result.token.card.last4;
                        var form = $('#card-form');
                        form.append('<input name="paymentmethod" type="hidden" value="' + paymentMethodId + '">');
                        form.append('<input name="lastfour" type="hidden" value="' + lastfour + '">');
                        form.append('<input name="fulltoken" type="hidden" value=' + btoa(JSON.stringify(result.token)) + '">');
                        form.submit();
                    }
                });
            });

            var email = '';
            $(".profile_emails").on("click", "#add_email", function () {
                var options = {
                    'backdrop': 'static'
                };

                $('#add-email-modal').modal(options)
            });

            $('#modal_done').on('click', function () {
                email = $("#modal-input-email").val();
                $(".profile_email_items").append('<span class="profile_email" style="font-size:15px; font-weight: bold; margin-bottom:10px">' + email + '</span>');
                //$("#add_email").hide();
            });
            $('#address-btn').on('click', function () {
                if ($(this).find('i').hasClass('fa-angle-up')) {
                    $(this).find('i').addClass('fa-angle-down').removeClass('fa-angle-up');
                } else {
                    $(this).find('i').addClass('fa-angle-up').removeClass('fa-angle-down');
                }
            });
        });


    </script>
@endpush

