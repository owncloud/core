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

class LogsSemanticInterpretationIntentQueryLinkKindInfo extends \Google\Model
{
  protected $flagsType = LogsSemanticInterpretationIntentQueryLinkKindFlags::class;
  protected $flagsDataType = '';
  /**
   * @var string
   */
  public $kcLinkName;
  /**
   * @var string
   */
  public $topicPropertyName;

  /**
   * @param LogsSemanticInterpretationIntentQueryLinkKindFlags
   */
  public function setFlags(LogsSemanticInterpretationIntentQueryLinkKindFlags $flags)
  {
    $this->flags = $flags;
  }
  /**
   * @return LogsSemanticInterpretationIntentQueryLinkKindFlags
   */
  public function getFlags()
  {
    return $this->flags;
  }
  /**
   * @param string
   */
  public function setKcLinkName($kcLinkName)
  {
    $this->kcLinkName = $kcLinkName;
  }
  /**
   * @return string
   */
  public function getKcLinkName()
  {
    return $this->kcLinkName;
  }
  /**
   * @param string
   */
  public function setTopicPropertyName($topicPropertyName)
  {
    $this->topicPropertyName = $topicPropertyName;
  }
  /**
   * @return string
   */
  public function getTopicPropertyName()
  {
    return $this->topicPropertyName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogsSemanticInterpretationIntentQueryLinkKindInfo::class, 'Google_Service_Contentwarehouse_LogsSemanticInterpretationIntentQueryLinkKindInfo');
