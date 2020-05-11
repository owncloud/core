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

class Google_Service_FirebaseRules_VisitedExpression extends Google_Model
{
  protected $sourcePositionType = 'Google_Service_FirebaseRules_SourcePosition';
  protected $sourcePositionDataType = '';
  public $value;

  /**
   * @param Google_Service_FirebaseRules_SourcePosition
   */
  public function setSourcePosition(Google_Service_FirebaseRules_SourcePosition $sourcePosition)
  {
    $this->sourcePosition = $sourcePosition;
  }
  /**
   * @return Google_Service_FirebaseRules_SourcePosition
   */
  public function getSourcePosition()
  {
    return $this->sourcePosition;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}
