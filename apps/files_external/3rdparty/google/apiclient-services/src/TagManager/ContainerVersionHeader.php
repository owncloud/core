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

class ContainerVersionHeader extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var string
   */
  public $containerVersionId;
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $numClients;
  /**
   * @var string
   */
  public $numCustomTemplates;
  /**
   * @var string
   */
  public $numMacros;
  /**
   * @var string
   */
  public $numRules;
  /**
   * @var string
   */
  public $numTags;
  /**
   * @var string
   */
  public $numTriggers;
  /**
   * @var string
   */
  public $numVariables;
  /**
   * @var string
   */
  public $numZones;
  /**
   * @var string
   */
  public $path;

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
  public function setContainerVersionId($containerVersionId)
  {
    $this->containerVersionId = $containerVersionId;
  }
  /**
   * @return string
   */
  public function getContainerVersionId()
  {
    return $this->containerVersionId;
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
  public function setNumClients($numClients)
  {
    $this->numClients = $numClients;
  }
  /**
   * @return string
   */
  public function getNumClients()
  {
    return $this->numClients;
  }
  /**
   * @param string
   */
  public function setNumCustomTemplates($numCustomTemplates)
  {
    $this->numCustomTemplates = $numCustomTemplates;
  }
  /**
   * @return string
   */
  public function getNumCustomTemplates()
  {
    return $this->numCustomTemplates;
  }
  /**
   * @param string
   */
  public function setNumMacros($numMacros)
  {
    $this->numMacros = $numMacros;
  }
  /**
   * @return string
   */
  public function getNumMacros()
  {
    return $this->numMacros;
  }
  /**
   * @param string
   */
  public function setNumRules($numRules)
  {
    $this->numRules = $numRules;
  }
  /**
   * @return string
   */
  public function getNumRules()
  {
    return $this->numRules;
  }
  /**
   * @param string
   */
  public function setNumTags($numTags)
  {
    $this->numTags = $numTags;
  }
  /**
   * @return string
   */
  public function getNumTags()
  {
    return $this->numTags;
  }
  /**
   * @param string
   */
  public function setNumTriggers($numTriggers)
  {
    $this->numTriggers = $numTriggers;
  }
  /**
   * @return string
   */
  public function getNumTriggers()
  {
    return $this->numTriggers;
  }
  /**
   * @param string
   */
  public function setNumVariables($numVariables)
  {
    $this->numVariables = $numVariables;
  }
  /**
   * @return string
   */
  public function getNumVariables()
  {
    return $this->numVariables;
  }
  /**
   * @param string
   */
  public function setNumZones($numZones)
  {
    $this->numZones = $numZones;
  }
  /**
   * @return string
   */
  public function getNumZones()
  {
    return $this->numZones;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContainerVersionHeader::class, 'Google_Service_TagManager_ContainerVersionHeader');
