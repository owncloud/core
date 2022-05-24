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

namespace Google\Service\ChromePolicy;

class ChromeCrosDpanelAutosettingsProtoPolicyApiLifecycle extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  protected $endSupportType = GoogleTypeDate::class;
  protected $endSupportDataType = '';
  /**
   * @var string
   */
  public $policyApiLifecycleStage;

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
   * @param GoogleTypeDate
   */
  public function setEndSupport(GoogleTypeDate $endSupport)
  {
    $this->endSupport = $endSupport;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getEndSupport()
  {
    return $this->endSupport;
  }
  /**
   * @param string
   */
  public function setPolicyApiLifecycleStage($policyApiLifecycleStage)
  {
    $this->policyApiLifecycleStage = $policyApiLifecycleStage;
  }
  /**
   * @return string
   */
  public function getPolicyApiLifecycleStage()
  {
    return $this->policyApiLifecycleStage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeCrosDpanelAutosettingsProtoPolicyApiLifecycle::class, 'Google_Service_ChromePolicy_ChromeCrosDpanelAutosettingsProtoPolicyApiLifecycle');
