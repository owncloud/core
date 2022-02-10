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

class InTotoStatement extends \Google\Collection
{
  protected $collection_key = 'subject';
  protected $internal_gapi_mappings = [
        "type" => "_type",
  ];
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $predicateType;
  protected $provenanceType = InTotoProvenance::class;
  protected $provenanceDataType = '';
  protected $slsaProvenanceType = SlsaProvenance::class;
  protected $slsaProvenanceDataType = '';
  protected $subjectType = Subject::class;
  protected $subjectDataType = 'array';

  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setPredicateType($predicateType)
  {
    $this->predicateType = $predicateType;
  }
  /**
   * @return string
   */
  public function getPredicateType()
  {
    return $this->predicateType;
  }
  /**
   * @param InTotoProvenance
   */
  public function setProvenance(InTotoProvenance $provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return InTotoProvenance
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param SlsaProvenance
   */
  public function setSlsaProvenance(SlsaProvenance $slsaProvenance)
  {
    $this->slsaProvenance = $slsaProvenance;
  }
  /**
   * @return SlsaProvenance
   */
  public function getSlsaProvenance()
  {
    return $this->slsaProvenance;
  }
  /**
   * @param Subject[]
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return Subject[]
   */
  public function getSubject()
  {
    return $this->subject;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InTotoStatement::class, 'Google_Service_ContainerAnalysis_InTotoStatement');
