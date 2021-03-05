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

class Google_Service_CloudDomains_DnsSettings extends Google_Collection
{
  protected $collection_key = 'glueRecords';
  protected $customDnsType = 'Google_Service_CloudDomains_CustomDns';
  protected $customDnsDataType = '';
  protected $glueRecordsType = 'Google_Service_CloudDomains_GlueRecord';
  protected $glueRecordsDataType = 'array';
  protected $googleDomainsDnsType = 'Google_Service_CloudDomains_GoogleDomainsDns';
  protected $googleDomainsDnsDataType = '';

  /**
   * @param Google_Service_CloudDomains_CustomDns
   */
  public function setCustomDns(Google_Service_CloudDomains_CustomDns $customDns)
  {
    $this->customDns = $customDns;
  }
  /**
   * @return Google_Service_CloudDomains_CustomDns
   */
  public function getCustomDns()
  {
    return $this->customDns;
  }
  /**
   * @param Google_Service_CloudDomains_GlueRecord[]
   */
  public function setGlueRecords($glueRecords)
  {
    $this->glueRecords = $glueRecords;
  }
  /**
   * @return Google_Service_CloudDomains_GlueRecord[]
   */
  public function getGlueRecords()
  {
    return $this->glueRecords;
  }
  /**
   * @param Google_Service_CloudDomains_GoogleDomainsDns
   */
  public function setGoogleDomainsDns(Google_Service_CloudDomains_GoogleDomainsDns $googleDomainsDns)
  {
    $this->googleDomainsDns = $googleDomainsDns;
  }
  /**
   * @return Google_Service_CloudDomains_GoogleDomainsDns
   */
  public function getGoogleDomainsDns()
  {
    return $this->googleDomainsDns;
  }
}
