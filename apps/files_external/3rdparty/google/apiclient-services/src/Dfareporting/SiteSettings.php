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
  public $activeViewOptOut;
  public $adBlockingOptOut;
  public $disableNewCookie;
  protected $tagSettingType = TagSetting::class;
  protected $tagSettingDataType = '';
  public $videoActiveViewOptOutTemplate;
  public $vpaidAdapterChoiceTemplate;

  public function setActiveViewOptOut($activeViewOptOut)
  {
    $this->activeViewOptOut = $activeViewOptOut;
  }
  public function getActiveViewOptOut()
  {
    return $this->activeViewOptOut;
  }
  public function setAdBlockingOptOut($adBlockingOptOut)
  {
    $this->adBlockingOptOut = $adBlockingOptOut;
  }
  public function getAdBlockingOptOut()
  {
    return $this->adBlockingOptOut;
  }
  public function setDisableNewCookie($disableNewCookie)
  {
    $this->disableNewCookie = $disableNewCookie;
  }
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
  public function setVideoActiveViewOptOutTemplate($videoActiveViewOptOutTemplate)
  {
    $this->videoActiveViewOptOutTemplate = $videoActiveViewOptOutTemplate;
  }
  public function getVideoActiveViewOptOutTemplate()
  {
    return $this->videoActiveViewOptOutTemplate;
  }
  public function setVpaidAdapterChoiceTemplate($vpaidAdapterChoiceTemplate)
  {
    $this->vpaidAdapterChoiceTemplate = $vpaidAdapterChoiceTemplate;
  }
  public function getVpaidAdapterChoiceTemplate()
  {
    return $this->vpaidAdapterChoiceTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SiteSettings::class, 'Google_Service_Dfareporting_SiteSettings');
