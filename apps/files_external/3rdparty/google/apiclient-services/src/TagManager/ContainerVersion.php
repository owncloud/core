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
  /**
   * @var string
   */
  public $accountId;
  protected $builtInVariableType = BuiltInVariable::class;
  protected $builtInVariableDataType = 'array';
  protected $clientType = Client::class;
  protected $clientDataType = 'array';
  protected $containerType = Container::class;
  protected $containerDataType = '';
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var string
   */
  public $containerVersionId;
  protected $customTemplateType = CustomTemplate::class;
  protected $customTemplateDataType = 'array';
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $fingerprint;
  protected $folderType = Folder::class;
  protected $folderDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $path;
  protected $tagType = Tag::class;
  protected $tagDataType = 'array';
  /**
   * @var string
   */
  public $tagManagerUrl;
  protected $triggerType = Trigger::class;
  protected $triggerDataType = 'array';
  protected $variableType = Variable::class;
  protected $variableDataType = 'array';
  protected $zoneType = Zone::class;
  protected $zoneDataType = 'array';

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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
