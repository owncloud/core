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

class AppsPeopleOzExternalMergedpeopleapiWebsite extends \Google\Collection
{
  protected $collection_key = 'rel';
  /**
   * @var string
   */
  public $formattedType;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  protected $relType = AppsPeopleOzExternalMergedpeopleapiWebsiteRelationshipInfo::class;
  protected $relDataType = 'array';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  /**
   * @return string
   */
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiWebsiteRelationshipInfo[]
   */
  public function setRel($rel)
  {
    $this->rel = $rel;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiWebsiteRelationshipInfo[]
   */
  public function getRel()
  {
    return $this->rel;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiWebsite::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiWebsite');
