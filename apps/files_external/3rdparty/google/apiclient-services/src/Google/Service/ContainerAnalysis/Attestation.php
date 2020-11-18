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

class Google_Service_ContainerAnalysis_Attestation extends Google_Model
{
  protected $genericSignedAttestationType = 'Google_Service_ContainerAnalysis_GenericSignedAttestation';
  protected $genericSignedAttestationDataType = '';
  protected $pgpSignedAttestationType = 'Google_Service_ContainerAnalysis_PgpSignedAttestation';
  protected $pgpSignedAttestationDataType = '';

  /**
   * @param Google_Service_ContainerAnalysis_GenericSignedAttestation
   */
  public function setGenericSignedAttestation(Google_Service_ContainerAnalysis_GenericSignedAttestation $genericSignedAttestation)
  {
    $this->genericSignedAttestation = $genericSignedAttestation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_GenericSignedAttestation
   */
  public function getGenericSignedAttestation()
  {
    return $this->genericSignedAttestation;
  }
  /**
   * @param Google_Service_ContainerAnalysis_PgpSignedAttestation
   */
  public function setPgpSignedAttestation(Google_Service_ContainerAnalysis_PgpSignedAttestation $pgpSignedAttestation)
  {
    $this->pgpSignedAttestation = $pgpSignedAttestation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_PgpSignedAttestation
   */
  public function getPgpSignedAttestation()
  {
    return $this->pgpSignedAttestation;
  }
}
