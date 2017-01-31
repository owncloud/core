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
 * Execute touch commands for RemoteWebDriver.
 */
class RemoteTouchScreen implements WebDriverTouchScreen {

  /**
   * @var RemoteExecuteMethod
   */
  private $executor;

  /**
   * @param RemoteExecuteMethod $executor
   */
  public function __construct(RemoteExecuteMethod $executor) {
      $this->executor = $executor;
  }

  /**
   * @param WebDriverElement $element
   *
   * @return RemoteTouchScreen The instance.
   */
  public function tap(WebDriverElement $element) {
    $this->executor->execute(
      DriverCommand::TOUCH_SINGLE_TAP,
      array('element' => $element->getID())
    );

    return $this;
  }

  /**
   * @param WebDriverElement $element
   *
   * @return RemoteTouchScreen The instance.
   */
  public function doubleTap(WebDriverElement $element) {
    $this->executor->execute(
      DriverCommand::TOUCH_DOUBLE_TAP,
      array('element' => $element->getID())
    );

    return $this;
  }

  /**
   * @param int $x
   * @param int $y
   *
   * @return RemoteTouchScreen The instance.
   */
  public function down($x, $y) {
    $this->executor->execute(DriverCommand::TOUCH_DOWN, array(
      'x' => $x,
      'y' => $y,
    ));

    return $this;
  }


  /**
   * @param int $xspeed
   * @param int $yspeed
   *
   * @return RemoteTouchScreen The instance.
   */
  public function flick($xspeed, $yspeed) {
    $this->executor->execute(DriverCommand::TOUCH_FLICK, array(
      'xspeed' => $xspeed,
      'yspeed' => $yspeed,
    ));

    return $this;
  }

  /**
   * @param WebDriverElement $element
   * @param int $xoffset
   * @param int $yoffset
   * @param int $speed
   *
   * @return RemoteTouchScreen The instance.
   */
  public function flickFromElement(
    WebDriverElement $element, $xoffset, $yoffset, $speed
  ) {
    $this->executor->execute(DriverCommand::TOUCH_FLICK, array(
      'xoffset' => $xoffset,
      'yoffset' => $yoffset,
      'element' => $element->getID(),
      'speed'   => $speed,
    ));

    return $this;
  }

  /**
   * @param WebDriverElement $element
   *
   * @return RemoteTouchScreen The instance.
   */
  public function longPress(WebDriverElement $element) {
    $this->executor->execute(
      DriverCommand::TOUCH_LONG_PRESS,
      array('element' => $element->getID())
    );

    return $this;
  }

  /**
   * @param int $x
   * @param int $y
   *
   * @return RemoteTouchScreen The instance.
   */
  public function move($x, $y) {
    $this->executor->execute(DriverCommand::TOUCH_MOVE, array(
      'x' => $x,
      'y' => $y,
    ));

    return $this;
  }

  /**
   * @param int $xoffset
   * @param int $yoffset
   *
   * @return RemoteTouchScreen The instance.
   */
  public function scroll($xoffset, $yoffset) {
    $this->executor->execute(DriverCommand::TOUCH_SCROLL, array(
      'xoffset' => $xoffset,
      'yoffset' => $yoffset,
    ));

    return $this;
  }

  /**
   * @param WebDriverElement $element
   * @param int $xoffset
   * @param int $yoffset
   *
   * @return RemoteTouchScreen The instance.
   */
  public function scrollFromElement(
    WebDriverElement $element, $xoffset, $yoffset
  ) {
    $this->executor->execute(DriverCommand::TOUCH_SCROLL, array(
      'element' => $element->getID(),
      'xoffset' => $xoffset,
      'yoffset' => $yoffset,
    ));

    return $this;
  }


  /**
   * @param int $x
   * @param int $y
   *
   * @return RemoteTouchScreen The instance.
   */
  public function up($x, $y) {
    $this->executor->execute(DriverCommand::TOUCH_UP, array(
      'x' => $x,
      'y' => $y,
    ));

    return $this;
  }

}
