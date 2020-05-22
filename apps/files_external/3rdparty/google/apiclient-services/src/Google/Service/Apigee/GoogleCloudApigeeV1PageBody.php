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

class Google_Service_Apigee_GoogleCloudApigeeV1PageBody extends Google_Collection
{
  protected $collection_key = 'generatedContent';
  public $active;
  public $anonAllowed;
  public $apiProduct;
  public $content;
  public $created;
  public $description;
  public $draft;
  public $friendlyId;
  public $generatedContent;
  public $id;
  public $layout;
  public $modified;
  public $modifiedBy;
  public $name;
  public $published;
  public $publishedBy;
  public $siteId;
  public $submenuId;
  public $systemGenerated;
  public $type;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setAnonAllowed($anonAllowed)
  {
    $this->anonAllowed = $anonAllowed;
  }
  public function getAnonAllowed()
  {
    return $this->anonAllowed;
  }
  public function setApiProduct($apiProduct)
  {
    $this->apiProduct = $apiProduct;
  }
  public function getApiProduct()
  {
    return $this->apiProduct;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDraft($draft)
  {
    $this->draft = $draft;
  }
  public function getDraft()
  {
    return $this->draft;
  }
  public function setFriendlyId($friendlyId)
  {
    $this->friendlyId = $friendlyId;
  }
  public function getFriendlyId()
  {
    return $this->friendlyId;
  }
  public function setGeneratedContent($generatedContent)
  {
    $this->generatedContent = $generatedContent;
  }
  public function getGeneratedContent()
  {
    return $this->generatedContent;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLayout($layout)
  {
    $this->layout = $layout;
  }
  public function getLayout()
  {
    return $this->layout;
  }
  public function setModified($modified)
  {
    $this->modified = $modified;
  }
  public function getModified()
  {
    return $this->modified;
  }
  public function setModifiedBy($modifiedBy)
  {
    $this->modifiedBy = $modifiedBy;
  }
  public function getModifiedBy()
  {
    return $this->modifiedBy;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setPublishedBy($publishedBy)
  {
    $this->publishedBy = $publishedBy;
  }
  public function getPublishedBy()
  {
    return $this->publishedBy;
  }
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  public function getSiteId()
  {
    return $this->siteId;
  }
  public function setSubmenuId($submenuId)
  {
    $this->submenuId = $submenuId;
  }
  public function getSubmenuId()
  {
    return $this->submenuId;
  }
  public function setSystemGenerated($systemGenerated)
  {
    $this->systemGenerated = $systemGenerated;
  }
  public function getSystemGenerated()
  {
    return $this->systemGenerated;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
