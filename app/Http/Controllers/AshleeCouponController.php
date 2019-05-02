<?php

namespace App\Http\Controllers;

use App\AshleeCoupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AshleeCouponController extends Controller
{
    public function index()
    {
        $coupons = $this->getCoupons();
        $daysRemaining = $this->getDaysUntilNextCoupon();

        return view('ashlee.coupons', compact('coupons', 'daysRemaining'));
    }

    public function redeem($couponId)
    {
        $daysRemaining = $this->getDaysUntilNextCoupon();
        if ($daysRemaining > 0) {
            $message = 'You still have ' . $daysRemaining . ' until you can redeem a coupon';
            return redirect()->back()->with('message', $message);
        }
        $now = new Carbon();
        $coupon = AshleeCoupon::where('id', '=', $couponId)->first();
        $coupon->redeemed = true;
        $coupon->redeemed_at = $now;
        $coupon->save();

        return view('ashlee.redeem');
    }

    private function getDaysUntilNextCoupon()
    {
        $now = new Carbon();
        $lastCouponDate = new Carbon(AshleeCoupon::max('redeemed_at'));
        $nextCouponDate = $lastCouponDate->copy()->addDays(7);
        if ($nextCouponDate <= $now || $lastCouponDate = $now) {
            $days = 0;
        } else {
            $days = $nextCouponDate->diffInDays($now);
        }
        if ($days < 0) {
            $days = 0;
        }
        return $days;
    }

    protected function getCoupons()
    {
        $coupons = AshleeCoupon::get();

        return $coupons;
    }
}

