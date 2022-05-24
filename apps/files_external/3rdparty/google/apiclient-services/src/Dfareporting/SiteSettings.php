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

namespace Google\Service\Dfareporting;

class SiteSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $activeViewOptOut;
  /**
   * @var bool
   */
  public $adBlockingOptOut;
  /**
   * @var bool
   */
  public $disableNewCookie;
  protected $tagSettingType = TagSetting::class;
  protected $tagSettingDataType = '';
  /**
   * @var bool
   */
  public $videoActiveViewOptOutTemplate;
  /**
   * @var string
   */
  public $vpaidAdapterChoiceTemplate;

  /**
   * @param bool
   */
  public function setActiveViewOptOut($activeViewOptOut)
  {
    $this->activeViewOptOut = $activeViewOptOut;
  }
  /**
   * @return bool
   */
  public function getActiveViewOptOut()
  {
    return $this->activeViewOptOut;
  }
  /**
   * @param bool
   */
  public function setAdBlockingOptOut($adBlockingOptOut)
  {
    $this->adBlockingOptOut = $adBlockingOptOut;
  }
  /**
   * @return bool
   */
  public function getAdBlockingOptOut()
  {
    return $this->adBlockingOptOut;
  }
  /**
   * @param bool
   */
  public function setDisableNewCookie($disableNewCookie)
  {
    $this->disableNewCookie = $disableNewCookie;
  }
  /**
   * @return bool
   */
  public function getDisableNewCookie()
  {
    return $this->disableNewCookie;
  }
  /**
   * @param TagSetting
   */
  public function setTagSetting(TagSetting $tagSetting)
  {
    $this->tagSetting = $tagSetting;
  }
  /**
   * @return TagSetting
   */
  public function getTagSetting()
  {
    return $this->tagSetting;
  }
  /**
   * @param bool
   */
  public function setVideoActiveViewOptOutTemplate($videoActiveViewOptOutTemplate)
  {
    $this->videoActiveViewOptOutTemplate = $videoActiveViewOptOutTemplate;
  }
  /**
   * @return bool
   */
  public function getVideoActiveViewOptOutTemplate()
  {
    return $this->videoActiveViewOptOutTemplate;
  }
  /**
   * @param string
   */
  public function setVpaidAdapterChoiceTemplate($vpaidAdapterChoiceTemplate)
  {
    $this->vpaidAdapterChoiceTemplate = $vpaidAdapterChoiceTemplate;
  }
  /**
   * @return string
   */
  public function getVpaidAdapterChoiceTemplate()
  {
    return $this->vpaidAdapterChoiceTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SiteSettings::class, 'Google_Service_Dfareporting_SiteSettings');
