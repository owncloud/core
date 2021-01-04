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

class Google_Service_Compute_InterconnectDiagnostics extends Google_Collection
{
  protected $collection_key = 'links';
  protected $arpCachesType = 'Google_Service_Compute_InterconnectDiagnosticsARPEntry';
  protected $arpCachesDataType = 'array';
  protected $linksType = 'Google_Service_Compute_InterconnectDiagnosticsLinkStatus';
  protected $linksDataType = 'array';
  public $macAddress;

  /**
   * @param Google_Service_Compute_InterconnectDiagnosticsARPEntry[]
   */
  public function setArpCaches($arpCaches)
  {
    $this->arpCaches = $arpCaches;
  }
  /**
   * @return Google_Service_Compute_InterconnectDiagnosticsARPEntry[]
   */
  public function getArpCaches()
  {
    return $this->arpCaches;
  }
  /**
   * @param Google_Service_Compute_InterconnectDiagnosticsLinkStatus[]
   */
  public function setLinks($links)
  {
    $this->links = $links;
  }
  /**
   * @return Google_Service_Compute_InterconnectDiagnosticsLinkStatus[]
   */
  public function getLinks()
  {
    return $this->links;
  }
  public function setMacAddress($macAddress)
  {
    $this->macAddress = $macAddress;
  }
  public function getMacAddress()
  {
    return $this->macAddress;
  }
}
