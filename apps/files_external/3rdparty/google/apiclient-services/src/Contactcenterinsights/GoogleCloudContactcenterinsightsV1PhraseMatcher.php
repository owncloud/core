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
  public $activationUpdateTime;
  public $active;
  public $displayName;
  public $name;
  protected $phraseMatchRuleGroupsType = GoogleCloudContactcenterinsightsV1PhraseMatchRuleGroup::class;
  protected $phraseMatchRuleGroupsDataType = 'array';
  public $revisionCreateTime;
  public $revisionId;
  public $roleMatch;
  public $type;
  public $updateTime;
  public $versionTag;

  public function setActivationUpdateTime($activationUpdateTime)
  {
    $this->activationUpdateTime = $activationUpdateTime;
  }
  public function getActivationUpdateTime()
  {
    return $this->activationUpdateTime;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  public function setRoleMatch($roleMatch)
  {
    $this->roleMatch = $roleMatch;
  }
  public function getRoleMatch()
  {
    return $this->roleMatch;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersionTag($versionTag)
  {
    $this->versionTag = $versionTag;
  }
  public function getVersionTag()
  {
    return $this->versionTag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1PhraseMatcher::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1PhraseMatcher');
