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

class Google_Service_AndroidManagement_PostureDetail extends Google_Collection
{
  protected $collection_key = 'advice';
  protected $adviceType = 'Google_Service_AndroidManagement_UserFacingMessage';
  protected $adviceDataType = 'array';
  public $securityRisk;

  /**
   * @param Google_Service_AndroidManagement_UserFacingMessage[]
   */
  public function setAdvice($advice)
  {
    $this->advice = $advice;
  }
  /**
   * @return Google_Service_AndroidManagement_UserFacingMessage[]
   */
  public function getAdvice()
  {
    return $this->advice;
  }
  public function setSecurityRisk($securityRisk)
  {
    $this->securityRisk = $securityRisk;
  }
  public function getSecurityRisk()
  {
    return $this->securityRisk;
  }
}
