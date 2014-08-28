<?php
/**
 * Copyright (c) 2014 Morris Jobke <hey@morrisjobke.de>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC;

/**
 * OCMail
 *
 * A class to handle mail sending.
 */

class OCMail implements \OCP\IMail {

	/**
	 * send an email
	 *
	 * @param string $toaddress
	 * @param string $toname
	 * @param string $subject
	 * @param string $mailtext
	 * @param string $fromaddress
	 * @param string $fromname
	 * @param integer $html
	 * @param string $altbody
	 * @param string $ccaddress
	 * @param string $ccname
	 * @param string $bcc
	 * @throws Exception
	 */
	public function send($toaddress, $toname, $subject, $mailtext,
		$fromaddress, $fromname, $html=0, $altbody='', $ccaddress='',
		$ccname='', $bcc='') {

		\OC_Mail::send($toaddress, $toname, $subject, $mailtext, $fromaddress,
			$fromname, $html, $altbody, $ccaddress, $ccname, $bcc);
	}
}
