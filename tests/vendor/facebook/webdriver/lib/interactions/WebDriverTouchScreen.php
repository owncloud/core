<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//   http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * Interface representing touch screen operations.
 */
interface WebDriverTouchScreen {

  /**
   * Single tap on the touch enabled device.
   *
   * @param WebDriverElement $element
   * @return $this
   */
  public function tap(WebDriverElement $element);

  /**
   * Double tap on the touch screen using finger motion events.
   *
   * @param WebDriverElement $element
   * @return $this
   */
  public function doubleTap(WebDriverElement $element);

  /**
   * Finger down on the screen.
   *
   * @param int $x
   * @param int $y
   * @return $this
   */
  public function down($x, $y);

  /**
   * Flick on the touch screen using finger motion events. Use this flick
   * command if you don't care where the flick starts on the screen.
   *
   * @param int $xspeed
   * @param int $yspeed
   * @return $this
   */
  public function flick($xspeed, $yspeed);

  /**
   * Flick on the touch screen using finger motion events.
   * This flickcommand starts at a particular screen location.
   *
   * @param WebDriverElement $element
   * @param int              $xoffset
   * @param int              $yoffset
   * @param int              $speed
   * @return $this
   */
  public function flickFromElement(
    WebDriverElement $element, $xoffset, $yoffset, $speed);

  /**
   * Long press on the touch screen using finger motion events.
   *
   * @param WebDriverElement $element
   * @return $this
   */
  public function longPress(WebDriverElement $element);

  /**
   * Finger move on the screen.
   *
   * @param int $x
   * @param int $y
   * @return $this
   */
  public function move($x, $y);


  /**
   * Scroll on the touch screen using finger based motion events. Use this
   * command if you don't care where the scroll starts on the screen.
   *
   * @param int $xoffset
   * @param int $yoffset
   * @return $this
   */
  public function scroll($xoffset, $yoffset);

  /**
   * Scroll on the touch screen using finger based motion events. Use this
   * command to start scrolling at a particular screen location.
   *
   * @param WebDriverElement $element
   * @param int              $xoffset
   * @param int              $yoffset
   * @return $this
   */
  public function scrollFromElement(
    WebDriverElement $element, $xoffset, $yoffset);

  /**
   * Finger up on the screen.
   *
   * @param int $x
   * @param int $y
   * @return $this
   */
  public function up($x, $y);

}
