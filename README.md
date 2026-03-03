# jxVoucherShow

OXID eShop 6 Admin Extension for Displaying all Vouchers of a Coupon Serie

## Requirements

- OXID eShop CE 6.x
- PHP 7.1+
- Composer

## Installation

### Via Composer (recommended)

1. Add the package to your shop's `composer.json`:
   ```bash
   composer require jxmods/jxvouchershow
   ```
2. Activate the module in the admin backend under _Extensions_ → _Modules_.

### Manual installation

1. Copy the module folder into `<shop_root>/source/modules/jxmods/jxvouchershow/`.
2. Add the namespace to `<shop_root>/source/modules/composer.json`:
   ```json
   "autoload": {
       "psr-4": {
           "JxMods\\JxVoucherShow\\": "jxmods/jxvouchershow/"
       }
   }
   ```
3. Run `composer dump-autoload` from the shop root.
4. Navigate in the admin backend to _Extensions_ → _Modules_, select _jxVoucherShow_ and click `Activate`.

## Usage

Switch to the menu _Shop Settings_ → _Coupon Series_, choose a coupon series and switch to the tab _Display Coupons_.

Screenshot:  
![screenshot](https://github.com/job963/jxVoucherShow/raw/master/docs/img/vouchershow_tab-rs.png)
