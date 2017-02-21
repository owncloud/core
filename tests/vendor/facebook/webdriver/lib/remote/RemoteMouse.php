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
 * Execute mouse commands for RemoteWebDriver.
 */
class RemoteMouse implements WebDriverMouse {

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
   * @param null|WebDriverCoordinates $where
   *
   * @return RemoteMouse
   */
  public function click(WebDriverCoordinates $where = null) {
    $this->moveIfNeeded($where);
    $this->executor->execute(DriverCommand::CLICK, array(
      'button' => 0,
    ));
    return $this;
  }

  /**
   * @param WebDriverCoordinates $where
   *
   * @return RemoteMouse
   */
  public function contextClick(WebDriverCoordinates $where = null) {
    $this->moveIfNeeded($where);
    $this->executor->execute(DriverCommand::CLICK, array(
      'button' => 2,
    ));
    return $this;
  }

  /**
   * @param WebDriverCoordinates $where
   *
   * @return RemoteMouse
   */
  public function doubleClick(WebDriverCoordinates $where = null) {
    $this->moveIfNeeded($where);
    $this->executor->execute(DriverCommand::DOUBLE_CLICK);
    return $this;
  }

  /**
   * @param WebDriverCoordinates $where
   *
   * @return RemoteMouse
   */
  public function mouseDown(WebDriverCoordinates $where = null) {
    $this->moveIfNeeded($where);
    $this->executor->execute(DriverCommand::MOUSE_DOWN);
    return $this;
  }

  /**
   * @param WebDriverCoordinates $where
   * @param int|null $x_offset
   * @param int|null $y_offset
   *
   * @return RemoteMouse
   */
  public function mouseMove(WebDriverCoordinates $where = null,
                            $x_offset = null,
                            $y_offset = null) {
    $params = array();
    if ($where !== null) {
      $params['element'] = $where->getAuxiliary();
    }
    if ($x_offset !== null) {
      $params['xoffset'] = $x_offset;
    }
    if ($y_offset !== null) {
      $params['yoffset'] = $y_offset;
    }
    $this->executor->execute(DriverCommand::MOVE_TO, $params);
    return $this;
  }

  /**
   * @param WebDriverCoordinates $where
   *
   * @return RemoteMouse
   */
  public function mouseUp(WebDriverCoordinates $where = null) {
    $this->moveIfNeeded($where);
    $this->executor->execute(DriverCommand::MOUSE_UP);
    return $this;
  }

  /**
   * @param WebDriverCoordinates $where
   * @return void
   */
  protected function moveIfNeeded(WebDriverCoordinates $where = null) {
    if ($where) {
      $this->mouseMove($where);
    }
  }
}
