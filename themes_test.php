<?php

/**
* ownCloud
*
* @author Frank Karlitschek
* @copyright 2010 Frank Karlitschek karlitschek@kde.org
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/
try {

	require_once 'lib/base.php';

	$l10n = new OC_L10N('settings');
	print_r($l10n->getTranslations());
	$b = '<br>';
	$lang = 'ko';
	$app = OC_App::cleanAppId('settings');
	echo $app.$b;
	echo OC_App::getAppPath($app).$b;
	echo file_exists(OC_App::getAppPath($app).'/l10n/')?'true':'false';
	echo $b;
	$i18ndir = OC::$SERVERROOT.'/'.$app.'/l10n/';
	echo $i18ndir.$b;
	$transFile = strip_tags($i18ndir).strip_tags($lang).'.php';
	echo $transFile.$b;
	echo OC_Util::encryptText('oc_owncloud').$b;
	echo OC_Util::encryptText('facc7377cfcd54de12e9012547819c').$b;
} catch (Exception $ex) {
	\OCP\Util::logException('index', $ex);

	//show the user a detailed error page
	OC_Response::setStatus(OC_Response::STATUS_INTERNAL_SERVER_ERROR);
	OC_Template::printExceptionErrorPage($ex);
}
