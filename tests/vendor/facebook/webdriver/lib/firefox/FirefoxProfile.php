<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

class FirefoxProfile {

  /**
   * @var array
   */
  private $preferences = array();

  /**
   * @var array
   */
  private $extensions = array();

  /**
   * @param string $extension The path to the xpi extension.
   * @return FirefoxProfile
   */
  public function addExtension($extension) {
    $this->extensions[] = $extension;
    return $this;
  }

  /**
   * @param string $key
   * @param string|bool|int $value
   * @return FirefoxProfile
   */
  public function setPreference($key, $value) {
    if (is_string($value)) {
      $value = sprintf('"%s"', $value);
    } else if (is_int($value)) {
      $value = sprintf('%d', $value);
    } else if (is_bool($value)) {
      $value = $value ? 'true' : 'false';
    } else {
      throw new WebDriverException(
        'The value of the preference should be either a string, int or bool.');
    }
    $this->preferences[$key] = $value;
    return $this;
  }

  /**
   * @return string
   */
  public function encode() {
    $temp_dir = $this->createTempDirectory('WebDriverFirefoxProfile');

    foreach ($this->extensions as $extension) {
      $this->installExtension($extension, $temp_dir);
    }

    $content = "";
    foreach ($this->preferences as $key => $value) {
      $content .= sprintf("user_pref(\"%s\", %s);\n", $key, $value);
    }
    file_put_contents($temp_dir.'/user.js', $content);

    $zip = new ZipArchive();
    $temp_zip = tempnam('', 'WebDriverFirefoxProfileZip');
    $zip->open($temp_zip, ZipArchive::CREATE);

    $dir = new RecursiveDirectoryIterator($temp_dir);
    $files = new RecursiveIteratorIterator($dir);
    foreach ($files as $name => $object) {
      if (is_dir($name)) {
        continue;
      }
      $dir_prefix = preg_replace(
        '#\\\\#',
        '\\\\\\\\',
        $temp_dir.DIRECTORY_SEPARATOR
      );
      $path = preg_replace("#^{$dir_prefix}#", "", $name);
      $zip->addFile($name, $path);
    }
    $zip->close();

    $profile = base64_encode(file_get_contents($temp_zip));
    return $profile;
  }

  /**
   * @param string $extension The path to the extension.
   * @param string $profile_dir The path to the profile directory.
   * @return string The path to the directory of this extension.
   */
  private function installExtension($extension, $profile_dir) {
    $temp_dir = $this->createTempDirectory();

    $this->extractTo($extension, $temp_dir);

    $install_rdf_path = $temp_dir.'/install.rdf';
    // This is a hacky way to parse the id since there is no offical
    // RDF parser library.
    $matches = array();
    $xml = file_get_contents($install_rdf_path);
    preg_match('#<em:id>([^<]+)</em:id>#', $xml, $matches);
    $ext_dir = $profile_dir.'/extensions/'.$matches[1];

    mkdir($ext_dir, 0777, true);

    $this->extractTo($extension, $ext_dir);
    return $ext_dir;
  }

  /**
   * @param string $prefix Prefix of the temp directory.
   * @return string The path to the temp directory created.
   */
  private function createTempDirectory($prefix = '') {
    $temp_dir = tempnam('', $prefix);
    if (file_exists($temp_dir)) {
      unlink($temp_dir);
      mkdir($temp_dir);
      if (!is_dir($temp_dir)) {
        throw new WebDriverException('Cannot create firefox profile.');
      }
    }
    return $temp_dir;
  }

  /**
   * @param string $xpi The path to the .xpi extension.
   * @param string $target_dir The path to the unzip directory.
   * @return FirefoxProfile
   */
  private function extractTo($xpi, $target_dir) {
    $zip = new ZipArchive();
    if ($zip->open($xpi)) {
      $zip->extractTo($target_dir);
      $zip->close();
    } else {
      throw new Exception("Failed to open the firefox extension. '$xpi'");
    }
    return $this;
  }
}
