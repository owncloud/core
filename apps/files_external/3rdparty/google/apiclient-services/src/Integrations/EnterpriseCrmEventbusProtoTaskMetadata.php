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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoTaskMetadata extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var string
   */
  public $activeTaskName;
  protected $adminsType = EnterpriseCrmEventbusProtoTaskMetadataAdmin::class;
  protected $adminsDataType = 'array';
  /**
   * @var string
   */
  public $category;
  /**
   * @var string
   */
  public $codeSearchLink;
  /**
   * @var string
   */
  public $defaultJsonValidationOption;
  /**
   * @var string
   */
  public $defaultSpec;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $descriptiveName;
  /**
   * @var string
   */
  public $docMarkdown;
  /**
   * @var string
   */
  public $externalCategory;
  /**
   * @var int
   */
  public $externalCategorySequence;
  /**
   * @var string
   */
  public $externalDocHtml;
  /**
   * @var string
   */
  public $externalDocLink;
  /**
   * @var string
   */
  public $externalDocMarkdown;
  /**
   * @var string
   */
  public $g3DocLink;
  /**
   * @var string
   */
  public $iconLink;
  /**
   * @var bool
   */
  public $isDeprecated;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $standaloneExternalDocHtml;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $system;
  /**
   * @var string[]
   */
  public $tags;

  /**
   * @param string
   */
  public function setActiveTaskName($activeTaskName)
  {
    $this->activeTaskName = $activeTaskName;
  }
  /**
   * @return string
   */
  public function getActiveTaskName()
  {
    return $this->activeTaskName;
  }
  /**
   * @param EnterpriseCrmEventbusProtoTaskMetadataAdmin[]
   */
  public function setAdmins($admins)
  {
    $this->admins = $admins;
  }
  /**
   * @return EnterpriseCrmEventbusProtoTaskMetadataAdmin[]
   */
  public function getAdmins()
  {
    return $this->admins;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param string
   */
  public function setCodeSearchLink($codeSearchLink)
  {
    $this->codeSearchLink = $codeSearchLink;
  }
  /**
   * @return string
   */
  public function getCodeSearchLink()
  {
    return $this->codeSearchLink;
  }
  /**
   * @param string
   */
  public function setDefaultJsonValidationOption($defaultJsonValidationOption)
  {
    $this->defaultJsonValidationOption = $defaultJsonValidationOption;
  }
  /**
   * @return string
   */
  public function getDefaultJsonValidationOption()
  {
    return $this->defaultJsonValidationOption;
  }
  /**
   * @param string
   */
  public function setDefaultSpec($defaultSpec)
  {
    $this->defaultSpec = $defaultSpec;
  }
  /**
   * @return string
   */
  public function getDefaultSpec()
  {
    return $this->defaultSpec;
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
  public function setDescriptiveName($descriptiveName)
  {
    $this->descriptiveName = $descriptiveName;
  }
  /**
   * @return string
   */
  public function getDescriptiveName()
  {
    return $this->descriptiveName;
  }
  /**
   * @param string
   */
  public function setDocMarkdown($docMarkdown)
  {
    $this->docMarkdown = $docMarkdown;
  }
  /**
   * @return string
   */
  public function getDocMarkdown()
  {
    return $this->docMarkdown;
  }
  /**
   * @param string
   */
  public function setExternalCategory($externalCategory)
  {
    $this->externalCategory = $externalCategory;
  }
  /**
   * @return string
   */
  public function getExternalCategory()
  {
    return $this->externalCategory;
  }
  /**
   * @param int
   */
  public function setExternalCategorySequence($externalCategorySequence)
  {
    $this->externalCategorySequence = $externalCategorySequence;
  }
  /**
   * @return int
   */
  public function getExternalCategorySequence()
  {
    return $this->externalCategorySequence;
  }
  /**
   * @param string
   */
  public function setExternalDocHtml($externalDocHtml)
  {
    $this->externalDocHtml = $externalDocHtml;
  }
  /**
   * @return string
   */
  public function getExternalDocHtml()
  {
    return $this->externalDocHtml;
  }
  /**
   * @param string
   */
  public function setExternalDocLink($externalDocLink)
  {
    $this->externalDocLink = $externalDocLink;
  }
  /**
   * @return string
   */
  public function getExternalDocLink()
  {
    return $this->externalDocLink;
  }
  /**
   * @param string
   */
  public function setExternalDocMarkdown($externalDocMarkdown)
  {
    $this->externalDocMarkdown = $externalDocMarkdown;
  }
  /**
   * @return string
   */
  public function getExternalDocMarkdown()
  {
    return $this->externalDocMarkdown;
  }
  /**
   * @param string
   */
  public function setG3DocLink($g3DocLink)
  {
    $this->g3DocLink = $g3DocLink;
  }
  /**
   * @return string
   */
  public function getG3DocLink()
  {
    return $this->g3DocLink;
  }
  /**
   * @param string
   */
  public function setIconLink($iconLink)
  {
    $this->iconLink = $iconLink;
  }
  /**
   * @return string
   */
  public function getIconLink()
  {
    return $this->iconLink;
  }
  /**
   * @param bool
   */
  public function setIsDeprecated($isDeprecated)
  {
    $this->isDeprecated = $isDeprecated;
  }
  /**
   * @return bool
   */
  public function getIsDeprecated()
  {
    return $this->isDeprecated;
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
  public function setStandaloneExternalDocHtml($standaloneExternalDocHtml)
  {
    $this->standaloneExternalDocHtml = $standaloneExternalDocHtml;
  }
  /**
   * @return string
   */
  public function getStandaloneExternalDocHtml()
  {
    return $this->standaloneExternalDocHtml;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setSystem($system)
  {
    $this->system = $system;
  }
  /**
   * @return string
   */
  public function getSystem()
  {
    return $this->system;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoTaskMetadata::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoTaskMetadata');
