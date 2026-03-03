# jxVoucherShow

OXID eShop 6 Admin Extension for Displaying all Vouchers of a Coupon Serie

## Requirements

- OXID eShop CE 6.x
- PHP 7.1+
- Composer

## Installation

### Method 1 — Composer with a tagged release (recommended)

This requires a git version tag on the repository (e.g. `v1.0.0`).

1. Register the GitHub repository as a Composer VCS source in your shop root:
   ```bash
   composer config repositories.jxvouchershow vcs https://github.com/oligoform/jxVoucherShow.git
   ```
2. Require the package:
   ```bash
   composer require jxmods/jxvouchershow
   ```
3. Activate the module:
   ```bash
   vendor/bin/oe-console oe:module:activate jxvouchershow
   ```
4. Clear the cache:
   ```bash
   vendor/bin/oe-console oe:cache:clear
   ```

### Method 2 — Composer from dev-master (no tag needed)

1. Register the repository and require the `dev-master` branch:
   ```bash
   composer config repositories.jxvouchershow vcs https://github.com/oligoform/jxVoucherShow.git
   composer require jxmods/jxvouchershow:dev-master
   ```
2. Activate the module and clear the cache (same as steps 3–4 above).

### Method 3 — Manual installation (without Composer)

1. Copy this module folder into your shop:
   ```
   <shop_root>/source/modules/jxmods/jxvouchershow/
   ```
2. Register the PSR-4 namespace in `<shop_root>/source/modules/composer.json`:
   ```json
   {
       "autoload": {
           "psr-4": {
               "JxMods\\JxVoucherShow\\": "jxmods/jxvouchershow/"
           }
       }
   }
   ```
3. Regenerate the Composer autoloader from the shop root:
   ```bash
   composer dump-autoload
   ```
4. Activate the module:
   ```bash
   vendor/bin/oe-console oe:module:activate jxvouchershow
   ```
   Or via the admin backend: _Extensions_ → _Modules_ → _jxVoucherShow_ → **Activate**.
5. Clear the cache:
   ```bash
   vendor/bin/oe-console oe:cache:clear
   ```

## Usage

Switch to the menu _Shop Settings_ → _Coupon Series_, choose a coupon series and switch to the tab _Display Coupons_.

Screenshot:  
![screenshot](https://github.com/oligoform/jxVoucherShow/raw/master/docs/img/vouchershow_tab-rs.png)
