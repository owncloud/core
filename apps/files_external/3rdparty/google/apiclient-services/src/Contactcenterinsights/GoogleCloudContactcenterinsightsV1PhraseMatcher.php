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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1PhraseMatcher extends \Google\Collection
{
  protected $collection_key = 'phraseMatchRuleGroups';
  /**
   * @var string
   */
  public $activationUpdateTime;
  /**
   * @var bool
   */
  public $active;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  protected $phraseMatchRuleGroupsType = GoogleCloudContactcenterinsightsV1PhraseMatchRuleGroup::class;
  protected $phraseMatchRuleGroupsDataType = 'array';
  /**
   * @var string
   */
  public $revisionCreateTime;
  /**
   * @var string
   */
  public $revisionId;
  /**
   * @var string
   */
  public $roleMatch;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $versionTag;

  /**
   * @param string
   */
  public function setActivationUpdateTime($activationUpdateTime)
  {
    $this->activationUpdateTime = $activationUpdateTime;
  }
  /**
   * @return string
   */
  public function getActivationUpdateTime()
  {
    return $this->activationUpdateTime;
  }
  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1PhraseMatchRuleGroup[]
   */
  public function setPhraseMatchRuleGroups($phraseMatchRuleGroups)
  {
    $this->phraseMatchRuleGroups = $phraseMatchRuleGroups;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1PhraseMatchRuleGroup[]
   */
  public function getPhraseMatchRuleGroups()
  {
    return $this->phraseMatchRuleGroups;
  }
  /**
   * @param string
   */
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  /**
   * @return string
   */
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param string
   */
  public function setRoleMatch($roleMatch)
  {
    $this->roleMatch = $roleMatch;
  }
  /**
   * @return string
   */
  public function getRoleMatch()
  {
    return $this->roleMatch;
  }
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
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setVersionTag($versionTag)
  {
    $this->versionTag = $versionTag;
  }
  /**
   * @return string
   */
  public function getVersionTag()
  {
    return $this->versionTag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1PhraseMatcher::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1PhraseMatcher');
