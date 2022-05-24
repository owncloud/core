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

namespace Google\Service\CloudHealthcare;

class DeidentifyConfig extends \Google\Model
{
  protected $dicomType = DicomConfig::class;
  protected $dicomDataType = '';
  protected $fhirType = FhirConfig::class;
  protected $fhirDataType = '';
  protected $imageType = ImageConfig::class;
  protected $imageDataType = '';
  protected $textType = TextConfig::class;
  protected $textDataType = '';

  /**
   * @param DicomConfig
   */
  public function setDicom(DicomConfig $dicom)
  {
    $this->dicom = $dicom;
  }
  /**
   * @return DicomConfig
   */
  public function getDicom()
  {
    return $this->dicom;
  }
  /**
   * @param FhirConfig
   */
  public function setFhir(FhirConfig $fhir)
  {
    $this->fhir = $fhir;
  }
  /**
   * @return FhirConfig
   */
  public function getFhir()
  {
    return $this->fhir;
  }
  /**
   * @param ImageConfig
   */
  public function setImage(ImageConfig $image)
  {
    $this->image = $image;
  }
  /**
   * @return ImageConfig
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param TextConfig
   */
  public function setText(TextConfig $text)
  {
    $this->text = $text;
  }
  /**
   * @return TextConfig
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeidentifyConfig::class, 'Google_Service_CloudHealthcare_DeidentifyConfig');
