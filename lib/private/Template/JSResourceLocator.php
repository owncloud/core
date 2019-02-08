<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Michael Jobst <mjobst+github@tecratech.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
		$fullScript = $this->addExtension($script);
		$themeDirectory = $this->theme->getDirectory();
		$baseDirectory = $this->theme->getBaseDirectory();
		$webRoot = '';
		if ($baseDirectory !== $this->serverroot) {
			$webRoot = \substr($this->theme->getWebPath(), 0, -\strlen($themeDirectory));
		}

		if (\strpos($script, '/l10n/') !== false) {
			// For language files we try to load them all, so themes can overwrite
			// single l10n strings without having to translate all of them.
			$found = 0;
			$found += $this->appendOnceIfExist($this->serverroot, 'core/'.$fullScript);
			$found += $this->appendOnceIfExist($baseDirectory, $themeDirectory.'/core/'.$fullScript, $webRoot);
			$found += $this->appendOnceIfExist($this->serverroot, $fullScript);
			$found += $this->appendOnceIfExist($baseDirectory, $themeDirectory.'/'.$fullScript, $webRoot);
			$found += $this->appendOnceIfExist($baseDirectory, $themeDirectory.'/apps/'.$fullScript, $webRoot);

			if ($found) {
				return;
			}
		} elseif ($this->appendOnceIfExist($baseDirectory, $themeDirectory.'/apps/'.$fullScript, $webRoot)
			|| $this->appendOnceIfExist($baseDirectory, $themeDirectory.'/'.$fullScript, $webRoot)
			|| $this->appendOnceIfExist($this->serverroot, $fullScript)
			|| $this->appendOnceIfExist($baseDirectory, $themeDirectory.'/core/'.$fullScript, $webRoot)
			|| $this->appendOnceIfExist($this->serverroot, 'core/'.$fullScript)
		) {
			return;
		}

		$app = \substr($fullScript, 0, \strpos($fullScript, '/'));
		$fullScript = \substr($fullScript, \strpos($fullScript, '/')+1);
		$app_path = $this->appManager->getAppPath($app);
		if ($app_path === false) {
			return;
		}
		$app_url = $this->appManager->getAppWebPath($app);
		$app_url = ($app_url !== false) ? $app_url : null;

		// missing translations files will be ignored
		$this->appendOnceIfExist($app_path, $fullScript, $app_url);
	}

	/**
	 * @param string $script
	 */
	public function doFindTheme($script) {
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function addExtension($path) {
		return $path . '.js';
	}
}
