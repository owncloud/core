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

class Google_Service_Transcoder_Animation extends Google_Model
{
  protected $animationEndType = 'Google_Service_Transcoder_AnimationEnd';
  protected $animationEndDataType = '';
  protected $animationFadeType = 'Google_Service_Transcoder_AnimationFade';
  protected $animationFadeDataType = '';
  protected $animationStaticType = 'Google_Service_Transcoder_AnimationStatic';
  protected $animationStaticDataType = '';

  /**
   * @param Google_Service_Transcoder_AnimationEnd
   */
  public function setAnimationEnd(Google_Service_Transcoder_AnimationEnd $animationEnd)
  {
    $this->animationEnd = $animationEnd;
  }
  /**
   * @return Google_Service_Transcoder_AnimationEnd
   */
  public function getAnimationEnd()
  {
    return $this->animationEnd;
  }
  /**
   * @param Google_Service_Transcoder_AnimationFade
   */
  public function setAnimationFade(Google_Service_Transcoder_AnimationFade $animationFade)
  {
    $this->animationFade = $animationFade;
  }
  /**
   * @return Google_Service_Transcoder_AnimationFade
   */
  public function getAnimationFade()
  {
    return $this->animationFade;
  }
  /**
   * @param Google_Service_Transcoder_AnimationStatic
   */
  public function setAnimationStatic(Google_Service_Transcoder_AnimationStatic $animationStatic)
  {
    $this->animationStatic = $animationStatic;
  }
  /**
   * @return Google_Service_Transcoder_AnimationStatic
   */
  public function getAnimationStatic()
  {
    return $this->animationStatic;
  }
}
