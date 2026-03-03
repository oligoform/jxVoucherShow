<?php

/**
 *    This file is part of the module jxVoucherShow for OXID eShop Community Edition.
 *
 *    The module jxVoucherShow for OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    The module jxVoucherShow for OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      https://github.com/job963/jxVoucherShow
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @copyright (C) 2015 Joachim Barthel
 * @author    Joachim Barthel <jobarthel@gmail.com>
 *
 */

namespace JxMods\JxVoucherShow\Application\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\DatabaseProvider;

class JxVoucherSerieShow extends AdminDetailsController
{

    protected $_sThisTemplate = 'jx_voucherserie_show.tpl';

    /**
     * Displays all vouchers of this series
     */
    public function render()
    {
        parent::render();

        $sVoucherserieId = $this->getEditObjectId();

        $sVoucherId = Registry::getRequest()->getRequestEscapedParameter('voucherid');
        if ($sVoucherId) {
            $sWhere = " v.oxid = :voucherid ";
            $params  = [':voucherid' => $sVoucherId];
            $this->_sThisTemplate = 'jx_voucherserie_showdetails.tpl';
        } else {
            $sWhere = " v.oxvoucherserieid = :voucherserieid ";
            $params  = [':voucherserieid' => $sVoucherserieId];
        }

        $sSql = "SELECT IF(v.oxdateused='0000-00-00',1,0) AS oxactive, v.oxid, v.oxdateused, v.oxvouchernr, v.oxdiscount, s.oxdiscounttype, v.oxuserid, "
                . "o.oxbillfname AS oxfname, o.oxbilllname AS oxlname, o.oxbillstreet AS oxstreet, o.oxbillstreetnr AS ostreetnr, o.oxbillzip AS oxzip, o.oxbillcity AS oxcity, "
                . "o.oxordernr, o.oxorderdate, o.oxtotalordersum, o.oxcurrency, v.oxvoucherserieid "
            . "FROM oxvouchers v "
            . "LEFT JOIN oxorder o ON (v.oxorderid = o.oxid) "
            . "LEFT JOIN oxvoucherseries s ON (v.oxvoucherserieid = s.oxid) "
            . "WHERE {$sWhere} "
            . "ORDER BY oxactive DESC, v.oxdateused DESC, v.oxvouchernr";

        $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
        $aVouchers = $oDb->getAll($sSql, $params);

        $this->_aViewData['aVouchers'] = $aVouchers;

        return $this->_sThisTemplate;
    }


    public function deleteVoucher()
    {
        $sVoucherId = Registry::getRequest()->getRequestEscapedParameter('voucherdelid');

        $sSql = "DELETE FROM oxvouchers WHERE oxid = :oxid";
        $oDb  = DatabaseProvider::getDb();
        $oDb->execute($sSql, [':oxid' => $sVoucherId]);
    }
}
