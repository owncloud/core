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

class Google_Service_Dns_PoliciesPatchResponse extends Google_Model
{
  protected $headerType = 'Google_Service_Dns_ResponseHeader';
  protected $headerDataType = '';
  protected $policyType = 'Google_Service_Dns_Policy';
  protected $policyDataType = '';

  /**
   * @param Google_Service_Dns_ResponseHeader
   */
  public function setHeader(Google_Service_Dns_ResponseHeader $header)
  {
    $this->header = $header;
  }
  /**
   * @return Google_Service_Dns_ResponseHeader
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param Google_Service_Dns_Policy
   */
  public function setPolicy(Google_Service_Dns_Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_Dns_Policy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
}
