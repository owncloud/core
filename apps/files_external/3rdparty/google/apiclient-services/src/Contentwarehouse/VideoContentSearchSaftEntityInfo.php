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

class VideoContentSearchSaftEntityInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $canonicalEntityName;
  public $entitySalience;
  /**
   * @var string
   */
  public $entityTypeName;
  /**
   * @var string
   */
  public $mentionText;
  /**
   * @var string
   */
  public $mentionType;
  /**
   * @var string
   */
  public $mid;
  /**
   * @var string
   */
  public $originalText;

  /**
   * @param string
   */
  public function setCanonicalEntityName($canonicalEntityName)
  {
    $this->canonicalEntityName = $canonicalEntityName;
  }
  /**
   * @return string
   */
  public function getCanonicalEntityName()
  {
    return $this->canonicalEntityName;
  }
  public function setEntitySalience($entitySalience)
  {
    $this->entitySalience = $entitySalience;
  }
  public function getEntitySalience()
  {
    return $this->entitySalience;
  }
  /**
   * @param string
   */
  public function setEntityTypeName($entityTypeName)
  {
    $this->entityTypeName = $entityTypeName;
  }
  /**
   * @return string
   */
  public function getEntityTypeName()
  {
    return $this->entityTypeName;
  }
  /**
   * @param string
   */
  public function setMentionText($mentionText)
  {
    $this->mentionText = $mentionText;
  }
  /**
   * @return string
   */
  public function getMentionText()
  {
    return $this->mentionText;
  }
  /**
   * @param string
   */
  public function setMentionType($mentionType)
  {
    $this->mentionType = $mentionType;
  }
  /**
   * @return string
   */
  public function getMentionType()
  {
    return $this->mentionType;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param string
   */
  public function setOriginalText($originalText)
  {
    $this->originalText = $originalText;
  }
  /**
   * @return string
   */
  public function getOriginalText()
  {
    return $this->originalText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchSaftEntityInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchSaftEntityInfo');
