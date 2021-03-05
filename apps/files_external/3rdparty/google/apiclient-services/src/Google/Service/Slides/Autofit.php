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

class Google_Service_Slides_Autofit extends Google_Model
{
  public $autofitType;
  public $fontScale;
  public $lineSpacingReduction;

  public function setAutofitType($autofitType)
  {
    $this->autofitType = $autofitType;
  }
  public function getAutofitType()
  {
    return $this->autofitType;
  }
  public function setFontScale($fontScale)
  {
    $this->fontScale = $fontScale;
  }
  public function getFontScale()
  {
    return $this->fontScale;
  }
  public function setLineSpacingReduction($lineSpacingReduction)
  {
    $this->lineSpacingReduction = $lineSpacingReduction;
  }
  public function getLineSpacingReduction()
  {
    return $this->lineSpacingReduction;
  }
}
