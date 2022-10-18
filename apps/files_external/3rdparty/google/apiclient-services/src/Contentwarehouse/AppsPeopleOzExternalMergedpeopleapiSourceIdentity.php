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

class AppsPeopleOzExternalMergedpeopleapiSourceIdentity extends \Google\Model
{
  /**
   * @var string
   */
  public $container;
  /**
   * @var string
   */
  public $containerType;
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $lastUpdated;
  /**
   * @var string
   */
  public $lastUpdatedMicros;
  /**
   * @var string
   */
  public $sourceEtag;

  /**
   * @param string
   */
  public function setContainer($container)
  {
    $this->container = $container;
  }
  /**
   * @return string
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param string
   */
  public function setContainerType($containerType)
  {
    $this->containerType = $containerType;
  }
  /**
   * @return string
   */
  public function getContainerType()
  {
    return $this->containerType;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
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
  public function setLastUpdated($lastUpdated)
  {
    $this->lastUpdated = $lastUpdated;
  }
  /**
   * @return string
   */
  public function getLastUpdated()
  {
    return $this->lastUpdated;
  }
  /**
   * @param string
   */
  public function setLastUpdatedMicros($lastUpdatedMicros)
  {
    $this->lastUpdatedMicros = $lastUpdatedMicros;
  }
  /**
   * @return string
   */
  public function getLastUpdatedMicros()
  {
    return $this->lastUpdatedMicros;
  }
  /**
   * @param string
   */
  public function setSourceEtag($sourceEtag)
  {
    $this->sourceEtag = $sourceEtag;
  }
  /**
   * @return string
   */
  public function getSourceEtag()
  {
    return $this->sourceEtag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiSourceIdentity::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiSourceIdentity');
