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

/**
 * The class manages the capabilities in ChromeDriver.
 *
 * @see https://sites.google.com/a/chromium.org/chromedriver/capabilities
 */
class ChromeOptions {

  /**
   * The key of chrome options in desired capabilities.
   */
  const CAPABILITY = "chromeOptions";

  /**
   * @var array
   */
  private $arguments = array();

  /**
   * @var string
   */
  private $binary = '';

  /**
   * @var array
   */
  private $extensions = array();

  /**
   * @var array
   */
  private $experimentalOptions = array();

  /**
   * Sets the path of the Chrome executable. The path should be either absolute
   * or relative to the location running ChromeDriver server.
   *
   * @param string $path
   * @return ChromeOptions
   */
  public function setBinary($path) {
    $this->binary = $path;
    return $this;
  }

  /**
   * @param array $arguments
   * @return ChromeOptions
   */
  public function addArguments(array $arguments) {
    $this->arguments = array_merge($this->arguments, $arguments);
    return $this;
  }

  /**
   * Add a Chrome extension to install on browser startup. Each path should be
   * a packed Chrome extension.
   *
   * @param array $paths
   * @return ChromeOptions
   */
  public function addExtensions(array $paths) {
    foreach ($paths as $path) {
      $this->addExtension($path);
    }
    return $this;
  }

  /**
   * @param array $encoded_extensions An array of base64 encoded of the
   *                                  extensions.
   * @return ChromeOptions
   */
  public function addEncodedExtensions(array $encoded_extensions) {
    foreach ($encoded_extensions as $encoded_extension) {
      $this->addEncodedExtension($encoded_extension);
    }
    return $this;
  }

  /**
   * Sets an experimental option which has not exposed officially.
   *
   * @param string $name
   * @param mixed $value
   * @return ChromeOptions
   */
  public function setExperimentalOption($name, $value) {
    $this->experimentalOptions[$name] = $value;
    return $this;
  }

  /**
   * @return DesiredCapabilities The DesiredCapabilities for Chrome with this
   *                             options.
   */
  public function toCapabilities() {
    $capabilities = DesiredCapabilities::chrome();
    $capabilities->setCapability(self::CAPABILITY, $this);
    return $capabilities;
  }

  /**
   * @return array
   */
  public function toArray() {
    $options = $this->experimentalOptions;

    // The selenium server expects a 'dictionary' instead of a 'list' when
    // reading the chrome option. However, an empty array in PHP will be
    // converted to a 'list' instead of a 'dictionary'. To fix it, we always
    // set the 'binary' to avoid returning an empty array.
    $options['binary'] = $this->binary;

    if ($this->arguments) {
      $options['args'] = $this->arguments;
    }

    if ($this->extensions) {
      $options['extensions'] = $this->extensions;
    }

    return $options;
  }

  /**
   * Add a Chrome extension to install on browser startup. Each path should be a
   * packed Chrome extension.
   *
   * @param string $path
   * @return ChromeOptions
   */
  private function addExtension($path) {
    $this->addEncodedExtension(base64_encode(file_get_contents($path)));
    return $this;
  }

  /**
   * @param string $encoded_extension Base64 encoded of the extension.
   * @return ChromeOptions
   */
  private function addEncodedExtension($encoded_extension) {
    $this->extensions[] = $encoded_extension;
    return $this;
  }
}
