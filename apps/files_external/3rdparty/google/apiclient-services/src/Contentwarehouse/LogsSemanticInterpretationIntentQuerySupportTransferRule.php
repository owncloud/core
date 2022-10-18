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

class LogsSemanticInterpretationIntentQuerySupportTransferRule extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowWildcardIntents;
  /**
   * @var string
   */
  public $domain;
  /**
   * @var bool
   */
  public $isReverseLink;
  /**
   * @var bool
   */
  public $mentionsOnly;
  /**
   * @var bool
   */
  public $supportShare;
  /**
   * @var string
   */
  public $targetCollection;
  /**
   * @var string
   */
  public $userCountry;
  /**
   * @var string
   */
  public $userLanguage;

  /**
   * @param bool
   */
  public function setAllowWildcardIntents($allowWildcardIntents)
  {
    $this->allowWildcardIntents = $allowWildcardIntents;
  }
  /**
   * @return bool
   */
  public function getAllowWildcardIntents()
  {
    return $this->allowWildcardIntents;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param bool
   */
  public function setIsReverseLink($isReverseLink)
  {
    $this->isReverseLink = $isReverseLink;
  }
  /**
   * @return bool
   */
  public function getIsReverseLink()
  {
    return $this->isReverseLink;
  }
  /**
   * @param bool
   */
  public function setMentionsOnly($mentionsOnly)
  {
    $this->mentionsOnly = $mentionsOnly;
  }
  /**
   * @return bool
   */
  public function getMentionsOnly()
  {
    return $this->mentionsOnly;
  }
  /**
   * @param bool
   */
  public function setSupportShare($supportShare)
  {
    $this->supportShare = $supportShare;
  }
  /**
   * @return bool
   */
  public function getSupportShare()
  {
    return $this->supportShare;
  }
  /**
   * @param string
   */
  public function setTargetCollection($targetCollection)
  {
    $this->targetCollection = $targetCollection;
  }
  /**
   * @return string
   */
  public function getTargetCollection()
  {
    return $this->targetCollection;
  }
  /**
   * @param string
   */
  public function setUserCountry($userCountry)
  {
    $this->userCountry = $userCountry;
  }
  /**
   * @return string
   */
  public function getUserCountry()
  {
    return $this->userCountry;
  }
  /**
   * @param string
   */
  public function setUserLanguage($userLanguage)
  {
    $this->userLanguage = $userLanguage;
  }
  /**
   * @return string
   */
  public function getUserLanguage()
  {
    return $this->userLanguage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogsSemanticInterpretationIntentQuerySupportTransferRule::class, 'Google_Service_Contentwarehouse_LogsSemanticInterpretationIntentQuerySupportTransferRule');
