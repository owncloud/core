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

namespace Google\Service\Contentwarehouse;

class CopleyPersonalReferenceMetadata extends \Google\Collection
{
  protected $collection_key = 'references';
  /**
   * @var float
   */
  public $referenceScore;
  protected $referencesType = CopleyPersonalReference::class;
  protected $referencesDataType = 'array';
  protected $subreferenceMetadataType = CopleySubreferenceMetadata::class;
  protected $subreferenceMetadataDataType = '';

  /**
   * @param float
   */
  public function setReferenceScore($referenceScore)
  {
    $this->referenceScore = $referenceScore;
  }
  /**
   * @return float
   */
  public function getReferenceScore()
  {
    return $this->referenceScore;
  }
  /**
   * @param CopleyPersonalReference[]
   */
  public function setReferences($references)
  {
    $this->references = $references;
  }
  /**
   * @return CopleyPersonalReference[]
   */
  public function getReferences()
  {
    return $this->references;
  }
  /**
   * @param CopleySubreferenceMetadata
   */
  public function setSubreferenceMetadata(CopleySubreferenceMetadata $subreferenceMetadata)
  {
    $this->subreferenceMetadata = $subreferenceMetadata;
  }
  /**
   * @return CopleySubreferenceMetadata
   */
  public function getSubreferenceMetadata()
  {
    return $this->subreferenceMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CopleyPersonalReferenceMetadata::class, 'Google_Service_Contentwarehouse_CopleyPersonalReferenceMetadata');
