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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3beta1DtmfInput extends \Google\Model
{
  /**
   * @var string
   */
  public $digits;
  /**
   * @var string
   */
  public $finishDigit;

  /**
   * @param string
   */
  public function setDigits($digits)
  {
    $this->digits = $digits;
  }
  /**
   * @return string
   */
  public function getDigits()
  {
    return $this->digits;
  }
  /**
   * @param string
   */
  public function setFinishDigit($finishDigit)
  {
    $this->finishDigit = $finishDigit;
  }
  /**
   * @return string
   */
  public function getFinishDigit()
  {
    return $this->finishDigit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1DtmfInput::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1DtmfInput');
