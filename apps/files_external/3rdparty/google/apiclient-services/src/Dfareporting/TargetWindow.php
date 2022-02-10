<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Dfareporting;

class TargetWindow extends \Google\Model
{
  /**
   * @var string
   */
  public $customHtml;
  /**
   * @var string
   */
  public $targetWindowOption;

  /**
   * @param string
   */
  public function setCustomHtml($customHtml)
  {
    $this->customHtml = $customHtml;
  }
  /**
   * @return string
   */
  public function getCustomHtml()
  {
    return $this->customHtml;
  }
  /**
   * @param string
   */
  public function setTargetWindowOption($targetWindowOption)
  {
    $this->targetWindowOption = $targetWindowOption;
  }
  /**
   * @return string
   */
  public function getTargetWindowOption()
  {
    return $this->targetWindowOption;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetWindow::class, 'Google_Service_Dfareporting_TargetWindow');
