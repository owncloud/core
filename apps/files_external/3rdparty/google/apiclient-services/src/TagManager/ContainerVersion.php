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

class ContainerVersion extends \Google\Collection
{
  protected $collection_key = 'zone';
  public $accountId;
  protected $builtInVariableType = BuiltInVariable::class;
  protected $builtInVariableDataType = 'array';
  protected $clientType = Client::class;
  protected $clientDataType = 'array';
  protected $containerType = Container::class;
  protected $containerDataType = '';
  public $containerId;
  public $containerVersionId;
  protected $customTemplateType = CustomTemplate::class;
  protected $customTemplateDataType = 'array';
  public $deleted;
  public $description;
  public $fingerprint;
  protected $folderType = Folder::class;
  protected $folderDataType = 'array';
  public $name;
  public $path;
  protected $tagType = Tag::class;
  protected $tagDataType = 'array';
  public $tagManagerUrl;
  protected $triggerType = Trigger::class;
  protected $triggerDataType = 'array';
  protected $variableType = Variable::class;
  protected $variableDataType = 'array';
  protected $zoneType = Zone::class;
  protected $zoneDataType = 'array';

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param BuiltInVariable[]
   */
  public function setBuiltInVariable($builtInVariable)
  {
    $this->builtInVariable = $builtInVariable;
  }
  /**
   * @return BuiltInVariable[]
   */
  public function getBuiltInVariable()
  {
    return $this->builtInVariable;
  }
  /**
   * @param Client[]
   */
  public function setClient($client)
  {
    $this->client = $client;
  }
  /**
   * @return Client[]
   */
  public function getClient()
  {
    return $this->client;
  }
  /**
   * @param Container
   */
  public function setContainer(Container $container)
  {
    $this->container = $container;
  }
  /**
   * @return Container
   */
  public function getContainer()
  {
    return $this->container;
  }
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  public function getContainerId()
  {
    return $this->containerId;
  }
  public function setContainerVersionId($containerVersionId)
  {
    $this->containerVersionId = $containerVersionId;
  }
  public function getContainerVersionId()
  {
    return $this->containerVersionId;
  }
  /**
   * @param CustomTemplate[]
   */
  public function setCustomTemplate($customTemplate)
  {
    $this->customTemplate = $customTemplate;
  }
  /**
   * @return CustomTemplate[]
   */
  public function getCustomTemplate()
  {
    return $this->customTemplate;
  }
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  public function getDeleted()
  {
    return $this->deleted;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param Folder[]
   */
  public function setFolder($folder)
  {
    $this->folder = $folder;
  }
  /**
   * @return Folder[]
   */
  public function getFolder()
  {
    return $this->folder;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param Tag[]
   */
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return Tag[]
   */
  public function getTag()
  {
    return $this->tag;
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
   * @param Trigger[]
   */
  public function setTrigger($trigger)
  {
    $this->trigger = $trigger;
  }
  /**
   * @return Trigger[]
   */
  public function getTrigger()
  {
    return $this->trigger;
  }
  /**
   * @param Variable[]
   */
  public function setVariable($variable)
  {
    $this->variable = $variable;
  }
  /**
   * @return Variable[]
   */
  public function getVariable()
  {
    return $this->variable;
  }
  /**
   * @param Zone[]
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return Zone[]
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContainerVersion::class, 'Google_Service_TagManager_ContainerVersion');
