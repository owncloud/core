<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * Represents an HTML element.
 */
class RemoteWebElement implements WebDriverElement, WebDriverLocatable {

  /**
   * @var RemoteExecuteMethod
   */
  protected $executor;
  /**
   * @var string
   */
  protected $id;
  /**
   * @var UselessFileDetector
   */
  protected $fileDetector;

  /**
   * @param RemoteExecuteMethod $executor
   * @param string $id
   */
  public function __construct(RemoteExecuteMethod $executor, $id) {
    $this->executor = $executor;
    $this->id = $id;
    $this->fileDetector = new UselessFileDetector();
  }

  /**
   * If this element is a TEXTAREA or text INPUT element, this will clear the
   * value.
   *
   * @return RemoteWebElement The current instance.
   */
  public function clear() {
    $this->executor->execute(
      DriverCommand::CLEAR_ELEMENT,
      array(':id' => $this->id)
    );
    return $this;
  }

  /**
   * Click this element.
   *
   * @return RemoteWebElement The current instance.
   */
  public function click() {
    $this->executor->execute(
      DriverCommand::CLICK_ELEMENT,
      array(':id' => $this->id)
    );
    return $this;
  }

  /**
   * Find the first WebDriverElement within this element using the given
   * mechanism.
   *
   * @param WebDriverBy $by
   * @return RemoteWebElement NoSuchElementException is thrown in
   *    HttpCommandExecutor if no element is found.
   * @see WebDriverBy
   */
  public function findElement(WebDriverBy $by) {
    $params = array(
      'using' => $by->getMechanism(),
      'value' => $by->getValue(),
      ':id'   => $this->id,
    );
    $raw_element = $this->executor->execute(
      DriverCommand::FIND_CHILD_ELEMENT,
      $params
    );

    return $this->newElement($raw_element['ELEMENT']);
  }

  /**
   * Find all WebDriverElements within this element using the given mechanism.
   *
   * @param WebDriverBy $by
   * @return RemoteWebElement[] A list of all WebDriverElements, or an empty
   *    array if nothing matches
   * @see WebDriverBy
   */
  public function findElements(WebDriverBy $by) {
    $params = array(
      'using' => $by->getMechanism(),
      'value' => $by->getValue(),
      ':id'   => $this->id,
    );
    $raw_elements = $this->executor->execute(
      DriverCommand::FIND_CHILD_ELEMENTS,
      $params
    );

    $elements = array();
    foreach ($raw_elements as $raw_element) {
      $elements[] = $this->newElement($raw_element['ELEMENT']);
    }
    return $elements;
  }

  /**
   * Get the value of a the given attribute of the element.
   *
   * @param string $attribute_name The name of the attribute.
   * @return string|null The value of the attribute.
   */
  public function getAttribute($attribute_name) {
    $params = array(
      ':name' => $attribute_name,
      ':id'   => $this->id,
    );
    return $this->executor->execute(
      DriverCommand::GET_ELEMENT_ATTRIBUTE,
      $params
    );
  }

  /**
   * Get the value of a given CSS property.
   *
   * @param string $css_property_name The name of the CSS property.
   * @return string The value of the CSS property.
   */
  public function getCSSValue($css_property_name) {
    $params = array(
      ':propertyName' => $css_property_name,
      ':id'           => $this->id,
    );
    return $this->executor->execute(
      DriverCommand::GET_ELEMENT_VALUE_OF_CSS_PROPERTY,
      $params
    );
  }

  /**
   * Get the location of element relative to the top-left corner of the page.
   *
   * @return WebDriverPoint The location of the element.
   */
  public function getLocation() {
    $location = $this->executor->execute(
      DriverCommand::GET_ELEMENT_LOCATION,
      array(':id' => $this->id)
    );
    return new WebDriverPoint($location['x'], $location['y']);
  }

  /**
   * Try scrolling the element into the view port and return the location of
   * element relative to the top-left corner of the page afterwards.
   *
   * @return WebDriverPoint The location of the element.
   */
  public function getLocationOnScreenOnceScrolledIntoView() {
    $location = $this->executor->execute(
      DriverCommand::GET_ELEMENT_LOCATION_ONCE_SCROLLED_INTO_VIEW,
      array(':id' => $this->id)
    );
    return new WebDriverPoint($location['x'], $location['y']);
  }

  /**
   * @return WebDriverCoordinates
   */
  public function getCoordinates() {
    $element = $this;

    $on_screen = null; // planned but not yet implemented
    $in_view_port = function () use ($element) {
      return $element->getLocationOnScreenOnceScrolledIntoView();
    };
    $on_page = function () use ($element) {
      return $element->getLocation();
    };
    $auxiliary = $this->getID();

    return new WebDriverCoordinates(
      $on_screen,
      $in_view_port,
      $on_page,
      $auxiliary
    );
  }

  /**
   * Get the size of element.
   *
   * @return WebDriverDimension The dimension of the element.
   */
  public function getSize() {
    $size = $this->executor->execute(
      DriverCommand::GET_ELEMENT_SIZE,
      array(':id' => $this->id)
    );
    return new WebDriverDimension($size['width'], $size['height']);
  }

  /**
   * Get the tag name of this element.
   *
   * @return string The tag name.
   */
  public function getTagName() {
    // Force tag name to be lowercase as expected by protocol for Opera driver
    // until this issue is not resolved :
    // https://github.com/operasoftware/operadriver/issues/102
    // Remove it when fixed to be consistent with the protocol.
    return strtolower($this->executor->execute(
      DriverCommand::GET_ELEMENT_TAG_NAME,
      array(':id' => $this->id)
    ));
  }

  /**
   * Get the visible (i.e. not hidden by CSS) innerText of this element,
   * including sub-elements, without any leading or trailing whitespace.
   *
   * @return string The visible innerText of this element.
   */
  public function getText() {
    return $this->executor->execute(
      DriverCommand::GET_ELEMENT_TEXT,
      array(':id' => $this->id)
    );
  }

  /**
   * Is this element displayed or not? This method avoids the problem of having
   * to parse an element's "style" attribute.
   *
   * @return bool
   */
  public function isDisplayed() {
    return $this->executor->execute(
      DriverCommand::IS_ELEMENT_DISPLAYED,
      array(':id' => $this->id)
    );
  }

  /**
   * Is the element currently enabled or not? This will generally return true
   * for everything but disabled input elements.
   *
   * @return bool
   */
  public function isEnabled() {
    return $this->executor->execute(
      DriverCommand::IS_ELEMENT_ENABLED,
      array(':id' => $this->id)
    );
  }

  /**
   * Determine whether or not this element is selected or not.
   *
   * @return bool
   */
  public function isSelected() {
    return $this->executor->execute(
      DriverCommand::IS_ELEMENT_SELECTED,
      array(':id' => $this->id)
    );
  }

  /**
   * Simulate typing into an element, which may set its value.
   *
   * @param mixed $value The data to be typed.
   * @return RemoteWebElement The current instance.
   */
  public function sendKeys($value) {
    $local_file = $this->fileDetector->getLocalFile($value);
    if ($local_file === null) {
      $params = array(
        'value' => WebDriverKeys::encode($value),
        ':id'   => $this->id,
      );
      $this->executor->execute(DriverCommand::SEND_KEYS_TO_ELEMENT, $params);
    } else {
      $remote_path = $this->upload($local_file);
      $params = array(
        'value' => WebDriverKeys::encode($remote_path),
        ':id'   => $this->id,
      );
      $this->executor->execute(DriverCommand::SEND_KEYS_TO_ELEMENT, $params);
    }
    return $this;
  }

  /**
   * Upload a local file to the server
   *
   * @param string $local_file
   *
   * @throws WebDriverException
   * @return string The remote path of the file.
   */
  private function upload($local_file) {
    if (!is_file($local_file)) {
      throw new WebDriverException("You may only upload files: " . $local_file);
    }

    // Create a temporary file in the system temp directory.
    $temp_zip = tempnam('', 'WebDriverZip');
    $zip = new ZipArchive();
    if ($zip->open($temp_zip, ZipArchive::CREATE) !== true) {
      return false;
    }
    $info = pathinfo($local_file);
    $file_name = $info['basename'];
    $zip->addFile($local_file, $file_name);
    $zip->close();
    $params = array(
      'file' => base64_encode(file_get_contents($temp_zip)),
    );
    $remote_path = $this->executor->execute(
      DriverCommand::UPLOAD_FILE,
      $params
    );
    unlink($temp_zip);
    return $remote_path;
  }

  /**
   * Set the fileDetector in order to let the RemoteWebElement to know that
   * you are going to upload a file.
   *
   * Basically, if you want WebDriver trying to send a file, set the fileDetector
   * to be LocalFileDetector. Otherwise, keep it UselessFileDetector.
   *
   *   eg. $element->setFileDetector(new LocalFileDetector);
   *
   * @param FileDetector $detector
   * @return RemoteWebElement
   * @see FileDetector
   * @see LocalFileDetector
   * @see UselessFileDetector
   */
  public function setFileDetector(FileDetector $detector) {
    $this->fileDetector = $detector;
    return $this;
  }

  /**
   * If this current element is a form, or an element within a form, then this
   * will be submitted to the remote server.
   *
   * @return RemoteWebElement The current instance.
   */
  public function submit() {
    $this->executor->execute(
      DriverCommand::SUBMIT_ELEMENT,
      array(':id' => $this->id)
    );

    return $this;
  }

  /**
   * Get the opaque ID of the element.
   *
   * @return string The opaque ID.
   */
  public function getID() {
    return $this->id;
  }

  /**
   * Test if two element IDs refer to the same DOM element.
   *
   * @param WebDriverElement $other
   * @return bool
   */
  public function equals(WebDriverElement $other) {
    return $this->executor->execute(DriverCommand::ELEMENT_EQUALS, array(
      ':id'    => $this->id,
      ':other' => $other->getID(),
    ));
  }

  /**
   * Return the WebDriverElement with $id
   *
   * @param string $id
   *
   * @return RemoteWebElement
   */
  private function newElement($id) {
    return new RemoteWebElement($this->executor, $id);
  }
}
