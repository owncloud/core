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

namespace Google\Service\TagManager;

class Zone extends \Google\Collection
{
  protected $collection_key = 'childContainer';
  /**
   * @var string
   */
  public $accountId;
  protected $boundaryType = ZoneBoundary::class;
  protected $boundaryDataType = '';
  protected $childContainerType = ZoneChildContainer::class;
  protected $childContainerDataType = 'array';
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $notes;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $tagManagerUrl;
  protected $typeRestrictionType = ZoneTypeRestriction::class;
  protected $typeRestrictionDataType = '';
  /**
   * @var string
   */
  public $workspaceId;
  /**
   * @var string
   */
  public $zoneId;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param ZoneBoundary
   */
  public function setBoundary(ZoneBoundary $boundary)
  {
    $this->boundary = $boundary;
  }
  /**
   * @return ZoneBoundary
   */
  public function getBoundary()
  {
    return $this->boundary;
  }
  /**
   * @param ZoneChildContainer[]
   */
  public function setChildContainer($childContainer)
  {
    $this->childContainer = $childContainer;
  }
  /**
   * @return ZoneChildContainer[]
   */
  public function getChildContainer()
  {
    return $this->childContainer;
  }
  /**
   * @param string
   */
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  /**
   * @return string
   */
  public function getContainerId()
  {
    return $this->containerId;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
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
   * @param string
   */
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setTagManagerUrl($tagManagerUrl)
  {
    $this->tagManagerUrl = $tagManagerUrl;
  }
  /**
   * @return string
   */
  public function getTagManagerUrl()
  {
    return $this->tagManagerUrl;
  }
  /**
   * @param ZoneTypeRestriction
   */
  public function setTypeRestriction(ZoneTypeRestriction $typeRestriction)
  {
    $this->typeRestriction = $typeRestriction;
  }
  /**
   * @return ZoneTypeRestriction
   */
  public function getTypeRestriction()
  {
    return $this->typeRestriction;
  }
  /**
   * @param string
   */
  public function setWorkspaceId($workspaceId)
  {
    $this->workspaceId = $workspaceId;
  }
  /**
   * @return string
   */
  public function getWorkspaceId()
  {
    return $this->workspaceId;
  }
  /**
   * @param string
   */
  public function setZoneId($zoneId)
  {
    $this->zoneId = $zoneId;
  }
  /**
   * @return string
   */
  public function getZoneId()
  {
    return $this->zoneId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Zone::class, 'Google_Service_TagManager_Zone');
