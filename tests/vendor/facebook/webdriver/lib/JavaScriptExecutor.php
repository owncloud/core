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
 * WebDriver interface implemented by drivers that support JavaScript.
 */
interface JavaScriptExecutor {

  /**
   * Inject a snippet of JavaScript into the page for execution in the context
   * of the currently selected frame. The executed script is assumed to be
   * synchronous and the result of evaluating the script will be returned.
   *
   * @param string $script The script to inject.
   * @param array $arguments The arguments of the script.
   * @return mixed The return value of the script.
   */
  public function executeScript($script, array $arguments = array());

  /**
   * Inject a snippet of JavaScript into the page for asynchronous execution in
   * the context of the currently selected frame.
   *
   * The driver will pass a callback as the last argument to the snippet, and
   * block until the callback is invoked.
   *
   * @see WebDriverExecuteAsyncScriptTestCase
   *
   * @param string $script The script to inject.
   * @param array $arguments The arguments of the script.
   * @return mixed The value passed by the script to the callback.
   */
  public function executeAsyncScript($script, array $arguments = array());

}
