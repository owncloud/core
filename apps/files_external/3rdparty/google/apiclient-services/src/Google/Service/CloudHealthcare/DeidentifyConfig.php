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

class Google_Service_CloudHealthcare_DeidentifyConfig extends Google_Model
{
  protected $dicomType = 'Google_Service_CloudHealthcare_DicomConfig';
  protected $dicomDataType = '';
  protected $fhirType = 'Google_Service_CloudHealthcare_FhirConfig';
  protected $fhirDataType = '';
  protected $imageType = 'Google_Service_CloudHealthcare_ImageConfig';
  protected $imageDataType = '';
  protected $textType = 'Google_Service_CloudHealthcare_TextConfig';
  protected $textDataType = '';

  /**
   * @param Google_Service_CloudHealthcare_DicomConfig
   */
  public function setDicom(Google_Service_CloudHealthcare_DicomConfig $dicom)
  {
    $this->dicom = $dicom;
  }
  /**
   * @return Google_Service_CloudHealthcare_DicomConfig
   */
  public function getDicom()
  {
    return $this->dicom;
  }
  /**
   * @param Google_Service_CloudHealthcare_FhirConfig
   */
  public function setFhir(Google_Service_CloudHealthcare_FhirConfig $fhir)
  {
    $this->fhir = $fhir;
  }
  /**
   * @return Google_Service_CloudHealthcare_FhirConfig
   */
  public function getFhir()
  {
    return $this->fhir;
  }
  /**
   * @param Google_Service_CloudHealthcare_ImageConfig
   */
  public function setImage(Google_Service_CloudHealthcare_ImageConfig $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_CloudHealthcare_ImageConfig
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_CloudHealthcare_TextConfig
   */
  public function setText(Google_Service_CloudHealthcare_TextConfig $text)
  {
    $this->text = $text;
  }
  /**
   * @return Google_Service_CloudHealthcare_TextConfig
   */
  public function getText()
  {
    return $this->text;
  }
}
