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

namespace Google\Service\Forms;

class Form extends \Google\Collection
{
  protected $collection_key = 'items';
  /**
   * @var string
   */
  public $formId;
  protected $infoType = Info::class;
  protected $infoDataType = '';
  protected $itemsType = Item::class;
  protected $itemsDataType = 'array';
  /**
   * @var string
   */
  public $linkedSheetId;
  /**
   * @var string
   */
  public $responderUri;
  /**
   * @var string
   */
  public $revisionId;
  protected $settingsType = FormSettings::class;
  protected $settingsDataType = '';

  /**
   * @param string
   */
  public function setFormId($formId)
  {
    $this->formId = $formId;
  }
  /**
   * @return string
   */
  public function getFormId()
  {
    return $this->formId;
  }
  /**
   * @param Info
   */
  public function setInfo(Info $info)
  {
    $this->info = $info;
  }
  /**
   * @return Info
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param Item[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Item[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param string
   */
  public function setLinkedSheetId($linkedSheetId)
  {
    $this->linkedSheetId = $linkedSheetId;
  }
  /**
   * @return string
   */
  public function getLinkedSheetId()
  {
    return $this->linkedSheetId;
  }
  /**
   * @param string
   */
  public function setResponderUri($responderUri)
  {
    $this->responderUri = $responderUri;
  }
  /**
   * @return string
   */
  public function getResponderUri()
  {
    return $this->responderUri;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param FormSettings
   */
  public function setSettings(FormSettings $settings)
  {
    $this->settings = $settings;
  }
  /**
   * @return FormSettings
   */
  public function getSettings()
  {
    return $this->settings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Form::class, 'Google_Service_Forms_Form');
