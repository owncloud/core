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

class Google_Service_BinaryAuthorization_ValidateAttestationOccurrenceRequest extends Google_Model
{
  protected $attestationType = 'Google_Service_BinaryAuthorization_AttestationOccurrence';
  protected $attestationDataType = '';
  public $occurrenceNote;
  public $occurrenceResourceUri;

  /**
   * @param Google_Service_BinaryAuthorization_AttestationOccurrence
   */
  public function setAttestation(Google_Service_BinaryAuthorization_AttestationOccurrence $attestation)
  {
    $this->attestation = $attestation;
  }
  /**
   * @return Google_Service_BinaryAuthorization_AttestationOccurrence
   */
  public function getAttestation()
  {
    return $this->attestation;
  }
  public function setOccurrenceNote($occurrenceNote)
  {
    $this->occurrenceNote = $occurrenceNote;
  }
  public function getOccurrenceNote()
  {
    return $this->occurrenceNote;
  }
  public function setOccurrenceResourceUri($occurrenceResourceUri)
  {
    $this->occurrenceResourceUri = $occurrenceResourceUri;
  }
  public function getOccurrenceResourceUri()
  {
    return $this->occurrenceResourceUri;
  }
}
