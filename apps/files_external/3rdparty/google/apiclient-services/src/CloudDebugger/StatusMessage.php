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

namespace Google\Service\CloudDebugger;

class StatusMessage extends \Google\Model
{
  protected $descriptionType = FormatMessage::class;
  protected $descriptionDataType = '';
  public $isError;
  public $refersTo;

  /**
   * @param FormatMessage
   */
  public function setDescription(FormatMessage $description)
  {
    $this->description = $description;
  }
  /**
   * @return FormatMessage
   */
  public function getDescription()
  {
    return $this->description;
  }
  public function setIsError($isError)
  {
    $this->isError = $isError;
  }
  public function getIsError()
  {
    return $this->isError;
  }
  public function setRefersTo($refersTo)
  {
    $this->refersTo = $refersTo;
  }
  public function getRefersTo()
  {
    return $this->refersTo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StatusMessage::class, 'Google_Service_CloudDebugger_StatusMessage');
