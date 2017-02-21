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
 * The basic 8 mechanisms supported by webdriver to locate a web element.
 * ie. 'class name', 'css selector', 'id', 'name', 'link text',
 *     'partial link text', 'tag name' and 'xpath'.
 *
 * @see WebDriver::findElement, WebDriverElement::findElement
 */
class WebDriverBy {

  private $mechanism;
  private $value;

  protected function __construct($mechanism, $value) {
    $this->mechanism = $mechanism;
    $this->value = $value;
  }

  /**
   * @return string
   */
  public function getMechanism() {
    return $this->mechanism;
  }

  /**
   * @return string
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * Locates elements whose class name contains the search value; compound class
   * names are not permitted.
   *
   * @param string $class_name
   * @return WebDriverBy
   */
  public static function className($class_name) {
    return new WebDriverBy('class name', $class_name);
  }

  /**
   * Locates elements matching a CSS selector.
   *
   * @param string $css_selector
   * @return WebDriverBy
   */
  public static function cssSelector($css_selector) {
    return new WebDriverBy('css selector', $css_selector);
  }

  /**
   * Locates elements whose ID attribute matches the search value.
   *
   * @param string $id
   * @return WebDriverBy
   */
  public static function id($id) {
    return new WebDriverBy('id', $id);
  }

  /**
   * Locates elements whose NAME attribute matches the search value.
   *
   * @param string $name
   * @return WebDriverBy
   */
  public static function name($name) {
    return new WebDriverBy('name', $name);
  }

  /**
   * Locates anchor elements whose visible text matches the search value.
   *
   * @param string $link_text
   * @return WebDriverBy
   */
  public static function linkText($link_text) {
    return new WebDriverBy('link text', $link_text);
  }

  /**
   * Locates anchor elements whose visible text partially matches the search
   * value.
   *
   * @param string $partial_link_text
   * @return WebDriverBy
   */
  public static function partialLinkText($partial_link_text) {
    return new WebDriverBy('partial link text', $partial_link_text);
  }

  /**
   * Locates elements whose tag name matches the search value.
   *
   * @param string $tag_name
   * @return WebDriverBy
   */
  public static function tagName($tag_name) {
    return new WebDriverBy('tag name', $tag_name);
  }

  /**
   * Locates elements matching an XPath expression.
   *
   * @param string $xpath
   * @return WebDriverBy
   */
  public static function xpath($xpath) {
    return new WebDriverBy('xpath', $xpath);
  }
}
