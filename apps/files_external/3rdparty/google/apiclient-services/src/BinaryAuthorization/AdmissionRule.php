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

namespace Google\Service\BinaryAuthorization;

class AdmissionRule extends \Google\Collection
{
  protected $collection_key = 'requireAttestationsBy';
  public $enforcementMode;
  public $evaluationMode;
  public $requireAttestationsBy;

  public function setEnforcementMode($enforcementMode)
  {
    $this->enforcementMode = $enforcementMode;
  }
  public function getEnforcementMode()
  {
    return $this->enforcementMode;
  }
  public function setEvaluationMode($evaluationMode)
  {
    $this->evaluationMode = $evaluationMode;
  }
  public function getEvaluationMode()
  {
    return $this->evaluationMode;
  }
  public function setRequireAttestationsBy($requireAttestationsBy)
  {
    $this->requireAttestationsBy = $requireAttestationsBy;
  }
  public function getRequireAttestationsBy()
  {
    return $this->requireAttestationsBy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdmissionRule::class, 'Google_Service_BinaryAuthorization_AdmissionRule');
