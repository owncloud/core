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

namespace Google\Service\CloudDomains;

class DnsSettings extends \Google\Collection
{
  protected $collection_key = 'glueRecords';
  protected $customDnsType = CustomDns::class;
  protected $customDnsDataType = '';
  protected $glueRecordsType = GlueRecord::class;
  protected $glueRecordsDataType = 'array';
  protected $googleDomainsDnsType = GoogleDomainsDns::class;
  protected $googleDomainsDnsDataType = '';

  /**
   * @param CustomDns
   */
  public function setCustomDns(CustomDns $customDns)
  {
    $this->customDns = $customDns;
  }
  /**
   * @return CustomDns
   */
  public function getCustomDns()
  {
    return $this->customDns;
  }
  /**
   * @param GlueRecord[]
   */
  public function setGlueRecords($glueRecords)
  {
    $this->glueRecords = $glueRecords;
  }
  /**
   * @return GlueRecord[]
   */
  public function getGlueRecords()
  {
    return $this->glueRecords;
  }
  /**
   * @param GoogleDomainsDns
   */
  public function setGoogleDomainsDns(GoogleDomainsDns $googleDomainsDns)
  {
    $this->googleDomainsDns = $googleDomainsDns;
  }
  /**
   * @return GoogleDomainsDns
   */
  public function getGoogleDomainsDns()
  {
    return $this->googleDomainsDns;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DnsSettings::class, 'Google_Service_CloudDomains_DnsSettings');
