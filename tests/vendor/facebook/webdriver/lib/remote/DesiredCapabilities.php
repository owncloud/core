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

class DesiredCapabilities implements WebDriverCapabilities {

  private $capabilities;

  public function __construct(array $capabilities = array()) {
    $this->capabilities = $capabilities;
  }

  /**
   * @return string The name of the browser.
   */
  public function getBrowserName() {
    return $this->get(WebDriverCapabilityType::BROWSER_NAME, '');
  }

  /**
   * @param string $browser_name
   * @return DesiredCapabilities
   */
  public function setBrowserName($browser_name) {
    $this->set(WebDriverCapabilityType::BROWSER_NAME, $browser_name);
    return $this;
  }

  /**
   * @return string The version of the browser.
   */
  public function getVersion() {
    return $this->get(WebDriverCapabilityType::VERSION, '');
  }

  /**
   * @param string $version
   * @return DesiredCapabilities
   */
  public function setVersion($version) {
    $this->set(WebDriverCapabilityType::VERSION, $version);
    return $this;
  }

  /**
   * @param string $name
   * @return mixed The value of a capability.
   */
  public function getCapability($name) {
    return $this->get($name);
  }

  /**
   * @param string $name
   * @param mixed $value
   * @return DesiredCapabilities
   */
  public function setCapability($name, $value) {
    $this->set($name, $value);
    return $this;
  }

  /**
   * @return string The name of the platform.
   */
  public function getPlatform() {
    return $this->get(WebDriverCapabilityType::PLATFORM, '');
  }

  /**
   * @param string $platform
   * @return DesiredCapabilities
   */
  public function setPlatform($platform) {
    $this->set(WebDriverCapabilityType::PLATFORM, $platform);
    return $this;
  }

  /**
   * @param string $capability_name
   * @return bool Whether the value is not null and not false.
   */
  public function is($capability_name) {
    return (bool) $this->get($capability_name);
  }

  /**
   * @return bool Whether javascript is enabled.
   */
  public function isJavascriptEnabled() {
    return $this->get(WebDriverCapabilityType::JAVASCRIPT_ENABLED, false);
  }

  /**
   * This is a htmlUnit-only option.
   *
   * @param bool $enabled
   * @return DesiredCapabilities
   * @see https://code.google.com/p/selenium/wiki/DesiredCapabilities#Read-write_capabilities
   */
  public function setJavascriptEnabled($enabled) {
    $browser = $this->getBrowserName();
    if ($browser && $browser !== WebDriverBrowserType::HTMLUNIT) {
      throw new Exception(
        'isJavascriptEnable() is a htmlunit-only option. '.
        'See https://code.google.com/p/selenium/wiki/DesiredCapabilities#Read-write_capabilities.'
      );
    }

    $this->set(WebDriverCapabilityType::JAVASCRIPT_ENABLED, $enabled);
    return $this;
  }

  /**
   * @return array
   */
  public function toArray() {
    if (isset($this->capabilities[ChromeOptions::CAPABILITY]) &&
      $this->capabilities[ChromeOptions::CAPABILITY] instanceof ChromeOptions) {
      $this->capabilities[ChromeOptions::CAPABILITY] =
        $this->capabilities[ChromeOptions::CAPABILITY]->toArray();
    }

    if (isset($this->capabilities[FirefoxDriver::PROFILE]) &&
      $this->capabilities[FirefoxDriver::PROFILE] instanceof FirefoxProfile) {
      $this->capabilities[FirefoxDriver::PROFILE] =
        $this->capabilities[FirefoxDriver::PROFILE]->encode();
    }

    return $this->capabilities;
  }

  /**
   * @param string $key
   * @param mixed $value
   * @return DesiredCapabilities
   */
  private function set($key, $value) {
    $this->capabilities[$key] = $value;
    return $this;
  }

  /**
   * @param string $key
   * @param mixed $default
   * @return mixed
   */
  private function get($key, $default = null) {
    return isset($this->capabilities[$key])
           ? $this->capabilities[$key]
           : $default;
  }

  /**
   * @return DesiredCapabilities
   */
  public static function android() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::ANDROID,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::ANDROID,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function chrome() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::CHROME,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::ANY,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function firefox() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::FIREFOX,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::ANY,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function htmlUnit() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::HTMLUNIT,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::ANY,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function htmlUnitWithJS() {
    $caps = new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::HTMLUNIT,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::ANY,
    ));
    return $caps->setJavascriptEnabled(true);
  }

  /**
   * @return DesiredCapabilities
   */
  public static function internetExplorer() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::IE,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::WINDOWS,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function iphone() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::IPHONE,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::MAC,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function ipad() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::IPAD,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::MAC,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function opera() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::OPERA,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::ANY,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function safari() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::SAFARI,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::ANY,
    ));
  }

  /**
   * @return DesiredCapabilities
   */
  public static function phantomjs() {
    return new DesiredCapabilities(array(
      WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::PHANTOMJS,
      WebDriverCapabilityType::PLATFORM => WebDriverPlatform::ANY,
    ));
  }
}
