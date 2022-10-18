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

class LogsSemanticInterpretationIntentQueryWebrefEntityRelationship extends \Google\Model
{
  /**
   * @var int
   */
  public $entityIndex;
  protected $linkMetadataType = LogsSemanticInterpretationIntentQueryEntityLinkMetadata::class;
  protected $linkMetadataDataType = '';
  /**
   * @var float
   */
  public $linkWeight;

  /**
   * @param int
   */
  public function setEntityIndex($entityIndex)
  {
    $this->entityIndex = $entityIndex;
  }
  /**
   * @return int
   */
  public function getEntityIndex()
  {
    return $this->entityIndex;
  }
  /**
   * @param LogsSemanticInterpretationIntentQueryEntityLinkMetadata
   */
  public function setLinkMetadata(LogsSemanticInterpretationIntentQueryEntityLinkMetadata $linkMetadata)
  {
    $this->linkMetadata = $linkMetadata;
  }
  /**
   * @return LogsSemanticInterpretationIntentQueryEntityLinkMetadata
   */
  public function getLinkMetadata()
  {
    return $this->linkMetadata;
  }
  /**
   * @param float
   */
  public function setLinkWeight($linkWeight)
  {
    $this->linkWeight = $linkWeight;
  }
  /**
   * @return float
   */
  public function getLinkWeight()
  {
    return $this->linkWeight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogsSemanticInterpretationIntentQueryWebrefEntityRelationship::class, 'Google_Service_Contentwarehouse_LogsSemanticInterpretationIntentQueryWebrefEntityRelationship');
