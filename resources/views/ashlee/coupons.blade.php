@extends('layouts.basic')


@section('content')
    <div class="container" style="width">
        <div class="nav"></div>
        <div class="header">
            <div class="col-md-6 col-md-offset-6">
                <h1>Ashlee's Coupons</h1><br>
                <div class="countdown">
                    <h2>Days Until Next Coupon:<span id="coupon-timer" style="color: {{ $daysRemaining == 0 ? 'green' : 'red' }}"> {{ $daysRemaining }}</span></h2>
                </div>
            </div>
        </div><br><br><br>
        @if (session()->has('message'))
            <div class="alert alert-danger">
                <h4>You have to wait!</h4>
            </div><br><br><br>
        @endif
        <div class="coupon-container">
            <div class="col-sm-12 col-md-9 col-md-offset-3">
                <table id="coupon-table" class="table table-striped table-hover">
                    @foreach($coupons as $id => $coupon)
                        <tr class="coupon-row" style="margin: 30px !important; padding: 30px;">
                            <td><p id="coupon-description">{{ $coupon->description }}</p></td>
                            <td>
                                @if ($coupon->redeemed == false)
                                    <form id="redeem-form-{{ $coupon->id }}" action="/forum/ashlee/{{ $coupon->id }}" method="post">
                                        {{ csrf_field() }}
                                        <button form="redeem-form-{{ $coupon->id }}" id="redeem-button" class="btn btn-primary">Redeem Coupon</button>
                                    </form>
                                @else
                                    <span class="alert alert-danger" style="padding: 0 10px 0 10px; width: 100%">
                                        Already Used
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
