<?php
/**
 * @author Piotr Mrowczynski <Piotr.Mrowczynski@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\DAV\Tests\unit\DAV;

use Test\TestCase;

class MultipartContentsParserTest extends TestCase {
	private $boundrary;

	protected function setUp() {
		parent::setUp();

		$this->boundrary = 'boundary';

	}

	/**
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Unable to get request content
	 */
	public function testGetsThrowWrongContents() {
		//TODO
		$bodyStream = "I am not a stream, but pretend to be";
		$request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')
			->disableOriginalConstructor()
			->getMock();
		$request->expects($this->any())
			->method('getBody')
			->willReturn($bodyStream);

		$mcp = new \OCA\DAV\Files\MultipartContentsParser($request);

		$mcp->gets();
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Unable to determine headers limit for content part
	 */
	public function testReadHeadersThrowEmptyHeader() {
		$request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')
			->disableOriginalConstructor()
			->getMock();

		$mcp = new \OCA\DAV\Files\MultipartContentsParser($request);
		$mcp->readHeaders('');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Header of content part contains incorrect headers
	 */
	public function testReadHeadersThrowIncorrectHeader() {
		$request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')
			->disableOriginalConstructor()
			->getMock();

		$mcp = new \OCA\DAV\Files\MultipartContentsParser($request);
		$mcp->readHeaders("Content-ID: 1\r\nContent-MD5\r\n\r\n");
	}

	/**
	 * streamRead function with incorrect parameter
	 *
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Method streamRead cannot read contents with negative length
	 */
	public function testStreamReadToStringThrowNegativeLength() {
		$bodyContent = 'blabla';
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyContent);
		//give negative length
		$multipartContentsParser->streamReadToString(-1);
	}

	/**
	 * streamRead function with incorrect parameter
	 *
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Method streamRead cannot read contents with negative length
	 */
	public function testStreamReadToStreamThrowNegativeLength() {
		$target = fopen('php://temp', 'r+');
		$bodyContent = 'blabla';
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyContent);
		//give negative length
		$multipartContentsParser->streamReadToStream($target,-1);
	}

	public function testStreamReadToString() {
		$length = 0;
		list($multipartContentsParser, $bodyString) = $this->fillMultipartContentsParserStreamWithChars($length);
		$this->assertEquals($bodyString, $multipartContentsParser->streamReadToString($length));

		$length = 1000;
		list($multipartContentsParser, $bodyString) = $this->fillMultipartContentsParserStreamWithChars($length);
		$this->assertEquals($bodyString, $multipartContentsParser->streamReadToString($length));

		$length = 8192;
		list($multipartContentsParser, $bodyString) = $this->fillMultipartContentsParserStreamWithChars($length);
		$this->assertEquals($bodyString, $multipartContentsParser->streamReadToString($length));

		$length = 20000;
		list($multipartContentsParser, $bodyString) = $this->fillMultipartContentsParserStreamWithChars($length);
		$this->assertEquals($bodyString, $multipartContentsParser->streamReadToString($length));
	}

	public function testStreamReadToStream() {
		$length = 0;
		$this->streamReadToStreamBuilder($length);

		$length = 1000;
		$this->streamReadToStreamBuilder($length);

		$length = 8192;
		$this->streamReadToStreamBuilder($length);

		$length = 20000;
		$this->streamReadToStreamBuilder($length);
	}

	private function streamReadToStreamBuilder($length) {
		$target = fopen('php://temp', 'r+');
		list($multipartContentsParser, $bodyString) = $this->fillMultipartContentsParserStreamWithChars($length);
		$this->assertEquals(true, $multipartContentsParser->streamReadToStream($target,$length));
		rewind($target);
		$this->assertEquals($bodyString, stream_get_contents($target));
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage An error appears while reading and parsing header of content part using fgets
	 */
	public function testGetPartThrowFailfgets() {
		$bodyStream = fopen('php://temp', 'r+');
		$request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')
			->disableOriginalConstructor()
			->getMock();
		$request->expects($this->any())
			->method('getBody')
			->willReturn($bodyStream);

		$mcp = $this->getMockBuilder('OCA\DAV\Files\MultipartContentsParser')
			->setConstructorArgs(array($request))
			->setMethods(array('gets'))
			->getMock();

		$mcp->expects($this->any())
			->method('gets')
			->will($this->onConsecutiveCalls("--boundary\r\n", "Content-ID: 0\r\n", false));

		$mcp->getPartHeaders($this->boundrary);
	}
	
	/**
	 * If one one the content parts does not contain boundrary, means that received wrong request
	 *
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Expected boundary delimiter in content part
	 */
	public function testGetPartThrowNoBoundraryFound() {
		// Calling multipletimes getPart on parts without contents should return null,null and signal immedietaly that endDelimiter was reached
		$bodyFull = "--boundary_wrong\r\n--boundary--";
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyFull);
		$multipartContentsParser->getPartHeaders($this->boundrary);
	}

	/**
	 *  Reading from request which method getBody returns false
	 *
	 * @expectedException \Sabre\DAV\Exception\BadRequest
	 * @expectedExceptionMessage Unable to get request content
	 */
	public function testStreamReadThrowWrongBody() {
		$request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')
			->disableOriginalConstructor()
			->getMock();
		$request->expects($this->any())
			->method('getBody')
			->willReturn(false);

		$mcp = new \OCA\DAV\Files\MultipartContentsParser($request);
		$mcp->getPartHeaders($this->boundrary);
	}

	/**
	 *  Reading from request which method getBody returns false
	 *
	 */
	public function testMultipartContentSeekToContentLength() {
		$bodyStream = fopen('php://temp', 'r+');
		$bodyString = '';
		$length = 1000;
		for ($x = 0; $x < $length; $x++) {
			$bodyString .= 'k';
		}
		fwrite($bodyStream, $bodyString);
		rewind($bodyStream);
		$request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')
			->disableOriginalConstructor()
			->getMock();
		$request->expects($this->any())
			->method('getBody')
			->willReturn($bodyStream);

		$mcp = new \OCA\DAV\Files\MultipartContentsParser($request);
		$this->assertEquals(true,$mcp->multipartContentSeekToContentLength($length));
	}

	public function testGetPartWrongBoundaryCases() {
		// Calling multipletimes getPart on parts without contents should return null and signal immedietaly that endDelimiter was reached
		$bodyFull = "--boundary\r\n--boundary_wrong\r\n--boundary--";
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyFull);
		$this->assertEquals(null,$multipartContentsParser->getPartHeaders($this->boundrary));
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());
	}

	public function testGetPartContents() {
		// Test empty content
		$bodyFull = "--boundary\r\n";
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyFull);
		$this->assertEquals(null, $multipartContentsParser->getPartHeaders($this->boundrary));
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());

		// Test empty content
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody('');
		$this->assertEquals(null, $multipartContentsParser->getPartHeaders($this->boundrary));
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());

		// Calling multipletimes getPart on parts without contents should return null and signal immedietaly that endDelimiter was reached
		// endDelimiter should be signaled after first getPart since it will read --boundrary till it finds contents.
		$bodyFull = "--boundary\r\n--boundary\r\n--boundary--";
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyFull);
		$this->assertEquals(null,$multipartContentsParser->getPartHeaders($this->boundrary));
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());
		$this->assertEquals(null,$multipartContentsParser->getPartHeaders($this->boundrary));
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());
		$this->assertEquals(null,$multipartContentsParser->getPartHeaders($this->boundrary));
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());
		$this->assertEquals(null,$multipartContentsParser->getPartHeaders($this->boundrary));
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());

		$bodyContent = 'blabla';
		$bodyFull = '--boundary'
			."\r\nContent-ID: 0\r\nContent-Type: application/json; charset=UTF-8\r\nContent-length: 6\r\n\r\n"
			."$bodyContent\r\n--boundary";
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyFull);
		$headers['content-length'] = '6';
		$headers['content-type'] = 'application/json; charset=UTF-8';
		$headers['content-id'] = '0';
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$bodyParsed = $multipartContentsParser->streamReadToString(6);
		$this->assertEquals(false,$multipartContentsParser->getEndDelimiterReached());
		$this->assertEquals($bodyContent, $bodyParsed);
		$this->assertEquals($headers, $headersParsed);
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$this->assertEquals(null,$headersParsed);
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());

		// Test First part with content and second without content returning null
		// The behaviour is motivated by the fact that if there is noting between start content boundrary and the end of multipart boundrary,
		// it should not raise and error, but simply skip contents returning null and setting endDelimiterReached to true.
		$bodyContent = 'blabla';
		$bodyFull = '--boundary'
			."\r\nContent-ID: 0\r\nContent-Type: application/json; charset=UTF-8\r\nContent-length: 6\r\n\r\n"
			."$bodyContent\r\n--boundary\r\n--boundary--";
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyFull);
		$headers['content-length'] = '6';
		$headers['content-type'] = 'application/json; charset=UTF-8';
		$headers['content-id'] = '0';
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$bodyParsed = $multipartContentsParser->streamReadToString(6);
		$this->assertEquals(false,$multipartContentsParser->getEndDelimiterReached());
		$this->assertEquals($bodyContent, $bodyParsed);
		$this->assertEquals($headers, $headersParsed);
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$this->assertEquals(null,$headersParsed);
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());

		// Test First part without content and second with content, expects that it will just skip the empty boundrary and read the next contents within the same run of getPart
		// The behaviour is motivated by the fact that iterator at the first boundrary occurence expects next line to be contents and it will iterate till it finds it.
		// It should set endDelimiterReached to true after next call for header
		$bodyContent = 'blabla';
		$bodyFull = '--boundary'
			."\r\n--boundary\r\nContent-ID: 0\r\nContent-Type: application/json; charset=UTF-8\r\nContent-length: 6\r\n\r\n"
			."$bodyContent\r\n--boundary--";
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyFull);
		$headers['content-length'] = '6';
		$headers['content-type'] = 'application/json; charset=UTF-8';
		$headers['content-id'] = '0';
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$bodyParsed = $multipartContentsParser->streamReadToString(6);
		$this->assertEquals(false,$multipartContentsParser->getEndDelimiterReached());
		$this->assertEquals($bodyContent, $bodyParsed);
		$this->assertEquals($headers, $headersParsed);
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$this->assertEquals(null,$headersParsed);
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());

		// Test First part without content and second with content, expects that it will return first empty string and next will be content
		$bodyContent = 'blabla';
		$bodyFull = '--boundary'
			."\r\nContent-ID: 0\r\nContent-Type: application/json; charset=UTF-8\r\nContent-length: 0\r\n\r\n"
			."\r\n--boundary\r\nContent-ID: 1\r\nContent-Type: application/json; charset=UTF-8\r\nContent-length: 6\r\n\r\n"
			."$bodyContent\r\n--boundary--";
		$multipartContentsParser = $this->fillMultipartContentsParserStreamWithBody($bodyFull);
		$headers['content-length'] = '0';
		$headers['content-type'] = 'application/json; charset=UTF-8';
		$headers['content-id'] = '0';
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$bodyParsed = $multipartContentsParser->streamReadToString(0);
		$this->assertEquals(false,$multipartContentsParser->getEndDelimiterReached());
		$this->assertEquals("", $bodyParsed);
		$this->assertEquals($headers, $headersParsed);
		$headers['content-length'] = '6';
		$headers['content-type'] = 'application/json; charset=UTF-8';
		$headers['content-id'] = '1';
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$bodyParsed = $multipartContentsParser->streamReadToString(6);
		$this->assertEquals(false,$multipartContentsParser->getEndDelimiterReached());
		$this->assertEquals($bodyContent, $bodyParsed);
		$this->assertEquals($headers, $headersParsed);
		$headersParsed = $multipartContentsParser->getPartHeaders($this->boundrary);
		$this->assertEquals(null,$headersParsed);
		$this->assertEquals(true,$multipartContentsParser->getEndDelimiterReached());
	}

	private function fillMultipartContentsParserStreamWithChars($length){
		$bodyStream = fopen('php://temp', 'r+');
		$bodyString = '';
		for ($x = 0; $x < $length; $x++) {
			$bodyString .= 'k';
		}
		fwrite($bodyStream, $bodyString);
		rewind($bodyStream);
		$request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')
			->disableOriginalConstructor()
			->getMock();
		$request->expects($this->any())
			->method('getBody')
			->willReturn($bodyStream);

		$mcp = new \OCA\DAV\Files\MultipartContentsParser($request);
		return array($mcp, $bodyString);
	}

	private function fillMultipartContentsParserStreamWithBody($bodyString){
		$bodyStream = fopen('php://temp', 'r+');
		fwrite($bodyStream, $bodyString);
		rewind($bodyStream);
		$request = $this->getMockBuilder('Sabre\HTTP\RequestInterface')
			->disableOriginalConstructor()
			->getMock();
		$request->expects($this->any())
			->method('getBody')
			->willReturn($bodyStream);

		$mcp = new \OCA\DAV\Files\MultipartContentsParser($request);
		return $mcp;
	}
}
