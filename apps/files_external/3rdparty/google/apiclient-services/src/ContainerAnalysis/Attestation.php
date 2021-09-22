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

namespace Google\Service\ContainerAnalysis;

class Attestation extends \Google\Model
{
  protected $genericSignedAttestationType = GenericSignedAttestation::class;
  protected $genericSignedAttestationDataType = '';
  protected $pgpSignedAttestationType = PgpSignedAttestation::class;
  protected $pgpSignedAttestationDataType = '';

  /**
   * @param GenericSignedAttestation
   */
  public function setGenericSignedAttestation(GenericSignedAttestation $genericSignedAttestation)
  {
    $this->genericSignedAttestation = $genericSignedAttestation;
  }
  /**
   * @return GenericSignedAttestation
   */
  public function getGenericSignedAttestation()
  {
    return $this->genericSignedAttestation;
  }
  /**
   * @param PgpSignedAttestation
   */
  public function setPgpSignedAttestation(PgpSignedAttestation $pgpSignedAttestation)
  {
    $this->pgpSignedAttestation = $pgpSignedAttestation;
  }
  /**
   * @return PgpSignedAttestation
   */
  public function getPgpSignedAttestation()
  {
    return $this->pgpSignedAttestation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Attestation::class, 'Google_Service_ContainerAnalysis_Attestation');
