<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Michael Jobst <mjobst+github@tecratech.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Template;

class JSResourceLocator extends ResourceLocator {
	/**
	 * @param string $script
	 */
	public function doFind($script) {
		$themeDirectory = $this->theme->getDirectory();

		if (strpos($script, '3rdparty') === 0
			&& $this->appendOnceIfExist($this->thirdpartyroot, $script.'.js')) {
			return;
		}

		if (strpos($script, '/l10n/') !== false) {
			// For language files we try to load them all, so themes can overwrite
			// single l10n strings without having to translate all of them.
			$found = 0;
			$found += $this->appendOnceIfExist($this->serverroot, 'core/'.$script.'.js');
			$found += $this->appendOnceIfExist($this->serverroot, $themeDirectory.'/core/'.$script.'.js');
			$found += $this->appendOnceIfExist($this->serverroot, $script.'.js');
			$found += $this->appendOnceIfExist($this->serverroot, $themeDirectory.'/'.$script.'.js');
			$found += $this->appendOnceIfExist($this->serverroot, $themeDirectory.'/apps/'.$script.'.js');

			if ($found) {
				return;
			}
		} else if ($this->appendOnceIfExist($this->serverroot, $themeDirectory.'/apps/'.$script.'.js')
			|| $this->appendOnceIfExist($this->serverroot, $themeDirectory.'/'.$script.'.js')
			|| $this->appendOnceIfExist($this->serverroot, $script.'.js')
			|| $this->appendOnceIfExist($this->serverroot, $themeDirectory.'/core/'.$script.'.js')
			|| $this->appendOnceIfExist($this->serverroot, 'core/'.$script.'.js')
		) {
			return;
		}

		$app = substr($script, 0, strpos($script, '/'));
		$script = substr($script, strpos($script, '/')+1);
		$app_path = \OC_App::getAppPath($app);
		if( $app_path === false ) { return; }
		$app_url = \OC_App::getAppWebPath($app);
		$app_url = ($app_url !== false) ? $app_url : null;

		// missing translations files fill be ignored
		$this->appendOnceIfExist($app_path, $script . '.js', $app_url);
	}

	/**
	 * @param string $script
	 */
	public function doFindTheme($script) {
	}
}
