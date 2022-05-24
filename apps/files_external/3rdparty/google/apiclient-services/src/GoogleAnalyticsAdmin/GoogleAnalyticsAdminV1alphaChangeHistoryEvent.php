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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaChangeHistoryEvent extends \Google\Collection
{
  protected $collection_key = 'changes';
  /**
   * @var string
   */
  public $actorType;
  /**
   * @var string
   */
  public $changeTime;
  protected $changesType = GoogleAnalyticsAdminV1alphaChangeHistoryChange::class;
  protected $changesDataType = 'array';
  /**
   * @var bool
   */
  public $changesFiltered;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $userActorEmail;

  /**
   * @param string
   */
  public function setActorType($actorType)
  {
    $this->actorType = $actorType;
  }
  /**
   * @return string
   */
  public function getActorType()
  {
    return $this->actorType;
  }
  /**
   * @param string
   */
  public function setChangeTime($changeTime)
  {
    $this->changeTime = $changeTime;
  }
  /**
   * @return string
   */
  public function getChangeTime()
  {
    return $this->changeTime;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaChangeHistoryChange[]
   */
  public function setChanges($changes)
  {
    $this->changes = $changes;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaChangeHistoryChange[]
   */
  public function getChanges()
  {
    return $this->changes;
  }
  /**
   * @param bool
   */
  public function setChangesFiltered($changesFiltered)
  {
    $this->changesFiltered = $changesFiltered;
  }
  /**
   * @return bool
   */
  public function getChangesFiltered()
  {
    return $this->changesFiltered;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setUserActorEmail($userActorEmail)
  {
    $this->userActorEmail = $userActorEmail;
  }
  /**
   * @return string
   */
  public function getUserActorEmail()
  {
    return $this->userActorEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaChangeHistoryEvent::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryEvent');
