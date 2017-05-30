<?php
/**
 * ownCloud - HTTP authentication backend - authentication page
 *
 * @author Adam Williamson
 * @copyright 2014 Adam Williamson - adamw@happyassassin.net
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

require_once 'lib/base.php';
$url = OC_Util::getDefaultPageUrl();
$error_msg = "Server authentication failed.";
$hint = 'You can <a href= "'.$url.'">click here to log in with a password.</a>';
$errors = array(array('error' => $error_msg, 'hint' => $hint));
$tmpl = new OC_Template("core", "error", "guest");
$tmpl->assign('errors', $errors);
$tmpl->printPage();
