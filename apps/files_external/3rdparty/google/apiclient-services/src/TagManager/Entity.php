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

class Entity extends \Google\Model
{
  /**
   * @var string
   */
  public $changeStatus;
  protected $clientType = Client::class;
  protected $clientDataType = '';
  protected $folderType = Folder::class;
  protected $folderDataType = '';
  protected $tagType = Tag::class;
  protected $tagDataType = '';
  protected $triggerType = Trigger::class;
  protected $triggerDataType = '';
  protected $variableType = Variable::class;
  protected $variableDataType = '';

  /**
   * @param string
   */
  public function setChangeStatus($changeStatus)
  {
    $this->changeStatus = $changeStatus;
  }
  /**
   * @return string
   */
  public function getChangeStatus()
  {
    return $this->changeStatus;
  }
  /**
   * @param Client
   */
  public function setClient(Client $client)
  {
    $this->client = $client;
  }
  /**
   * @return Client
   */
  public function getClient()
  {
    return $this->client;
  }
  /**
   * @param Folder
   */
  public function setFolder(Folder $folder)
  {
    $this->folder = $folder;
  }
  /**
   * @return Folder
   */
  public function getFolder()
  {
    return $this->folder;
  }
  /**
   * @param Tag
   */
  public function setTag(Tag $tag)
  {
    $this->tag = $tag;
  }
  /**
   * @return Tag
   */
  public function getTag()
  {
    return $this->tag;
  }
  /**
   * @param Trigger
   */
  public function setTrigger(Trigger $trigger)
  {
    $this->trigger = $trigger;
  }
  /**
   * @return Trigger
   */
  public function getTrigger()
  {
    return $this->trigger;
  }
  /**
   * @param Variable
   */
  public function setVariable(Variable $variable)
  {
    $this->variable = $variable;
  }
  /**
   * @return Variable
   */
  public function getVariable()
  {
    return $this->variable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Entity::class, 'Google_Service_TagManager_Entity');
