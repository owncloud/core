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

class Google_Service_Compute_InterconnectDiagnosticsLinkStatus extends Google_Collection
{
  protected $collection_key = 'arpCaches';
  protected $arpCachesType = 'Google_Service_Compute_InterconnectDiagnosticsARPEntry';
  protected $arpCachesDataType = 'array';
  public $circuitId;
  public $googleDemarc;
  protected $lacpStatusType = 'Google_Service_Compute_InterconnectDiagnosticsLinkLACPStatus';
  protected $lacpStatusDataType = '';
  protected $receivingOpticalPowerType = 'Google_Service_Compute_InterconnectDiagnosticsLinkOpticalPower';
  protected $receivingOpticalPowerDataType = '';
  protected $transmittingOpticalPowerType = 'Google_Service_Compute_InterconnectDiagnosticsLinkOpticalPower';
  protected $transmittingOpticalPowerDataType = '';

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
  public function setCircuitId($circuitId)
  {
    $this->circuitId = $circuitId;
  }
  public function getCircuitId()
  {
    return $this->circuitId;
  }
  public function setGoogleDemarc($googleDemarc)
  {
    $this->googleDemarc = $googleDemarc;
  }
  public function getGoogleDemarc()
  {
    return $this->googleDemarc;
  }
  /**
   * @param Google_Service_Compute_InterconnectDiagnosticsLinkLACPStatus
   */
  public function setLacpStatus(Google_Service_Compute_InterconnectDiagnosticsLinkLACPStatus $lacpStatus)
  {
    $this->lacpStatus = $lacpStatus;
  }
  /**
   * @return Google_Service_Compute_InterconnectDiagnosticsLinkLACPStatus
   */
  public function getLacpStatus()
  {
    return $this->lacpStatus;
  }
  /**
   * @param Google_Service_Compute_InterconnectDiagnosticsLinkOpticalPower
   */
  public function setReceivingOpticalPower(Google_Service_Compute_InterconnectDiagnosticsLinkOpticalPower $receivingOpticalPower)
  {
    $this->receivingOpticalPower = $receivingOpticalPower;
  }
  /**
   * @return Google_Service_Compute_InterconnectDiagnosticsLinkOpticalPower
   */
  public function getReceivingOpticalPower()
  {
    return $this->receivingOpticalPower;
  }
  /**
   * @param Google_Service_Compute_InterconnectDiagnosticsLinkOpticalPower
   */
  public function setTransmittingOpticalPower(Google_Service_Compute_InterconnectDiagnosticsLinkOpticalPower $transmittingOpticalPower)
  {
    $this->transmittingOpticalPower = $transmittingOpticalPower;
  }
  /**
   * @return Google_Service_Compute_InterconnectDiagnosticsLinkOpticalPower
   */
  public function getTransmittingOpticalPower()
  {
    return $this->transmittingOpticalPower;
  }
}
