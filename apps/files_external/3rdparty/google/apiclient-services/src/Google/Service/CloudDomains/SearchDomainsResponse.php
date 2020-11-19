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

class Google_Service_CloudDomains_SearchDomainsResponse extends Google_Collection
{
  protected $collection_key = 'registerParameters';
  protected $registerParametersType = 'Google_Service_CloudDomains_RegisterParameters';
  protected $registerParametersDataType = 'array';

  /**
   * @param Google_Service_CloudDomains_RegisterParameters
   */
  public function setRegisterParameters($registerParameters)
  {
    $this->registerParameters = $registerParameters;
  }
  /**
   * @return Google_Service_CloudDomains_RegisterParameters
   */
  public function getRegisterParameters()
  {
    return $this->registerParameters;
  }
}
