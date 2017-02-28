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
 * Used to locate a given frame or window.
 */
interface WebDriverTargetLocator {

  /**
   * Switch to the main document if the page contains iframes. Otherwise, switch
   * to the first frame on the page.
   *
   * @return WebDriver The driver focused on the top window or the first frame.
   */
  public function defaultContent();

  /**
   * Switch to the iframe by its id or name.
   *
   * @param WebDriverElement|string $frame The WebDriverElement,
   *                                       the id or the name of the frame.
   * @return WebDriver The driver focused on the given frame.
   */
  public function frame($frame);

  /**
   * Switch the focus to another window by its handle.
   *
   * @param string $handle The handle of the window to be focused on.
   * @return WebDriver The driver focused on the given window.
   * @see WebDriver::getWindowHandles
   */
  public function window($handle);

  /**
   * Switch to the currently active modal dialog for this particular driver
   * instance.
   *
   * @return WebDriverAlert
   */
  public function alert();

  /**
   * Switches to the element that currently has focus within the document
   * currently "switched to", or the body element if this cannot be detected.
   *
   * @return WebDriverElement
   */
  public function activeElement();
}
