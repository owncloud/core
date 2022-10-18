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

class KnowledgeAnswersIntentQueryArgumentProvenanceAttentionalEntity extends \Google\Model
{
  /**
   * @var string
   */
  public $attentionalEntityKey;
  protected $mentionPropertiesType = AttentionalEntitiesMentionProperties::class;
  protected $mentionPropertiesDataType = '';

  /**
   * @param string
   */
  public function setAttentionalEntityKey($attentionalEntityKey)
  {
    $this->attentionalEntityKey = $attentionalEntityKey;
  }
  /**
   * @return string
   */
  public function getAttentionalEntityKey()
  {
    return $this->attentionalEntityKey;
  }
  /**
   * @param AttentionalEntitiesMentionProperties
   */
  public function setMentionProperties(AttentionalEntitiesMentionProperties $mentionProperties)
  {
    $this->mentionProperties = $mentionProperties;
  }
  /**
   * @return AttentionalEntitiesMentionProperties
   */
  public function getMentionProperties()
  {
    return $this->mentionProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryArgumentProvenanceAttentionalEntity::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryArgumentProvenanceAttentionalEntity');
