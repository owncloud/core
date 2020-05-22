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

class Google_Service_Dns_OperationDnsKeyContext extends Google_Model
{
  protected $newValueType = 'Google_Service_Dns_DnsKey';
  protected $newValueDataType = '';
  protected $oldValueType = 'Google_Service_Dns_DnsKey';
  protected $oldValueDataType = '';

  /**
   * @param Google_Service_Dns_DnsKey
   */
  public function setNewValue(Google_Service_Dns_DnsKey $newValue)
  {
    $this->newValue = $newValue;
  }
  /**
   * @return Google_Service_Dns_DnsKey
   */
  public function getNewValue()
  {
    return $this->newValue;
  }
  /**
   * @param Google_Service_Dns_DnsKey
   */
  public function setOldValue(Google_Service_Dns_DnsKey $oldValue)
  {
    $this->oldValue = $oldValue;
  }
  /**
   * @return Google_Service_Dns_DnsKey
   */
  public function getOldValue()
  {
    return $this->oldValue;
  }
}
