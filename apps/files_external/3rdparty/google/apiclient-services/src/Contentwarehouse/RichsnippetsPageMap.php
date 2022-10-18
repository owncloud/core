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

class RichsnippetsPageMap extends \Google\Collection
{
  protected $collection_key = 'templatetype';
  protected $internal_gapi_mappings = [
        "dataObject" => "DataObject",
  ];
  protected $dataObjectType = RichsnippetsDataObject::class;
  protected $dataObjectDataType = 'array';
  /**
   * @var bool
   */
  public $ignoreDataObject;
  /**
   * @var string
   */
  public $src;
  protected $templatetypeType = RichsnippetsPageMapTemplateType::class;
  protected $templatetypeDataType = 'array';

  /**
   * @param RichsnippetsDataObject[]
   */
  public function setDataObject($dataObject)
  {
    $this->dataObject = $dataObject;
  }
  /**
   * @return RichsnippetsDataObject[]
   */
  public function getDataObject()
  {
    return $this->dataObject;
  }
  /**
   * @param bool
   */
  public function setIgnoreDataObject($ignoreDataObject)
  {
    $this->ignoreDataObject = $ignoreDataObject;
  }
  /**
   * @return bool
   */
  public function getIgnoreDataObject()
  {
    return $this->ignoreDataObject;
  }
  /**
   * @param string
   */
  public function setSrc($src)
  {
    $this->src = $src;
  }
  /**
   * @return string
   */
  public function getSrc()
  {
    return $this->src;
  }
  /**
   * @param RichsnippetsPageMapTemplateType[]
   */
  public function setTemplatetype($templatetype)
  {
    $this->templatetype = $templatetype;
  }
  /**
   * @return RichsnippetsPageMapTemplateType[]
   */
  public function getTemplatetype()
  {
    return $this->templatetype;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RichsnippetsPageMap::class, 'Google_Service_Contentwarehouse_RichsnippetsPageMap');
