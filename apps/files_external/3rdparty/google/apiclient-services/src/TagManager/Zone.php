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
  protected $collection_key = 'parameter';
  public $accountId;
  protected $boundaryType = ZoneBoundary::class;
  protected $boundaryDataType = '';
  protected $childContainerType = ZoneChildContainer::class;
  protected $childContainerDataType = 'array';
  public $containerId;
  public $fingerprint;
  public $name;
  public $notes;
  protected $parameterType = Parameter::class;
  protected $parameterDataType = 'array';
  public $path;
  public $tagManagerUrl;
  protected $typeRestrictionType = ZoneTypeRestriction::class;
  protected $typeRestrictionDataType = '';
  public $workspaceId;
  public $zoneId;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
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
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  public function getContainerId()
  {
    return $this->containerId;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param Parameter[]
   */
  public function setParameter($parameter)
  {
    $this->parameter = $parameter;
  }
  /**
   * @return Parameter[]
   */
  public function getParameter()
  {
    return $this->parameter;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setTagManagerUrl($tagManagerUrl)
  {
    $this->tagManagerUrl = $tagManagerUrl;
  }
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
  public function setWorkspaceId($workspaceId)
  {
    $this->workspaceId = $workspaceId;
  }
  public function getWorkspaceId()
  {
    return $this->workspaceId;
  }
  public function setZoneId($zoneId)
  {
    $this->zoneId = $zoneId;
  }
  public function getZoneId()
  {
    return $this->zoneId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Zone::class, 'Google_Service_TagManager_Zone');
