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
 * WebDriver action builder for touch events
 */
class WebDriverTouchActions extends WebDriverActions {

  /**
   * @var WebDriverTouchScreen
   */
  protected $touchScreen;

  public function __construct(WebDriver $driver) {
    parent::__construct($driver);
    $this->touchScreen = $driver->getTouch();
  }

  /**
   * @param WebDriverElement $element
   * @return WebDriverTouchActions
   */
  public function tap(WebDriverElement $element) {
    $this->action->addAction(
      new WebDriverTapAction($this->touchScreen, $element)
    );
    return $this;
  }

  /**
   * @param int $x
   * @param int $y
   * @return WebDriverTouchActions
   */
  public function down($x, $y) {
    $this->action->addAction(
      new WebDriverDownAction($this->touchScreen, $x, $y)
    );
    return $this;
  }

  /**
   * @param int $x
   * @param int $y
   * @return WebDriverTouchActions
   */
  public function up($x, $y) {
    $this->action->addAction(
      new WebDriverUpAction($this->touchScreen, $x, $y)
    );
    return $this;
  }

  /**
   * @param int $x
   * @param int $y
   * @return WebDriverTouchActions
   */
  public function move($x, $y) {
    $this->action->addAction(
      new WebDriverMoveAction($this->touchScreen, $x, $y)
    );
    return $this;
  }

  /**
   * @param int $x
   * @param int $y
   * @return WebDriverTouchActions
   */
  public function scroll($x, $y) {
    $this->action->addAction(
      new WebDriverScrollAction($this->touchScreen, $x, $y)
    );
    return $this;
  }

  /**
   * @param WebDriverElement $element
   * @param int $x
   * @param int $y
   * @return WebDriverTouchActions
   */
  public function scrollFromElement(WebDriverElement $element, $x, $y) {
    $this->action->addAction(
      new WebDriverScrollFromElementAction($this->touchScreen, $element, $x, $y)
    );
    return $this;
  }

  /**
   * @param WebDriverElement $element
   * @return WebDriverTouchActions
   */
  public function doubleTap(WebDriverElement $element) {
    $this->action->addAction(
      new WebDriverDoubleTapAction($this->touchScreen, $element)
    );
    return $this;
  }

  /**
   * @param WebDriverElement $element
   * @return WebDriverTouchActions
   */
  public function longPress(WebDriverElement $element) {
    $this->action->addAction(
      new WebDriverLongPressAction($this->touchScreen, $element)
    );
    return $this;
  }

  /**
   * @param int $x
   * @param int $y
   * @return WebDriverTouchActions
   */
  public function flick($x, $y) {
    $this->action->addAction(
      new WebDriverFlickAction($this->touchScreen, $x, $y)
    );
    return $this;
  }

  /**
   * @param WebDriverElement $element
   * @param int $x
   * @param int $y
   * @param int $speed
   * @return WebDriverTouchActions
   */
  public function flickFromElement(WebDriverElement $element, $x, $y, $speed) {
    $this->action->addAction(
      new WebDriverFlickFromElementAction(
        $this->touchScreen, $element, $x, $y, $speed
      )
    );
    return $this;
  }

}
